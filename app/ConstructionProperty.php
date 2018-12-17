<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ConstructionProperty
 * @package App
 * @property int $property_id
 * @property int $construction_id
 * @property string $value
 */
class ConstructionProperty extends Model
{
    public $table = 'properties_constructions';

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function construction(): BelongsTo
    {
        return $this->belongsTo(Construction::class);
    }
}
