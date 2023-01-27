<?php

namespace App\Packages\infrastructures\Fertilizer;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;

class MockFertilizerRepository implements FertilizerRepositoryInterface
{
    private array $fertilizerSettings=[];
    public function __construct()
    {
        $this->fertilizerSettings[]=
            new MonthsFertilizerSetting(
                new FertilizerSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('株からある程度離して'),
                new FertilizerAmount(100),
                new fertilizerName('牛糞堆肥'),
        );
        $this->fertilizerSettings[]=
            new MonthsFertilizerSetting(
            new FertilizerSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
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
     * @param FertilizerSettingId $fertilizerSettingId
     * @return MonthsFertilizerSetting
     * @throws NotFoundException
     */
    public function findById(FertilizerSettingId $fertilizerSettingId): MonthsFertilizerSetting
    {

        foreach ($this->fertilizerSettings as $fertilizerSetting) {
            if ($fertilizerSetting->getFertilizerSettingId()->equals($fertilizerSettingId)) {
                return $fertilizerSetting;
            }
        }
        throw new NotFoundException('指定した肥料設定IDは見つかりませんでした (id:' . $fertilizerSettingId->getId() . ')');
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
     * @param FertilizerSettingId $fertilizerSettingId
     * @return void
     */
    public function delete(FertilizerSettingId $fertilizerSettingId): void
    {
        $deleteSetting = $this->findById($fertilizerSettingId);
        $index = array_search($deleteSetting, $this->fertilizerSettings);
        unset($this->fertilizerSettings[$index]);

    }
}
