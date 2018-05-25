<?php

namespace App\Repository\Eloquent;

use App;
use App\Repository\Contracts;
use Illuminate\Container\Container;
use App\Repository\Contracts\EventsInterface;
use Illuminate\Support\Facades\DB;

class EventsRepository extends BaseRepository implements EventsInterface
{
    protected function model()
    {
        return \App\Models\CoinmarketcalEventInfo::class;
    }

    public function save($events)
    {

    }

    public function filterEvent($event_type_id, $event_time, $currency = ''){
        $events = DB::table('coinmarketcal_event_infos as marketcal')
            ->join('coinmarketcap_coin_infos as marketcap', 'marketcal.symbol', '=', 'marketcap.symbol')
            ->join('coins_icons', 'marketcal.symbol', '=', 'coins_icons.symbol')
            ->join('coinmarketcal_categories as category', 'marketcal.category_id', '=', 'category.id')
            ->where('marketcal.date_filter', $event_time)
            ->where('category.id', $event_type_id)
            ->where(function ($query) use ($currency) {
                if ($currency != '') {
                    $query->where('marketcal.coin_name', $currency)
                        ->orWhere('marketcal.symbol', $currency);
                }
            })
            ->select('marketcal.*', 'marketcap.market_cap', 'coins_icons.icon_url', 'category.name as category', 'category.name_jp as category_jp')
            ->orderBy('category.level', 'ASC')
            ->orderBy('marketcap.market_cap', 'DESC')
            ->get();
        return $events;
    }


}
