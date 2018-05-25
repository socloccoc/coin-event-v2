<?php

namespace App\Services;

class DateTimeService
{
    public function __construct()
    {
    }

    public function getDayOfWeek($date)
    {
        $days = ["日", "月", "火", "水", "木", "金", "土", "日"];
        $dayofweek = date('w', strtotime($date));
        return $days[$dayofweek];
    }

    /**
     * @param $date ( 2018/03/25 )
     *
     * @Description This function are use get all days of week
     * @return array
     */
    public function getAllDayOfWeek($date)
    {
        $d = date('N', strtotime($date));
        $week = array();
        $currentDate = new \DateTime($date);
        $week[] = $currentDate->format('Y-m-d');
        if ($d != 7) {
            for ($i = 1; $i <= $d; ++$i) {
                $dateTime = new \DateTime($date);
                for ($j = 0; $j < $i; ++$j) {
                    $dateTime->modify('-1 day');
                }
                $week[] = $dateTime->format('Y-m-d');
            }

            for ($i = $d + 1; $i < 7; ++$i) {
                $dateTime = new \DateTime($date);
                for ($j = 0; $j < $i - $d; ++$j) {
                    $dateTime->modify('+1 day');
                }
                $week[] = $dateTime->format('Y-m-d');
            }
        } else {
            for ($i = 1; $i < 7; ++$i) {
                $dateTime = new \DateTime($date);
                for ($j = 0; $j < $i; ++$j) {
                    $dateTime->modify('+1 day');
                }
                $week[] = $dateTime->format('Y-m-d');
            }
        }

        sort($week);

        return $week;
    }

    /**
     * @param $year
     * @param $month
     *
     * @Description This function are use get all days of month
     *
     * @return array
     */
    public function getAllDayOfMonth($year, $month, $weekdays = true)
    {

        $list = array();

        for ($d = 1; $d <= 31; $d++) {
            $time = mktime(12, 0, 0, $month, $d, $year);
            if (date('m', $time) == $month) {
                if ($weekdays) {
                    $list[] = date('Y-m-d-D', $time);
                } else {
                    $list[] = date('Y-m-d', $time);
                }
            }
        }

        return $list;
    }


}