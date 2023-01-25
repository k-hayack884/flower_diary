<?php

namespace Packages\Domains\Fertilizer;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingID;
use App\Packages\Domains\Fertilizer\TarmFertilizerSetting;
use PHPUnit\Framework\TestCase;

class FertilizerSettingCollectionTest extends TestCase
{
    public function test_オブジェクトが生成されること()
    {
        $fertilizerSettings = [
            new TarmFertilizerSetting(
                new FertilizerSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('株からある程度離して'),
                new FertilizerAmount(100),
                new fertilizerName('牛糞堆肥'),
            ),
            new TarmFertilizerSetting(
                new FertilizerSettingID('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('なんでや！阪神関係ないやろ！'),
                new FertilizerAmount(334),
                new fertilizerName('腐葉土'),
            ),
        ];

        $fertilizerSettingCollection = new FertilizerSettingCollection($fertilizerSettings);

        $this->assertCount(count($fertilizerSettings), $fertilizerSettingCollection);
        foreach ($fertilizerSettingCollection as $index => $fertilizerSetting) {
            $this->assertSame($index, $fertilizerSetting->getFertilizerSettingId());
        }
    }

    public function test_空のオブジェクトが生成されること()
    {
        $fertilizerSettings = [];

        $fertilizerSettingCollection = new FertilizerSettingCollection($fertilizerSettings);
        $this->assertCount(count($fertilizerSettings), $fertilizerSettingCollection);

    }

    public function test_新しい設定を追加すること()
    {
        $fertilizerSettings = [
            new TarmFertilizerSetting(
                new FertilizerSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('株からある程度離して'),
                new FertilizerAmount(100),
                new fertilizerName('牛糞堆肥'),
            ),
            new TarmFertilizerSetting(
                new FertilizerSettingID('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('なんでや！阪神関係ないやろ！'),
                new FertilizerAmount(334),
                new fertilizerName('腐葉土'),
            ),
        ];

        $fertilizerSettingCollection = new FertilizerSettingCollection($fertilizerSettings);

        $addFertilizerSettingSetting =
            new TarmFertilizerSetting(
                new FertilizerSettingID('114c5142-7a0d-40b0-af6e-30bff5975e31'),
                [5, 7, 8],
                new FertilizerNote('たくさんあげよう'),
                new FertilizerAmount(114),
                new fertilizerName('泥'),
            );
        $fertilizerSettingCollection->add($addFertilizerSettingSetting);
        $fertilizerSettings[] = $addFertilizerSettingSetting;

        $this->assertCount(count($fertilizerSettings), $fertilizerSettingCollection);
        foreach ($fertilizerSettingCollection as $index => $fertilizerSetting) {
            $this->assertSame($index, $fertilizerSetting->getFertilizerSettingId());
        }

    }

//    public function test_WaterSettingIDが重複しているので、生成できずエラーを出すこと()
//    {
//        $waterSettings = [
//            new TarmWaterSetting(
//                new WaterSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
//                [1, 3, 5],
//                new WaterNote('水やりは慎重に'),
//                WaterAmount::settingALot(),
//                new WateringTimes(1),
//                new WateringInterval(2),
//                ['09:00', '23:30']
//            ),
//            new TarmWaterSetting(
//                new WaterSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
//                [1, 3, 5],
//                new WaterNote('なんでや！阪神関係ないやろ！'),
//                WaterAmount::settingSparingly(),
//                new WateringTimes(3),
//                new WateringInterval(34),
//                ['12:59', '3:34']
//            )
//        ];
//        $this->expectException(DomainException::class);
//        $waterSettingCollection = new WaterSettingCollection($waterSettings);
//
//        $this->assertCount(count($waterSettings), $waterSettingCollection);
//        foreach ($waterSettingCollection as $index => $waterSetting) {
//            $this->assertSame($waterSettings[$index]->getWaterSettingId(), $waterSetting->getWaterSettingId());
//        }
//    }
    public function test_設定を削除すること()
    {
        $fertilizerSettings = [
            new TarmFertilizerSetting(
                new FertilizerSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('株からある程度離して'),
                new FertilizerAmount(100),
                new fertilizerName('牛糞堆肥'),
            ),
            new TarmFertilizerSetting(
                new FertilizerSettingID('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('なんでや！阪神関係ないやろ！'),
                new FertilizerAmount(334),
                new fertilizerName('腐葉土'),
            ),
        ];


        $fertilizerSettingCollection = new FertilizerSettingCollection($fertilizerSettings);
        $fertilizerSettingId = new FertilizerSettingID('334c1092-7a0d-40b0-af6e-30bff5975e31');
        $deleteFertilizerSetting = $fertilizerSettingCollection->find($fertilizerSettingId);

        $fertilizerSettingCollection->delete($deleteFertilizerSetting);
        $this->expectException(NotFoundException::class);
        $getFertilizerSetting = $fertilizerSettingCollection->find($fertilizerSettingId);
    }
}
