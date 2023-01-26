<?php

namespace Packages\infrastructures\Repositories\Water;

use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\infrastructures\Water\WaterRepository;
use PHPUnit\Framework\TestCase;

class WaterRepositoryTest extends TestCase
{
private WaterRepository $waterRepository;

    public function setUp():void
    {
        parent::setUp();
        $this->waterRepository=new WaterRepository();
}

    public function test_設定を1つ取得する()
    {
        $waterSettingId=new WaterSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31');

        $waterSetting=$this->waterRepository->findById($waterSettingId);

        $this->assertNotNull($waterSetting);
        $this->assertEquals($waterSettingId->getId(),$waterSetting->getWaterSettingId());
}


}
