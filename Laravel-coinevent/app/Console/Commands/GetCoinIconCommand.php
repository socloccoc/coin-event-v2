<?php

namespace App\Console\Commands;

use App\Models\CoinsIcon;
use Illuminate\Console\Command;

class GetCoinIconCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GetCoinIcon:start';

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
        $url = 'https://www.cryptocompare.com/api/data/coinlist/';
        $content = file_get_contents($url);
        $json = json_decode($content, true);
        $baseImageUrl = $json['BaseImageUrl'];

        foreach ($json['Data'] as $value) {
            $ImgUrl = isset($value['ImageUrl']) ? $value['ImageUrl'] : '';
            $myArray = explode('/', trim($ImgUrl));
            $nameImg = $myArray[count($myArray) - 1];

            // download image
            if ($ImgUrl != '') {
                $url = $baseImageUrl . $ImgUrl;
                $this->info($url);
                $img = public_path() . '/images/coinsIcon/' . $nameImg;
                file_put_contents($img, file_get_contents($url));
                $imgUrlLocal = '/images/coinsIcon/' . $nameImg;
            } else {
                $imgUrlLocal = '/images/coinsIcon/icon_coin_default.png';
            }

            $selectCoin = CoinsIcon::where('symbol', $value['Symbol'])->first();

            if ($selectCoin) {
                $selectCoin->symbol = $value['Symbol'];
                $selectCoin->coin_name = $value['CoinName'];
                $selectCoin->icon_url = $imgUrlLocal;
                $selectCoin->save();
            } else {
                $newCoin = new CoinsIcon();
                $newCoin->symbol = $value['Symbol'];
                $newCoin->coin_name = $value['CoinName'];
                $newCoin->icon_url = $imgUrlLocal;
                $newCoin->save();
            }
        }

    }
}
