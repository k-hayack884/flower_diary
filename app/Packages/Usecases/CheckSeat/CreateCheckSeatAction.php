<?php

namespace App\Packages\Usecases\CheckSeat;

use App\Exceptions\CheckSeatException;
use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\CheckSeat\CheckSeatRepositoryInterface;
use App\Packages\Presentations\Requests\CheckSeat\CreateCheckSeatRequest;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatDto;
use Illuminate\Support\Facades\Log;

class CreateCheckSeatAction
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
     * @param CreateCheckSeatRequest $createCheckSeatRequest
     * @return CheckSeatDto
     * @throws CheckSeatException
     */
    public function __invoke(
        CreateCheckSeatRequest $createCheckSeatRequest
    ): CheckSeatDto
    {
        Log::info(__METHOD__, ['開始']);
        $waterSettingIds = $createCheckSeatRequest->getWaterIds();
        $fertilizerSettingIds = $createCheckSeatRequest->getFertilizerIds();

        try {
            $checkSeatId = new CheckSeatId();
            $checkSeat = new CheckSeat(
                $checkSeatId,
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
