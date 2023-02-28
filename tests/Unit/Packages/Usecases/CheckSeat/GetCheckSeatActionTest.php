<?php

namespace Packages\Usecases\CheckSeat;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\infrastructures\CheckSeat\MockCheckSeatRepository;
use App\Packages\Presentations\Requests\CheckSeat\GetCheckSeatRequest;
use App\Packages\Usecases\CheckSeat\GetCheckSeatAction;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatDto;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatWrapDto;
use PHPUnit\Framework\TestCase;

class GetCheckSeatActionTest extends TestCase
{
    public function test_チェックシートのレスポンスの型があっていること()
    {
        $request = GetCheckSeatRequest::create('checkseat', 'GET', [
                'checkSeatId'=>'555c1092-7a0d-40b0-af6e-30bff5975e31'
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
        $this->assertSame('555c1092-7a0d-40b0-af6e-30bff5975e31',$result->checkSeatId);
    }

    public function test_存在しないチェックシートIDを指定するとエラーが出ること()
    {
        $checkSeatId=new Uuid();
        $request = GetCheckSeatRequest::create('checkseat', 'GET', [
            'checkSeatId'=>$checkSeatId
        ]);
        $mockCheckSeatSettingRepository = app()->make(MockCheckSeatRepository::class);

        app()->bind(GetCheckSeatAction::class, function () use (
            $mockCheckSeatSettingRepository
        ) {
            return new GetCheckSeatAction(
                $mockCheckSeatSettingRepository
            );
        });

        $this->expectExceptionMessage('指定したチェックシートIDは見つかりませんでした (id:' . $checkSeatId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(GetCheckSeatAction::class))->__invoke($request);
    }
}
