<?php

namespace Packages\infrastructures\Repositories\CheckSeat;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\infrastructures\CheckSeat\MockCheckSeatRepository;
use PHPUnit\Framework\TestCase;

class MockCheckSeatRepositoryTest extends TestCase
{
    private MockCheckSeatRepository $mockCheckSeatRepository;

    public function test_チェックシートの配列を返す()
    {
        $result = $this->mockCheckSeatRepository->find();
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
    }

    public function test_設定IDから検索して情報を取得する()
    {
        $checkSeatId = new CheckSeatId('777c1092-7a0d-40b0-af6e-30bff5975e31');
        $result = $this->mockCheckSeatRepository->findById($checkSeatId);

        $this->assertIsArray($result);
        $this->assertSame('777c1092-7a0d-40b0-af6e-30bff5975e31', $result['check_seat_id']);
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
        $waterSettingId =['565c6393-7a0d-40b0-af6e-30bff5975e31'];
        $fertilizerSettingId=['000c1982-7a0d-40b0-af6e-30bff5975e31'];

        $checkSeat =
            new CheckSeat(
                new CheckSeatId('900c1092-7a0d-40b0-af6e-30bff5975e31'),
                $waterSettingId,
                $fertilizerSettingId
            );
        $this->mockCheckSeatRepository->save($checkSeat);

        $addCheckSeatArray = $this->mockCheckSeatRepository->find();
        $this->assertSame($checkSeat->getCheckSeatId()->getId(), $addCheckSeatArray[2]['check_seat_id']);
        $this->assertSame($checkSeat->getWaterSettingIds(), $addCheckSeatArray[2]['water_ids']);
        $this->assertSame($checkSeat->getFertilizerSettingIds(), $addCheckSeatArray[2]['fertilizer_ids']);
    }

    public function test_設定を削除する()
    {
        $checkSeatId = new CheckSeatId('777c1092-7a0d-40b0-af6e-30bff5975e31');
        $deleteCheckSeat = $this->mockCheckSeatRepository->findById($checkSeatId);
        $this->mockCheckSeatRepository->delete($checkSeatId);
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('指定したチェックシートは見つかりませんでした (id:' . $checkSeatId->getId() . ')');
        $fertilizerSetting = $this->mockCheckSeatRepository->findById($checkSeatId);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->mockCheckSeatRepository = new MockCheckSeatRepository();
    }
}
