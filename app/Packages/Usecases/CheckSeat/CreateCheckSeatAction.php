<?php

namespace App\Packages\Usecases\CheckSeat;

use App\Exceptions\CheckSeatException;
use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\CheckSeat\CheckSeatRepositoryInterface;
use App\Packages\Presentations\Requests\CheckSeat\CreateCheckSeatRequest;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatDto;
use App\Packages\Usecases\Fertilizer\FertilizerSettingsDtoFactory;

class CreateCheckSeatAction
{
    public function __construct(CheckSeatRepositoryInterface $checkSeatRepository)
    {
        $this->checkSeatRepository = $checkSeatRepository;
    }

    /**
     * @throws CheckSeatException
     */
    public function __invoke(
        CreateCheckSeatRequest $createCheckSeatRequest
    ):CheckSeatDto
    {
        $requestArray = [
            'checkSeat.waterIds' => $createCheckSeatRequest->getWaterIds(),
            'checkSeat.fertilizerIds' => $createCheckSeatRequest->getFertilizerIds(),
        ];

        try {
            $checkSeatId = new CheckSeatId();
            $waterSettingIds = $requestArray['checkSeat.waterIds'];
            $fertilizerSettingIds =$requestArray['checkSeat.fertilizerIds'];

            $checkSeat = new CheckSeat(
                $checkSeatId,
                $waterSettingIds,
                $fertilizerSettingIds
            );
            $this->checkSeatRepository->save($checkSeat);
        } catch (CheckSeatException $e) {
            throw  $e;
        }
        return CheckSeatDtoFactory::create($checkSeat);
    }
}
