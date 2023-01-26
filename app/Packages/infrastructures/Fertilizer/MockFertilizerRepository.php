<?php

namespace App\Packages\infrastructures\Fertilizer;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingID;
use App\Packages\Domains\Fertilizer\TarmFertilizerSetting;

class MockFertilizerRepository
{
    private array $fertilizerSettings=[];
    public function __construct()
    {
        $this->fertilizerSettings[]=
            new TarmFertilizerSetting(
                new FertilizerSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('株からある程度離して'),
                new FertilizerAmount(100),
                new fertilizerName('牛糞堆肥'),
        );
        $this->fertilizerSettings[]=
            new TarmFertilizerSetting(
            new FertilizerSettingID('334c1092-7a0d-40b0-af6e-30bff5975e31'),
            [1, 3, 5],
            new FertilizerNote('なんでや！阪神関係ないやろ！'),
            new FertilizerAmount(334),
            new FertilizerName('腐葉土'),
        );
    }

    /**
     * @return array
     */
    public function find(): array
    {
        return $this->fertilizerSettings;
    }

    /**
     * @param FertilizerSettingID $fertilizerSettingId
     * @return TarmFertilizerSetting
     * @throws NotFoundException
     */
    public function findById(FertilizerSettingID $fertilizerSettingId): TarmFertilizerSetting
    {

        foreach ($this->fertilizerSettings as $fertilizerSetting) {
            if ($fertilizerSetting->getFertilizerSettingId()->equals($fertilizerSettingId)) {
                return $fertilizerSetting;
            }
        }
        throw new NotFoundException('指定した水やり設定IDは見つかりませんでした');
    }

    /**
     * @param FertilizerSettingCollection $fertilizerSettingCollection
     * @return void
     */
    public function save(FertilizerSettingCollection $fertilizerSettingCollection): void
    {
        $collectionArray = $fertilizerSettingCollection->toArray();
        foreach ($collectionArray as $collectionValue) {
            $this->fertilizerSettings[] = $collectionValue;
        }
    }

    /**
     * @param FertilizerSettingID $fertilizerSettingId
     * @return void
     */
    public function delete(FertilizerSettingID $fertilizerSettingId): void
    {
        $deleteSetting = $this->findById($fertilizerSettingId);
        $index = array_search($deleteSetting, $this->fertilizerSettings);
        unset($this->fertilizerSettings[$index]);

    }
}
