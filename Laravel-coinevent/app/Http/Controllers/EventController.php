<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Repository\Contracts\EventsInterface as Events;
use Carbon\Carbon;
use App\Models\CoinmarketcapCoinInfo;
use App\Models\CoinmarketcalEventInfo;
use App\Models\CoinsIcon;
use Illuminate\Support\Facades\DB;
use App\Services\DateTimeService;

class EventController extends BaseController
{
    protected $dateTimeService;
    protected $events;

    public function __construct(DateTimeService $dateTimeService, Events $events)
    {
        $this->dateTimeService = $dateTimeService;
        $this->events = $events;
    }

    public function filterEvents(Request $request){
        return 123;
    }

    public function getListEvent(Request $request, $category_id = 0, $date)
    {
        $eventsOfDay = [];
        $year = explode('-', $date)[0];
        $month = explode('-', $date)[1];
        $coin = $request->get('coin');

        $arr1 = ['Sun' => 0, 'Mon' => 1, 'Tue' => 2, 'Wed' => 3, 'Thu' => 4, 'Fri' => 5, 'Sat' => 6];
        $arr2 = ['Sun' => 6, 'Mon' => 5, 'Tue' => 4, 'Wed' => 3, 'Thu' => 2, 'Fri' => 1, 'Sat' => 0];

        $dateSubMonth = date('Y-m-d', strtotime($date . " - 1 month"));
        $dateAddMonth = date('Y-m-d', strtotime($date . " + 1 month"));

        $allDayofPreMonth = $this->dateTimeService->getAllDayOfMonth(explode('-', $dateSubMonth)[0], explode('-', $dateSubMonth)[1], false);
        $allDayOfMonth = $this->dateTimeService->getAllDayOfMonth($year, $month, false);
        $allDayOfMonthWeekdays = $this->dateTimeService->getAllDayOfMonth($year, $month);
        $allDayofNextMonth = $this->dateTimeService->getAllDayOfMonth(explode('-', $dateAddMonth)[0], explode('-', $dateAddMonth)[1], false);

        $numberOfDayPreMonth = $arr1[explode('-', $allDayOfMonthWeekdays[0])[3]];
        $numberOfDayNextMonth = $arr2[explode('-', $allDayOfMonthWeekdays[count($allDayOfMonthWeekdays) - 1])[3]];

        $datePreMonthArr = array_slice($allDayofPreMonth, count($allDayofPreMonth) - $numberOfDayPreMonth);
        $dateNextMonthArr = array_slice($allDayofNextMonth, 0, $numberOfDayNextMonth);

        for ($i = 0; $i < count($datePreMonthArr); $i++) {
            $eventsOfDay[] = $this->getEventOfDay($category_id, $datePreMonthArr[$i], $coin);
        }

        for ($i = 0; $i < count($allDayOfMonth); $i++) {
            $eventsOfDay[] = $this->getEventOfDay($category_id, $allDayOfMonth[$i], $coin);
        }

        for ($i = 0; $i < count($dateNextMonthArr); $i++) {
            $eventsOfDay[] = $this->getEventOfDay($category_id, $dateNextMonthArr[$i], $coin);
        }

        return $eventsOfDay;

    }

    public function getEventOfDay($category_id, $date, $coin)
    {
        $event = DB::table('coinmarketcal_event_infos as marketcal')
            ->join('coinmarketcap_coin_infos as marketcap', 'marketcal.symbol', '=', 'marketcap.symbol')
            ->join('coins_icons', 'marketcal.symbol', '=', 'coins_icons.symbol')
            ->join('coinmarketcal_categories as category', 'marketcal.category_id', '=', 'category.id')
            ->where(function ($query) use ($category_id) {
                if ($category_id != 0) {
                    $query->where('marketcal.category_id', $category_id);
                }
            })
            ->where(function ($query) use ($coin){
                if($coin != ''){
                    $query->where('marketcal.symbol', $coin);
                }
            })
            ->where('marketcal.date_filter', $date)
            ->select('marketcal.*', 'marketcap.market_cap', 'coins_icons.icon_url', 'category.name as category', 'category.name_jp as category_jp')
            ->orderBy('category.level', 'ASC')
            ->orderBy('marketcap.market_cap', 'DESC')
            ->first();
        return $event;
    }

    public function getEventByName($name)
    {
        $event = DB::table('coinmarketcal_event_infos as marketcal')
            ->join('coins_icons', 'marketcal.symbol', '=', 'coins_icons.symbol')
            ->where('marketcal.coin_name', 'like', '%' . $name . '%')
            ->select('marketcal.*', 'coins_icons.icon_url')
            ->groupBy('marketcal.coin_name')
            ->take(10)
            ->get();
        return $event;
    }
}
