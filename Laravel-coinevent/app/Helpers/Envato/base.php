<?php
//app/Helpers/Envato/User.php
namespace App\Helpers\Envato;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Base
{

    public static function convertDateToJa($date)
    {
        $date = Carbon::createFromFormat('d F Y', $date)->toDateString();
        $year = explode('-', $date)[0];
        $month = explode('-', $date)[1];
        $day = explode('-', $date)[2];
        return $year . '年 ' . $month . '月 ' . $day . '日';
    }

    public static function convertCurrentDate($date)
    {
        $month = explode('-', $date)[1];
        $day = explode('-', $date)[2];
        return $month . '月 ' . $day . '日';
    }

    public static function getDayOfWeek($date)
    {
        $dayofweek = ['日', '月', '火', '水', '木', '金', '土'];
        $datetime = date($date);
        $day_num = date('w', strtotime($datetime));
        return $dayofweek[$day_num];
    }

    public static function getData($url)
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

}