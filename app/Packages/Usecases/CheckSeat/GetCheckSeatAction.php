<?php

namespace App\Packages\Usecases\CheckSeat;

use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\CheckSeat\CheckSeatRepositoryInterface;
use App\Packages\Presentations\Requests\CheckSeat\GetCheckSeatRequest;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatDto;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatWrapDto;
use Illuminate\Support\Facades\Log;

class GetCheckSeatAction
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
     * @param GetCheckSeatRequest $getCheckSeatRequest
     * @return CheckSeatDto
     */
    public function __invoke(
        GetCheckSeatRequest $getCheckSeatRequest,
    ): CheckSeatDto
    {
        Log::info(__METHOD__, ['開始']);

        $checkSeatId=$getCheckSeatRequest->getId();
        $checkSeat = $this->checkSeatRepository->findById(new CheckSeatId($checkSeatId));
        Log::info(__METHOD__, ['終了']);

        return CheckSeatDtoFactory::create($checkSeat);
    }
}
