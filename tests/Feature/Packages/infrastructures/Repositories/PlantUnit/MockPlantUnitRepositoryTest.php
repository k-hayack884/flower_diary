<?php

namespace Packages\infrastructures\Repositories\PlantUnit;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\PlantUnit\plantName;
use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Domains\PlantUnit\PlantUnitCollection;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\User\UserId;
use App\Packages\infrastructures\PlantUnit\MockPlantUnitRepository;
use PHPUnit\Framework\TestCase;

class MockPlantUnitRepositoryTest extends TestCase
{
    private MockPlantUnitRepository $mockPlantUnitRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mockPlantUnitRepository = new MockPlantUnitRepository();
    }

    public function test_植物ユニットコレクションを返す()
    {
        $result = $this->mockPlantUnitRepository->find();
        $this->assertIsArray($result);
    }

    public function test_植物ユニットIDから検索して情報を取得する()
    {
        $plantUnitId = new PlantUnitId('334c1092-7a0d-40b0-af6e-30bff5975e31');
        $PlantUnit = $this->mockPlantUnitRepository->findById($plantUnitId);
        $this->assertSame($plantUnitId->getId(), $PlantUnit->getPlantUnitId()->getId());
    }

    public function test_存在しない植物ユニットIDから検索すると例外を出すこと()
    {
        $plantUnitId = new PlantUnitId('111c1111-1a1d-11b1-af1e-11bff1111e11');
        $this->expectException(NotFoundException::class);
        $PlantUnit = $this->mockPlantUnitRepository->findById($plantUnitId);
    }

    public function test_設定を追加する()
    {
        $addPlantUnit[] = new PlantUnit(
            new PlantUnitId('532c1092-7a0d-40b0-af6e-30bff5975e31'),
            new PlantId('753c1092-7a0d-40b0-af6e-30bff5975e31'),
            new UserId('883c1092-7a0d-40b0-af6e-30bff5975e31'),
            new CheckSeatId('889c1092-7a0d-40b0-af6e-30bff5975e31'),
            new PlantName('クリスマスローズ'),
            ['553c1092-7a0d-40b0-af6e-30bff5975e31', '321c1092-7a0d-40b0-af6e-30bff5975e31', '902c1092-7a0d-40b0-af6e-30bff5975e31'],
        );

        $plantUnitCollection = new PlantUnitCollection($addPlantUnit);
        $this->mockPlantUnitRepository->save($plantUnitCollection);

        $addPlantUnitArray = $this->mockPlantUnitRepository->find();
        $this->assertSame($addPlantUnit[0]->getPlantUnitId(), $addPlantUnitArray[2]->getPlantUnitId());
    }

    public function test_設定を削除する()
    {
        $plantUnitId =  new PlantUnitId('999c1092-7a0d-40b0-af6e-30bff5975e31');
        $plantUnit= $this->mockPlantUnitRepository->findById($plantUnitId);
        $this->mockPlantUnitRepository->delete($plantUnitId);
        $this->expectException(NotFoundException::class);
        $PlantUnitSetting = $this->mockPlantUnitRepository->findById($plantUnitId);
    }
}
