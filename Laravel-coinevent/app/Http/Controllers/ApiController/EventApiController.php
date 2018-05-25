<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Repository\Contracts\EventsInterface as Events;
use Carbon\Carbon;
use App\Models\CoinmarketcapCoinInfo;
use App\Models\CoinmarketcalEventInfo;
use App\Models\CoinsIcon;
use Illuminate\Support\Facades\DB;
use App\Services\DateTimeService;
use Validator;

class EventApiController extends BaseController
{
    protected $dateTimeService;
    protected $events;

    public function __construct(DateTimeService $dateTimeService, Events $events)
    {
        $this->dateTimeService = $dateTimeService;
        $this->events = $events;
    }

    public function filterEvents(Request $request)
    {
        $responFormat = array();

        $data = $request->all();

        $validator = Validator::make($data, [
            'event_type_id' => 'required|numeric',
            'event_time' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            $responFormat['message'] = $validator->errors()->first();;
            return response()->json($responFormat);
        }

        $event_time = '';
        $currency = isset($data['currency']) ? $data['currency'] : '';

        switch ($data['event_time']) {
            case 1:
                $event_time = Carbon::now()->subWeek(1)->format('Y m d');
                break;
            case 2:
                $event_time = Carbon::now()->format('Y m d');
                break;
            case 3:
                $event_time = Carbon::now()->addWeek(1)->format('Y m d');
                break;
            case 4:
                $event_time = Carbon::now()->addWeek(2)->format('Y m d');
                break;
            case 5:
                $event_time = Carbon::now()->subMonth(1)->format('Y m d');
                break;
            case 6:
                $event_time = Carbon::now()->format('Y m d');
                break;
            case 7:
                $event_time = Carbon::now()->addMonth(1)->format('Y m d');
                break;
            case 8:
                $event_time = Carbon::now()->addMonth(2)->format('Y m d');
                break;
            default:
                break;
        }

        $events = $this->events->filterEvent($data['event_type_id'], $event_time, $currency);

        return response()->json($events);


    }


}
