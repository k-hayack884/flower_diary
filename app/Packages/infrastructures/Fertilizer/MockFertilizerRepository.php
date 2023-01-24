<?php

namespace App\Packages\infrastructures\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingID;
use App\Packages\Domains\Fertilizer\TarmFertilizerSetting;

class MockFertilizerRepository
{
    private FertilizerSettingCollection $fertilizerSettings;

    public function __construct()
    {
        $this->fertilizerSettings = new FertilizerSettingCollection();

        $this->fertilizerSettings->add(
            new TarmFertilizerSetting(
                new FertilizerSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('株からある程度離して'),
                new FertilizerAmount(100),
                new fertilizerName('牛糞堆肥'),
            ),
        );
        new TarmFertilizerSetting(
            new FertilizerSettingID('334c1092-7a0d-40b0-af6e-30bff5975e31'),
            [1, 3, 5],
            new FertilizerNote('なんでや！阪神関係ないやろ！'),
            new FertilizerAmount(334),
            new FertilizerName('腐葉土'),
        );
    }

    /**
     * @return FertilizerSettingCollection
     */
    public function find(): FertilizerSettingCollection
    {
        return $this->fertilizerSettings;
    }

    /**
     * @param $fertilizerSettingId
     * @return TarmFertilizerSetting
     */
    public function findById($fertilizerSettingId): TarmFertilizerSetting
    {

        return $this->fertilizerSettings->find($fertilizerSettingId);
    }

    /**
     * @param TarmFertilizerSetting $fertilizerSetting
     * @return void
     */
    public function save(TarmFertilizerSetting $fertilizerSetting): void
    {
        $this->fertilizerSettings->add($fertilizerSetting);
    }

    /**
     * @param FertilizerSettingID $fertilizerSettingId
     * @return void
     */
    public function delete(FertilizerSettingId $fertilizerSettingId): void
    {
        $this->fertilizerSettings->delete($fertilizerSettingId->getId());
    }
}
