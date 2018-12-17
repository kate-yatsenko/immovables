<?php

namespace App\Repository;

use App\Construction;
use App\ConstructionProperty;
use Illuminate\Database\Eloquent\Collection;

class ConstructionPropertyRepository
{
    public static function factory(): self
    {
        return new self();
    }

    public function saveProperty(Construction $construction,array $properties): bool
    {
        ConstructionProperty::whereNotIn('property_id',array_keys($properties))
            ->where('construction_id',$construction->id)
            ->delete();

        if (\count($properties) < 1) {
            return false;
        }

        $propertiesDB = ConstructionProperty::where('construction_id',$construction->id)
            ->get()
            ->keyBy('property_id');

        foreach ($properties as $id => $values) {
            $property = $this->getProperty($id,$propertiesDB,$construction->id);
            $property->value = $values;
            $property->save();
        }

        return true;
    }

    private function getProperty(int $id,Collection $properties,int $constructionID): ConstructionProperty
    {
        if (isset($properties[$id])) {
            return $properties[$id];
        }
        $property = new ConstructionProperty();
        $property->property_id = $id;
        $property->construction_id = $constructionID;
        return $property;
    }
}