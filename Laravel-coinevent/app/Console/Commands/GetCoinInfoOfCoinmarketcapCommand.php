<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\CoinmarketcapCoinInfo as CoinmarketcapCoinInfo;
use App\Helpers\Envato\Base;
use Illuminate\Console\Command;

class GetCoinInfoOfCoinmarketcapCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GetCoinInfoOfCoinmarketcap:start';

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
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = 'https://api.coinmarketcap.com/v1/ticker/?limit=10000';
        $dataCrawl = \GuzzleHttp\json_decode(Base::getData($url));
        $allData = [];
        foreach ($dataCrawl as $index => $item) {
            $coin = [];
            $coin['coin_name'] = isset($item->name) ? $item->name : '';
            $coin['symbol'] = isset($item->symbol) ? $item->symbol : '';
            $coin['price'] = isset($item->price_usd) ? $item->price_usd : 0;
            $coin['market_cap'] = isset($item->market_cap_usd) ? $item->market_cap_usd : 0;
            $data[] = $coin;
            if ($index != 0 && $index % 100 == 0) {
                CoinmarketcapCoinInfo::insert($data);
                $data = [];
                continue;
            }
            CoinmarketcapCoinInfo::insert($data);
            $data = [];

        }


    }
}
