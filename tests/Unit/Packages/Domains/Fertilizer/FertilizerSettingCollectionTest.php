<?php

namespace Packages\Domains\Fertilizer;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;
use PHPUnit\Framework\TestCase;

class FertilizerSettingCollectionTest extends TestCase
{
    public function test_オブジェクトが生成されること()
    {
        $fertilizerSettings = [
            new MonthsFertilizerSetting(
                new FertilizerSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('株からある程度離して'),
                new FertilizerAmount(100),
                new fertilizerName('牛糞堆肥'),
            ),
            new MonthsFertilizerSetting(
                new FertilizerSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('なんでや！阪神関係ないやろ！'),
                new FertilizerAmount(334),
                new fertilizerName('腐葉土'),
            ),
        ];

        $fertilizerSettingCollection = new FertilizerSettingCollection($fertilizerSettings);

        $this->assertCount(count($fertilizerSettings), $fertilizerSettingCollection);
        foreach ($fertilizerSettingCollection as $index => $fertilizerSetting) {
            $this->assertSame($index, $fertilizerSetting->getFertilizerSettingId()->getId());
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
            new MonthsFertilizerSetting(
                new FertilizerSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('株からある程度離して'),
                new FertilizerAmount(100),
                new fertilizerName('牛糞堆肥'),
            ),
            new MonthsFertilizerSetting(
                new FertilizerSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('なんでや！阪神関係ないやろ！'),
                new FertilizerAmount(334),
                new fertilizerName('腐葉土'),
            ),
        ];

        $fertilizerSettingCollection = new FertilizerSettingCollection($fertilizerSettings);

        $addFertilizerSettingSetting =
            new MonthsFertilizerSetting(
                new FertilizerSettingId('114c5142-7a0d-40b0-af6e-30bff5975e31'),
                [5, 7, 8],
                new FertilizerNote('たくさんあげよう'),
                new FertilizerAmount(114),
                new fertilizerName('泥'),
            );
        $fertilizerSettingCollection->add($addFertilizerSettingSetting);
        $fertilizerSettings[] = $addFertilizerSettingSetting;

        $this->assertCount(count($fertilizerSettings), $fertilizerSettingCollection);
        foreach ($fertilizerSettingCollection as $index => $fertilizerSetting) {
            $this->assertSame($index, $fertilizerSetting->getFertilizerSettingId()->getId());
        }

    }
    public function test_設定を削除すること()
    {
        $fertilizerSettings = [
            new MonthsFertilizerSetting(
                new FertilizerSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('株からある程度離して'),
                new FertilizerAmount(100),
                new fertilizerName('牛糞堆肥'),
            ),
            new MonthsFertilizerSetting(
                new FertilizerSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('なんでや！阪神関係ないやろ！'),
                new FertilizerAmount(334),
                new fertilizerName('腐葉土'),
            ),
        ];


        $fertilizerSettingCollection = new FertilizerSettingCollection($fertilizerSettings);
        $fertilizerSettingId = new FertilizerSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31');
        $deleteFertilizerSetting = $fertilizerSettingCollection->findById($fertilizerSettingId);

        $fertilizerSettingCollection->delete($deleteFertilizerSetting);
        $this->expectException(NotFoundException::class);
        $getFertilizerSetting = $fertilizerSettingCollection->findById($fertilizerSettingId);
    }
    public function test_月が被ったオブジェクトを摘出すること()
    {
        $fertilizerSettings = [
            new MonthsFertilizerSetting(
                new FertilizerSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('株からある程度離して'),
                new FertilizerAmount(100),
                new fertilizerName('牛糞堆肥'),
            ),
            new MonthsFertilizerSetting(
                new FertilizerSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('なんでや！阪神関係ないやろ！'),
                new FertilizerAmount(334),
                new fertilizerName('腐葉土'),
            ),
            new MonthsFertilizerSetting(
                new FertilizerSettingId('893c1092-7a0d-40b0-af6e-30bff5975e31'),
                [5, 7, 9],
                new FertilizerNote('豪快に撒く'),
                new FertilizerAmount(111),
                new fertilizerName('腐葉土'),
            ),
        ];

        $fertilizerSettingCollection = new FertilizerSettingCollection($fertilizerSettings);
        $duplicationCollection=$fertilizerSettingCollection->duplicationDisplay();
        $this->assertSame($fertilizerSettingCollection->getValue(0),$duplicationCollection->getValue(0));
        $this->assertSame($fertilizerSettingCollection->getValue(2),$duplicationCollection->getValue(1));
    }
    public function test_月が被っているが、名前はかぶっていないので、空のオブジェクトを返していること()
    {
        $fertilizerSettings = [
            new MonthsFertilizerSetting(
                new FertilizerSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('株からある程度離して'),
                new FertilizerAmount(100),
                new fertilizerName('牛糞堆肥'),
            ),
            new MonthsFertilizerSetting(
                new FertilizerSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('なんでや！阪神関係ないやろ！'),
                new FertilizerAmount(334),
                new fertilizerName('腐葉土'),
            ),
            new MonthsFertilizerSetting(
                new FertilizerSettingId('893c1092-7a0d-40b0-af6e-30bff5975e31'),
                [5, 7, 9],
                new FertilizerNote('豪快に撒く'),
                new FertilizerAmount(111),
                new fertilizerName('泥'),
            ),
        ];
        $fertilizerSettingCollection = new fertilizerSettingCollection($fertilizerSettings);
        $duplicationCollection=$fertilizerSettingCollection->duplicationDisplay();
        $this->assertCount(0, $duplicationCollection);
    }
}
