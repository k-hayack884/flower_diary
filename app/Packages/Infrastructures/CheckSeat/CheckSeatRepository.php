<?php

namespace App\Packages\infrastructures\CheckSeat;

use App\Exceptions\NotFoundException;
use App\Models\FertilizerSetting;
use App\Models\WaterSetting;
use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;

class CheckSeatRepository implements \App\Packages\Domains\CheckSeat\CheckSeatRepositoryInterface
{
    /**
     * @return array
     */
    public function find(): array
    {
        return \App\Models\CheckSeat::all();
    }

    /**
     * @param CheckSeatId $checkSeatId
     * @return CheckSeat
     * @throws NotFoundException
     */
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

    /**
     * @param CheckSeat $checkSeat
     * @return void
     */
    public function save(CheckSeat $checkSeat): void
    {
        $waterSettings=WaterSetting::where('check_seat_id', $checkSeat->getCheckSeatId()->getId())->get();
        $fertilizerSettings=FertilizerSetting::where('check_seat_id', $checkSeat->getCheckSeatId()->getId())->get();

        foreach ($waterSettings as $waterSetting){
            $waterSetting->delete();
        }
        foreach ($fertilizerSettings as $fertilizerSetting){
            $fertilizerSetting->delete();
        }
    }

    /**
     * @param CheckSeatId $checkSeatId
     * @return void
     */
    public function delete(CheckSeatId $checkSeatId): void
    {

    }
}
