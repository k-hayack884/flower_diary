<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Water\FertilizerSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Fertilizer\DeleteFertilizerSettingRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use PHPUnit\Exception;

class DeleteFertilizerSettingAction
{
    /**
     * @var FertilizerRepositoryInterface
     */
    private FertilizerRepositoryInterface $fertilizerSettingRepository;

    /**
     * @param FertilizerRepositoryInterface $fertilizerSettingRepository
     */
    public function __construct(FertilizerRepositoryInterface $fertilizerSettingRepository)
    {
        $this->fertilizerSettingRepository = $fertilizerSettingRepository;
    }

    /**
     * @param DeleteFertilizerSettingRequest $deleteFertilizerSettingRequest
     * @return void
     */

    public function __invoke(
        DeleteFertilizerSettingRequest $deleteFertilizerSettingRequest,
    ): void
    {
        Log::info(__METHOD__, ['開始']);

        try {
            $fertilizerSettingId=$deleteFertilizerSettingRequest->getId();
            $this->fertilizerSettingRepository->delete(new FertilizerSettingId($fertilizerSettingId));
            Session::flash('successMessage', '削除に成功しました');

        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            Session::flash('failMessage', '削除に失敗しました');

            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }
    }
}
