<?php

namespace App\Console\Commands;

use App\Repository\Contracts\EventsInterface as EventsInterface;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\CoinmarketcalEventInfo as CoinmarketcalEvent;
use Statickidz\GoogleTranslate;

class GetEventInfoOfCoinmarketcalCommand extends Command
{
    protected $event;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GetEventInfoOfCoinmarketcal:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EventsInterface $event)
    {
        $this->event = $event;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        for($i = 0 ; $i < 15 ; $i++) {

            $url = "https://coinmarketcal.com/?form[date_range]=17/04/2018+-+01/09/2021&form[categories][]=".$i;
            $crawler = new Crawler($this->getData($url));
            $crawler->filterXPath('//nav[@class="pagination-wrapper pagination"]')->each(function ($node) use (&$totalPage) {
                $node->filter('a')->each(function ($item) use (&$totalPage) {
                    $totalPage = substr(explode('page', trim($item->attr('href')))[1],1,1);
                });
            });

            //loop to per page
            for ($j = 1; $j <= $totalPage; $j++) {
                $data = [];
                $url = "https://coinmarketcal.com/?form[date_range]=17/04/2018+-+01/09/2021&form[categories][]=".$i.'&page='.$j;
                $this->info($url);

                $dataPerPage = $this->getData($url);
                $crawlerPerPage = new Crawler($dataPerPage);
                $crawlerPerPage->filterXPath('//div[@class="row multi-columns-row"]/article')->each(function ($node) use (&$i, &$data, &$coinNameEventsArray, &$controller) {
                    //declare variables used
                    $event['event_id'] = '';
                    $event['category_id'] = $i+1;
                    $event['coin_name'] = '';
                    $event['symbol'] = '';
                    $event['meeting_name'] = '';
                    $event['source_url'] = '';
                    $event['content_event_en'] = '';
                    $event['content_event_ja'] = '';
                    $event['image_url'] = '';
                    $event['date'] = '';
                    //$event['date_convert_timestamp'] = '';
                    $event['date_filter'] = '';
                    $imgSource = null;

                    //filter to get date_event & coin_name
                    $node->filter('.content-box-general > h5')->each(function ($item, $index) use (&$event) {
                        if ($index == 0) {
                            $event['date'] = trim($item->filter('strong')->text());
                            //$event['date_convert_timestamp'] = Carbon::createFromFormat('d F Y', $event['date'])->timestamp;
                            $event['date_filter'] = date('Y-m-d', Carbon::createFromFormat('d F Y', $event['date'])->timestamp);
                        } elseif ($index == 1) {
                            $event['coin_name'] = trim($item->filter('strong')->text());
                            $event['symbol'] = $this->getTextWithinParenthesis(trim($item->text()));
                        } elseif ($index == 2){
                            $event['meeting_name'] = trim($item->text());
                        }
                    });

                    // filter to get event_id
                    $event['event_id'] = explode('-', trim($node->filter('.content-box-general > .content-box-info')->attr('id')))[1];

                    //filter to get content_event
                    $event['content_event_en'] = trim($node->filter('.content-box-general > .content-box-info > .description')->text());
                    $event['content_event_ja'] = $this->translate($event['content_event_en']);

                    //filter to get source_url


                    $conditions = [
                        ['event_id', '=', $event['event_id']],
                        ['coin_name', '=', $event['coin_name']],
                        ['content_event_en', '=', $event['content_event_en']],
                        ['date', '=', $event['date']]
                    ];

                    $checkEventExist = $this->event->firstWhere($conditions);
                    if (count($checkEventExist) == 0) {
                        $node->filter('.content-box-general > .content-box-info > a')->each(function ($item, $index) use (&$event) {
                            if ($index == 0) {
                                $img_url = 'https://coinmarketcal.com/' . trim($item->attr('href'));
                                $imgStyle = explode('.',trim($item->attr('href')))[1];
                                $imgSource = @file_get_contents($img_url);
                                $path = public_path() . '/images/eventFroof/' . $event['symbol'].'.'.$imgStyle;
                                file_put_contents($path, $imgSource);
                                $event['image_url'] = '/images/eventFroof/' . $event['symbol'].'.'.$imgStyle;
                            }

                            if ($index == 1) $event['source_url'] = trim($item->attr('href'));

                        });
                        $data[] = $event;
                    }
                });

                CoinmarketcalEvent::insert($data);
            }
        }
    }

    private
    function getData($url)
    {

        static $ch = null;

        if (is_null($ch)) {
            $ch = curl_init();
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $res = curl_exec($ch);

        return $res;
    }


    private
    function translate($content)
    {
        $source = 'en';
        $target = 'ja';
        $text = $content;

        $trans = new GoogleTranslate();
        $result = $trans->translate($source, $target, $text);

        return $result;
    }

    private function getTextWithinParenthesis($text){
        preg_match('#\((.*?)\)#', $text, $match);
        return $match[1];
    }


}
