<?php

namespace App\Packages\Infrastructures\Fertilizer;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;

class FertilizerSettingRepository implements \App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface
{
    /**
     * @return array
     */
    public function find(): array
    {
        $fertilizerSettings = [];
        $allFertilizerSettings = \App\Models\FertilizerSetting::all();
        foreach ($allFertilizerSettings as $fertilizerSetting) {
            $fertilizerSettings[] = new MonthsFertilizerSetting(
                new FertilizerSettingId($fertilizerSetting->fertilizer_setting_id),
                json_decode($fertilizerSetting->months),
                new FertilizerNote($fertilizerSetting->fertilizer_note),
                new FertilizerAmount($fertilizerSetting->fertilizer_amount),
                new fertilizerName($fertilizerSetting->fertilizer_name),
            );
        }
        return $fertilizerSettings;
    }

    /**
     * @param CheckSeatId $checkSeatId
     * @return array
     */
    public function findByCheckSeatId(CheckSeatId $checkSeatId): array
    {
        $fertilizerSettings = [];
        $allFertilizerSettings = \App\Models\FertilizerSetting::where('check_seat_id', $checkSeatId->getId())->get();
        foreach ($allFertilizerSettings as $fertilizerSetting) {
            $fertilizerSettings[] = new MonthsFertilizerSetting(
                new FertilizerSettingId($fertilizerSetting->fertilizer_setting_id),
                json_decode($fertilizerSetting->months),
                new FertilizerNote($fertilizerSetting->fertilizer_note),
                new FertilizerAmount($fertilizerSetting->fertilizer_amount),
                new fertilizerName($fertilizerSetting->fertilizer_name),
            );
        }
        return $fertilizerSettings;
    }

    /**
     * @param FertilizerSettingId $fertilizerSettingId
     * @return MonthsFertilizerSetting
     * @throws NotFoundException
     */
    public function findById(FertilizerSettingId $fertilizerSettingId): MonthsFertilizerSetting
    {

        $fertilizerSetting = \App\Models\FertilizerSetting::where('fertilizer_setting_id', $fertilizerSettingId->getId())->first();
        if ($fertilizerSetting === null) {
            throw new NotFoundException('指定した肥料設定IDを見つけることができませんでした');
        }
        return new MonthsFertilizerSetting(
            new FertilizerSettingId($fertilizerSetting->fertilizer_setting_id),
            json_decode($fertilizerSetting->months),
            new FertilizerNote($fertilizerSetting->fertilizer_note),
            new FertilizerAmount($fertilizerSetting->fertilizer_amount),
            new fertilizerName($fertilizerSetting->fertilizer_name),
        );
    }

    /**
     * @param FertilizerSettingCollection $fertilizerSetting
     * @param string $checkSeatId
     * @return void
     */
    public function save(FertilizerSettingCollection $fertilizerSetting, string $checkSeatId): void
    {
        $collectionArray = $fertilizerSetting->toArray();
        foreach ($collectionArray as $fertilizerSetting) {
            \App\Models\FertilizerSetting::updateOrCreate(['fertilizer_setting_id' => $fertilizerSetting->getFertilizerSettingId()->getId()],
                ['fertilizer_setting_id' => $fertilizerSetting->getFertilizerSettingId()->getId(),
                    'check_seat_id' => $checkSeatId,
                    'months' => json_encode($fertilizerSetting->getMonths()),
                    'fertilizer_note' => $fertilizerSetting->getFertilizerNote()->getvalue(),
                    'fertilizer_amount' => $fertilizerSetting->getFertilizerAmount()->getValue(),
                    'fertilizer_name' => $fertilizerSetting->getFertilizerName()->getValue(),
                ]);
        }
    }

    /**
     * @param FertilizerSettingId $fertilizerSettingId
     * @return void
     * @throws NotFoundException
     */
    public function delete(FertilizerSettingId $fertilizerSettingId): void
    {
        $fertilizerSetting = \App\Models\FertilizerSetting::where('fertilizer_setting_id', $fertilizerSettingId->getId())->first();

        if ($fertilizerSetting === null) {
            throw new NotFoundException('指定した肥料設定IDを見つけることができませんでした');
        }
        $fertilizerSetting->delete();
    }
}
