<?php

namespace App\Packages\Domains\Plant;

interface PlantRepositoryInterface
{
    public function find();

    public function findByName(string $name);

    public function save(PlantData $plant):void;
    public function addImage(PlantImages $plantImages):void;
    public function delete(PlantData $plant):void;
}
