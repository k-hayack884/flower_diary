<?php

namespace App\Packages\infrastructures\CheckSeat;

use App\Models\FertilizerSetting;
use App\Models\WaterSetting;
use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;

class CheckSeatRepository implements \App\Packages\Domains\CheckSeat\CheckSeatRepositoryInterface
{
    public function find(): array
    {
        return \App\Models\CheckSeat::all();
    }
    public function findById(CheckSeatId $checkSeatId): CheckSeat
    {
        $waterSettingIds=[];
        $fertilizerSettingIds=[];
        $checkSeat = \App\Models\CheckSeat::where('check_seat_id', $checkSeatId->getId())->first();

        if ($checkSeat === null) {
            throw new NotFoundException('指定したチェックシートIDを見つけることができませんでした');
        }

        $waterSettings=WaterSetting::where('check_seat_id', $checkSeatId->getId())->get();
        $fertilizerSettings=FertilizerSetting::where('check_seat_id', $checkSeatId->getId())->get();

        foreach ($waterSettings as $waterSetting){
            $waterSettingIds[]=$waterSetting->water_setting_id;
        }
        foreach ($fertilizerSettings as $fertilizerSettingId){
            $fertilizerSettingIds[]=$fertilizerSettingId->fertilizer_setting_id;
        }

        return new CheckSeat(
            new CheckSeatId($checkSeat->check_seat_id),
            $waterSettingIds,
            $fertilizerSettingIds
        );
    }

    public function save(CheckSeat $checkSeat): void
    {
        // TODO: Implement save() method.
    }

    public function delete(CheckSeatId $checkSeatId): void
    {
        // TODO: Implement delete() method.
    }
}
