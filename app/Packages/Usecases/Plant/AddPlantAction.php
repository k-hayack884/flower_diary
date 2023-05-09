<?php

namespace App\Packages\Usecases\Plant;

use App\Http\Services\Base64Service;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\Plant\PlantImages;
use App\Packages\Domains\Plant\PlantRepositoryInterface;
use App\Packages\Presentations\Requests\Plant\AddPlantRequest;
use App\Packages\Usecases\Dto\Plant\PlantWrapDto;
use Illuminate\Support\Facades\Log;

class AddPlantAction
{
    private PlantRepositoryInterface $plantRepository;

    public function __construct(PlantRepositoryInterface $plantRepository)
    {
        $this->plantRepository = $plantRepository;
    }

    public function __invoke(
        AddPlantRequest $addPlantRequest
    ): \Illuminate\Http\JsonResponse
    {
        Log::info(__METHOD__, ['開始']);
        $plantId = new PlantId($addPlantRequest->getPlantId());
        $plantImage1 = $addPlantRequest->getImage1();
        $plantImageFileName1 = Base64Service::base64FileDecode($plantImage1, 'plantImage');
        $plantImage2 = $addPlantRequest->getImage2();
        $plantImageFileName2 = Base64Service::base64FileDecode($plantImage2, 'plantImage');
        $plantImage3 = $addPlantRequest->getImage3();
        $plantImageFileName3 = Base64Service::base64FileDecode($plantImage3, 'plantImage');
        $plantImage4 = $addPlantRequest->getImage4();
        $plantImageFileName4 = Base64Service::base64FileDecode($plantImage4, 'plantImage');
        $plantImage5 = $addPlantRequest->getImage5();
        $plantImageFileName5 = Base64Service::base64FileDecode($plantImage5, 'plantImage');
        $plantImages = new PlantImages(
            $plantId,
            $plantImageFileName1,
            $plantImageFileName2,
            $plantImageFileName3,
            $plantImageFileName4,
            $plantImageFileName5,

        );
        $this->plantRepository->addImage($plantImages);
        Log::info(__METHOD__, ['終了']);
        return response()->json([
            'successMessage' => '画像を登録しました',
        ]);
    }
}
