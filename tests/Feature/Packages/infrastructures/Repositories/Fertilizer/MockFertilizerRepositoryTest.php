<?php

namespace Packages\infrastructures\Repositories\Fertilizer;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;
use App\Packages\infrastructures\Fertilizer\MockFertilizerRepository;
use PHPUnit\Framework\TestCase;

class MockFertilizerRepositoryTest extends TestCase
{

    private MockFertilizerRepository $mockFertilizerRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mockFertilizerRepository = new MockFertilizerRepository();
    }

    public function test_肥料コレクションを返す()
    {
        $result = $this->mockFertilizerRepository->find();
        $this->assertIsArray($result);
    }

    public function test_設定IDから検索して情報を取得する()
    {
        $fertilizerSettingId = new FertilizerSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31');
        $fertilizerSetting = $this->mockFertilizerRepository->findById($fertilizerSettingId);

        $this->assertSame($fertilizerSettingId->getId(), $fertilizerSetting->getFertilizerSettingId()->getId());
    }

    public function test_存在しない設定IDから検索すると例外を出すこと()
    {
        $fertilizerSettingId = new FertilizerSettingId('111c1111-1a1d-11b1-af1e-11bff1111e11');

        $this->expectException(NotFoundException::class);
        $fertilizerSetting = $this->mockFertilizerRepository->findById($fertilizerSettingId);
    }

    public function test_設定を追加する()
    {
        $addFertilizerSetting[] = new MonthsFertilizerSetting(
            new FertilizerSettingId('114c5142-7a0d-40b0-af6e-30bff5975e31'),
            [5, 7, 8],
            new FertilizerNote('たくさんあげよう'),
            new FertilizerAmount(114),
            new FertilizerName('泥'),
    );
        $fertilizerCollection=new FertilizerSettingCollection($addFertilizerSetting);
        $this->mockFertilizerRepository->save($fertilizerCollection);

        $addFertilizerArray=$this->mockFertilizerRepository->find();
        $this->assertSame($addFertilizerSetting[0]->getFertilizerSettingId(), $addFertilizerArray[2]->getFertilizerSettingId());
    }

    public function test_設定を削除する()
    {
        $fertilizerSettingId = new FertilizerSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31');
        $fertilizerSetting=$this->mockFertilizerRepository->findById($fertilizerSettingId);
        $this->mockFertilizerRepository->delete($fertilizerSettingId);
        $this->expectException(NotFoundException::class);
        $fertilizerSetting = $this->mockFertilizerRepository->findById($fertilizerSettingId);
    }
}
