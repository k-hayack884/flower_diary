<?php

namespace App\Packages\infrastructures\Care;

use App\Models\WaterAlertTime;
use App\Models\CheckSeat;
use App\Models\WaterSetting;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use Carbon\Carbon;

class CareRepository
{
    public function find(CheckSeatId $checkSeatId)
    {
        $currentMonth = (int)Carbon::now()->format('m');
        $waterSettings = WaterSetting::where('check_seat_id', $checkSeatId->getId())
            ->get();
        $alertTimes = [];
        foreach ($waterSettings as $waterSetting) {
            if (in_array($currentMonth, json_decode($waterSetting->months))) {
                $alertTimes = WaterAlertTime::where('water_setting_id', $waterSetting->water_setting_id)
                    ->with('waterSetting:water_setting_id,months,water_note,water_amount,watering_times,watering_interval')
                    ->get();
            }
        }
        return $alertTimes;
    }
}
