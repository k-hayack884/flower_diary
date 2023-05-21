<?php

namespace App\Packages\Usecases\CheckSeat;

use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\CheckSeat\CheckSeatRepositoryInterface;
use App\Packages\Presentations\Requests\CheckSeat\ResetCheckSeatRequest;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatDto;
use Illuminate\Support\Facades\Log;

class ResetCheckSeatAction
{
    private CheckSeatRepositoryInterface $checkSeatRepository;

    /**
     * @param CheckSeatRepositoryInterface $checkSeatRepository
     */
    public function __construct(CheckSeatRepositoryInterface $checkSeatRepository)
    {
        $this->checkSeatRepository = $checkSeatRepository;
    }

    /**
     * @param ResetCheckSeatRequest $resetCheckSeatRequest
     * @return CheckSeatDto
     */
    public function __invoke(
        ResetCheckSeatRequest $resetCheckSeatRequest
    ): CheckSeatDto
    {
        Log::info(__METHOD__, ['開始']);

        try {
            $checkSeatId = $resetCheckSeatRequest->getCheckSeatId();
            $waterSettingIds=[];
            $fertilizerSettingIds=[];
            $checkSeat = new CheckSeat(
                new CheckSeatId($checkSeatId),
                $waterSettingIds,
                $fertilizerSettingIds
            );

            $this->checkSeatRepository->save($checkSeat);
        } catch (\DomainException $e) {
            Log::error(__METHOD__,['エラー']);
            abort(400, $e);
        }finally{
            Log::info(__METHOD__, ['終了']);
        }

        return CheckSeatDtoFactory::create($checkSeat);
    }
}
