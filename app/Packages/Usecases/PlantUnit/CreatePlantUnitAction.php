<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Http\Services\Base64Service;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\PlantUnit\PlantName;
use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Domains\PlantUnit\PlantUnitCollection;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitImage;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\Infrastructures\Plant\PlantRepository;
use App\Packages\Presentations\Requests\PlantUnit\CreatePlantUnitRequest;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitWrapDto;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Log;

class CreatePlantUnitAction
{
    /**
     * @var PlantUnitRepositoryInterface
     */
    private PlantUnitRepositoryInterface $plantUnitRepository;
    private PlantRepository $plantRepository;

    /**
     * @param PlantUnitRepositoryInterface $plantUnitRepository
     * @param PlantRepository $plantRepository
     */
    public function __construct(PlantUnitRepositoryInterface $plantUnitRepository, PlantRepository $plantRepository)
    {
        $this->plantUnitRepository = $plantUnitRepository;
        $this->plantRepository = $plantRepository;
    }

    /**
     * @param CreatePlantUnitRequest $createPlantUnitRequest
     * @return PlantUnitWrapDto
     * @throws Exception
     */
    public function __invoke(
        CreatePlantUnitRequest $createPlantUnitRequest
    ): PlantUnitWrapDto
    {

        //画像の処理
        $imageFile = $createPlantUnitRequest->file('image');

        Log::info(__METHOD__, ['開始']);
        try {
            $plantUnitId = new PlantUnitId();
            $plantId = new PlantId($createPlantUnitRequest->getPlantUnitPlantId());
            $userId = new UserId($createPlantUnitRequest->getPlantUnitUserId());
            $plantUnitCheckSeatId = new CheckSeatId();
            $plantName = $this->plantRepository->findPlantNameById($plantId);
            $plantName = new PlantName($plantName);
            $plantImageData = $createPlantUnitRequest->getPlantImage();
            $plantImageFileName = Base64Service::base64FileDecode($plantImageData, 'plantUnitImage');
            $plantImage = new PlantUnitImage($plantImageFileName);
            $plantDiaries = [];
            $plantUnit = new PlantUnit(
                $plantUnitId,
                $plantId,
                $userId,
                $plantUnitCheckSeatId,
                $plantName,
                $plantImage,
                $plantDiaries
            );
           $plantUnitCollection = new PlantUnitCollection();
            $plantUnitCollection->addUnit($plantUnit);
            $this->plantUnitRepository->save($plantUnitCollection);
            Session::flash('successMessage', '登録に成功しました');

        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            Session::flash('failMessage', '登録に失敗しました');

            abort(400, $e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return PlantUnitDtoFactory::create($plantUnit);
    }
}
