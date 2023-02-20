<?php

namespace Packages\Usecases\CheckSeat;

use App\Packages\infrastructures\CheckSeat\MockCheckSeatRepository;
use App\Packages\Presentations\Requests\CheckSeat\GetCheckSeatRequest;
use App\Packages\Usecases\CheckSeat\GetCheckSeatAction;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatDto;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatWrapDto;
use PHPUnit\Framework\TestCase;

class GetCheckSeatActionTest extends TestCase
{
    public function test_水やり設定のレスポンスの型があっていること()
    {
        $checkSeatId= '777c1092-7a0d-40b0-af6e-30bff5975e31';
        $request = GetCheckSeatRequest::create('checkseat', 'GET', [
                'checkSeatId'=>'777c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockCheckSeatSettingRepository = app()->make(MockCheckSeatRepository::class);

        app()->bind(GetCheckSeatAction::class, function () use (
            $mockCheckSeatSettingRepository
        ) {
            return new GetCheckSeatAction(
                $mockCheckSeatSettingRepository
            );
        });
        $result = (app()->make(GetCheckSeatAction::class))->__invoke($request);

        $this->assertInstanceOf(CheckSeatDto::class, $result);
        $this->assertSame('777c1092-7a0d-40b0-af6e-30bff5975e31',$result->checkSeatId);
    }
}
