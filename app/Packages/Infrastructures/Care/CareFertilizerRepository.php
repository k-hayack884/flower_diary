<?php

namespace App\Packages\Infrastructures\Care;

use App\Models\FertilizerAlertTime;
use App\Models\FertilizerSetting;
use App\Models\PlantUnit;
use App\Models\WaterAlertTime;
use App\Models\CheckSeat;
use App\Models\WaterSetting;
use App\Packages\Domains\Care\FertilizerAlertTimeId;
use App\Packages\Domains\Care\FertilizerCare;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\PlantUnit\plantName;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\Domains\User\UserId;
use App\Packages\Domains\Water\WaterSettingCollection;
use Carbon\Carbon;

class CareFertilizerRepository
{
    public function findCareByUser(UserId $userId)
    {
        $currentMonth = (int)Carbon::now()->format('m');
        $now = Carbon::now();
        $plantUnits = PlantUnit::with('checkSeat.fertilizerSetting.fertilizerAlertTimes')
            ->where('user_id', $userId->getId())
            ->get();

        $careFertilizerSettings = [];
        foreach ($plantUnits as $plantUnit) {
            $checkSeat = $plantUnit->checkSeat;
            $fertilizerSettings = $checkSeat->fertilizerSetting;
            if (!$fertilizerSettings) {
                continue;
            }
            foreach ($fertilizerSettings as $fertilizerSetting) {
                if (in_array($currentMonth, json_decode($fertilizerSetting->months))) {
                    $fertilizerSetting->plant_name = $plantUnit->plant_name;
                    $careFertilizerSettings[]=$fertilizerSetting;
                }
            }
        }

        $fertilizerCares=[];
        foreach ($careFertilizerSettings as $careFertilizerSetting) {
            foreach ($careFertilizerSetting->fertilizerAlertTimes as $alertTime) {
                if($alertTime->alert_month!==$currentMonth){
                    continue;
                }
                if ($alertTime->resent_care_time === null||$now->month !== Carbon::parse($alertTime->resent_care_time)->month) {
                    $fertilizerCares[]=new FertilizerCare(
                        new FertilizerAlertTimeId($alertTime->alert_time_id),
                        new plantName($careFertilizerSetting->plant_name),
                        new FertilizerAmount($careFertilizerSetting->fertilizer_amount),
                        new FertilizerNote($careFertilizerSetting->fertilizer_note),
                        new FertilizerName($careFertilizerSetting->fertilizer_name),
                        $alertTime->alert_month,
                    );
                }

            }
        }
        return $fertilizerCares;
    }

    public function save(FertilizerSettingCollection $fertilizerSetting)
    {
        $collectionArray = $fertilizerSetting->toArray();
        foreach ($collectionArray as $fertilizerSetting) {
            foreach ($fertilizerSetting->getMonths() as $month) {

                $existingRecord = FertilizerAlertTime::where([
                    'fertilizer_setting_id' => $fertilizerSetting->getFertilizerSettingId()->getId(),
                    'alert_month' => $month,
                ])->first();
                if (!$existingRecord) {
                    FertilizerAlertTime::create(["alert_time_id" => new Uuid(),
                        "fertilizer_setting_id" => $fertilizerSetting->getFertilizerSettingId()->getId(),
                        "alert_month" => $month]);
                }
            }

        }
    }

    public function push($alertTimeId)
    {
        $alertTime  = FertilizerAlertTime::where('alert_time_id', $alertTimeId)
            ->first();
        $alertTime->resent_care_time=now();
        $alertTime->save();
    }


}
