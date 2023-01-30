<?php

namespace App\Packages\Usecases\CheckSeat;

use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\CheckSeat\CheckSeatRepositoryInterface;
use App\Packages\Presentations\Requests\CheckSeat\CreateCheckSeatRequest;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatDto;

class CreateCheckSeatAction
{
    public function __construct(CheckSeatRepositoryInterface $checkSeatRepository)
    {
        $this->$checkSeatRepository = $checkSeatRepository;
    }

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
            $fertilizerSettingMonths = $requestArray['checkSeat.waterIds'];
            $fertilizerSettingNote = new FertilizerNote($requestArray['checkSeat.fertilizerIds']);

            $fertilizerSetting = new MonthsFertilizerSetting(
                $fertilizerSettingId,
                $fertilizerSettingMonths,
                $fertilizerSettingNote,
                $fertilizerSettingAmount,
                $fertilizerSettingName,
            );
            $FertilizerSettingCollection=new FertilizerSettingCollection();
            $this->fertilizerSettingRepository->save($FertilizerSettingCollection);
        } catch (Exception $e) {
            throw  $e;
        }
        return FertilizerSettingsDtoFactory::create($fertilizerSetting);
    }
}
