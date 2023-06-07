<?php

namespace App\Packages\Usecases\Plant;

use App\Http\Services\Base64Service;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\Plant\PlantImages;
use App\Packages\Domains\Plant\PlantRepositoryInterface;
use App\Packages\Presentations\Requests\Plant\AddPlantRequest;
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
        $plantImageFileNames = [];
        foreach ($addPlantRequest->getPlantImages() as $image) {
            $plantImageFileNames[] = Base64Service::base64FileDecode($image, 'plantImage');
        }
        $plantImages = new PlantImages(
            $plantId,
            $plantImageFileNames,
        );
        $this->plantRepository->addImage($plantImages);
        Log::info(__METHOD__, ['終了']);
        return response()->json([
            'successMessage' => '画像を登録しました',
        ]);
    }
}
