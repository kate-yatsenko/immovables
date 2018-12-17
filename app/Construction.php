<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class Construction
 * @package App
 * @property int $id
 */
class Construction extends Model
{
    const IS_OWNER = 0;
    const IS_INTERMEDIARY = 1;

    protected $fillable = ['description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function properties()
    {
        return $this->belongsToMany(
            Property::class,
            'properties_constructions',
            'construction_id',
            'property_id'
        );
    }

    public static function add($fields)
    {
        $construction = new self;
        $construction->fill($fields);
        $construction->save();
        return $construction;
    }

    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }

    public function remove(){
        $this->removeRelations();
        $this->removeImages();
        $this->images()->delete();
        $this->delete();

    }

    private function removeImages(){
        foreach($this->images as $image) {
            $image->removeImage();
        }
    }

    private function removeRelations(){
        DB::table('properties_constructions')->where('construction_id', $this->id)->delete();
    }

    public function getValuesTitles(){
        return ConstructionProperty::where('construction_id', $this->id)->with('property')->get();
    }

    public function getImages()
    {
        if ($this->images == null) {
            return '/img/no-image.png';
        }
        return $this->images;
    }

    public function setCategory($id)
    {
        if ($id == null) {
            return;
        }
        $this->category_id = $id;
        $this->save();
    }

    public function getCategoryTitle()
    {
        return $this->category->title;
    }

    public function setCity($id)
    {
        if ($id == null) {
            return;
        }
        $this->city_id = $id;
        $this->save();
    }

    public function getCityTitle()
    {
        return $this->city->title;
    }

    public function setDistrict($id)
    {
        if ($id == null) {
            return;
        }
        $this->district_id = $id;
        $this->save();
    }

    public function getDistrictTitle()
    {
        return ($this->district)?
            ($this->district->title): 'Нету района';
    }

    public function setType($id)
    {
        if ($id == null) {
            return;
        }
        $this->type_id = $id;
        $this->save();
    }

    public function getTypeTitle()
    {
        return $this->type->title;
    }

    public function setIntermediary()
    {
        $this->is_intermediary = Construction::IS_INTERMEDIARY;
        $this->save();
    }

    public function setOwner()
    {
        $this->is_intermediary = Construction::IS_OWNER;
        $this->save();
    }

    public function toggleIntermediary($value)
    {
        if ($value == null) {
            return $this->setOwner();
        }

        return $this->setIntermediary();
    }

    public function getOwner(){
        if($this->is_intermediary == Construction::IS_OWNER) {
            return 'Хозяин';
        }
        return 'Посредник';
    }

    public function getCityId(){
        return $this->city!=null ? $this->city->id : null;
    }

    public function getDistrictId(){
        return $this->district!=null ? $this->district->id : null;
    }

    public function getCategoryId(){
        return $this->category!=null ? $this->category->id : null;
    }

    public function getTypeId(){
        return $this->type!=null ? $this->type->id : null;
    }
}
