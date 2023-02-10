<?php

namespace Packages\Usecases\CheckSeat;

use App\Packages\infrastructures\CheckSeat\MockCheckSeatRepository;
use App\Packages\Presentations\Requests\CheckSeat\CreateCheckSeatRequest;
use App\Packages\Usecases\CheckSeat\CreateCheckSeatAction;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatDto;
use PHPUnit\Framework\TestCase;

class CreateCheckSeatActionTest extends TestCase
{
    public function test_作成した水やり設定のレスポンスの型があっていること()
    {
        $request = CreateCheckSeatRequest::create('checkSeat', 'POST', [
            'checkSeat'=>[
                'checkSeat.waterIds'=>['983c1092-7a0d-40b0-af6e-30bff5975e31','334c1092-7a0d-40b0-af6e-30bff5975e31'],
                'checkSeat.fertilizerIds'=>['983c1092-7a0d-40b0-af6e-30bff5975e31','334c1092-7a0d-40b0-af6e-30bff5975e31'],
            ]
        ]);
        $mockCheckSeatRepository = app()->make(MockCheckSeatRepository::class);

        app()->bind(CreateCheckSeatAction::class, function () use (
            $mockCheckSeatRepository
        ) {
            return new CreateCheckSeatAction(
                $mockCheckSeatRepository
            );
        });
        $result = (app()->make(CreateCheckSeatAction::class))->__invoke($request);

        $this->assertInstanceOf(CheckSeatDto::class, $result);
    }
}
