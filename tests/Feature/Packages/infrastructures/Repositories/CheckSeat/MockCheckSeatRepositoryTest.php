<?php

namespace Packages\infrastructures\Repositories\CheckSeat;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;
use App\Packages\Domains\Water\MonthsWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\infrastructures\CheckSeat\MockCheckSeatRepository;
use PHPUnit\Framework\TestCase;

class MockCheckSeatRepositoryTest extends TestCase
{
    private MockCheckSeatRepository $mockCheckSeatRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mockCheckSeatRepository = new MockCheckSeatRepository();
    }

    public function test_チェックシートの配列を返す()
    {
        $result = $this->mockCheckSeatRepository->find();
        $this->assertIsArray($result);
        $this->assertInstanceOf(CheckSeat::class,$result[0]);
    }

    public function test_設定IDから検索して情報を取得する()
    {
        $checkSeatId = new CheckSeatId('777c1092-7a0d-40b0-af6e-30bff5975e31');
        $result = $this->mockCheckSeatRepository->findById($checkSeatId);

        $this->assertSame($checkSeatId->getId(), $result->getCheckSeatId()->getId());
        $this->assertInstanceOf(CheckSeat::class,$result);
    }

    public function test_存在しない設定IDから検索すると例外を出すこと()
    {
        $checkSeatId = new CheckSeatId('111c1111-1a1d-11b1-af1e-11bff1111e11');

        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('指定したチェックシートは見つかりませんでした (id:' . $checkSeatId->getId() . ')');
        $fertilizerSetting = $this->mockCheckSeatRepository->findById($checkSeatId);
    }

    public function test_チェックシートを登録する()
    {
        $waterSettingCollection =
            new WaterSettingCollection(
                [
                    new MonthsWaterSetting(
                        new WaterSettingId('888c6393-7a0d-40b0-af6e-30bff5975e31'),
                        [10, 12],
                        new WaterNote('ちょっとずつ'),
                        new WaterAmount('a_lot'),
                        new WateringTimes(3),
                        new WateringInterval(1),
                        ['00:00', '14:30']
                    ),
                ]
            );
        $fertilizerSettingCollection =
            new FertilizerSettingCollection(
                [
                    new MonthsFertilizerSetting(
                        new FertilizerSettingId('222c1982-7a0d-40b0-af6e-30bff5975e31'),
                        [1, 5, 6],
                        new FertilizerNote('根に直接与えない'),
                        new FertilizerAmount(50),
                        new fertilizerName('液体肥料'),
                    ),
                ]
            );
        $checkSeat =
            new CheckSeat(
                new CheckSeatId('555c1092-7a0d-40b0-af6e-30bff5975e31'),
                $waterSettingCollection,
                $fertilizerSettingCollection
            );
        $this->mockCheckSeatRepository->save($checkSeat);

        $addCheckSeatArray=$this->mockCheckSeatRepository->find();
        $this->assertSame($checkSeat->getCheckSeatId(), $addCheckSeatArray[1]->getCheckSeatId());
        $this->assertCount(count($checkSeat->getWaterSettingCollection()), $addCheckSeatArray[1]->getWaterSettingCollection());
        $this->assertCount(count($checkSeat->getFertilizerSettingCollection()), $addCheckSeatArray[1]->getFertilizerSettingCollection());
    }

    public function test_設定を削除する()
    {
        $checkSeatId = new CheckSeatId('777c1092-7a0d-40b0-af6e-30bff5975e31');
        $deleteCheckSeat=$this->mockCheckSeatRepository->findById($checkSeatId);
        $this->mockCheckSeatRepository->delete($checkSeatId);
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('指定したチェックシートは見つかりませんでした (id:' . $checkSeatId->getId() . ')');
        $fertilizerSetting = $this->mockCheckSeatRepository->findById($checkSeatId);
    }
}
