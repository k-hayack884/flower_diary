<?php

namespace App\Packages\Usecases\CheckSeat;

use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\CheckSeat\CheckSeatRepositoryInterface;
use App\Packages\Presentations\Requests\CheckSeat\GetCheckSeatRequest;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatDto;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatWrapDto;

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
        $checkSeatId=$getCheckSeatRequest->getId();
        $checkSeatArray = $this->checkSeatRepository->findById(new CheckSeatId($checkSeatId));
        $checkSeat=new CheckSeat(new CheckSeatId($checkSeatId),$checkSeatArray['water_ids'],$checkSeatArray['fertilizer_ids']);

        return CheckSeatDtoFactory::create($checkSeat);
    }
}
