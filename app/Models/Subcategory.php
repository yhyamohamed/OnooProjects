<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;


class Subcategory extends Model implements HasMedia
{
    use HasMediaTrait {
        getFirstMediaUrl as protected getFirstMediaUrlTrait;
    }
  
    public $fillable = [
        'name',
        'description',
        'field',
        'category_id'
    ];
    
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'category_id' => 'required'
    ];
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'category_id' => 'integer'
    ];

    protected $appends = [
        'custom_fields',
        'has_media'
    ];


    public $table = 'subcategories';
    
    public function Categories()
    {
        return $this->belongsTo(\App\Models\Category::class,'category_id');
    }
    public function childcategory()
    {
        return $this->hasMany(\App\Models\Childcategory::class);
    }

   
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 200, 200)
            ->sharpen(10);

        $this->addMediaConversion('icon')
            ->fit(Manipulations::FIT_CROP, 100, 100)
            ->sharpen(10);
    }

    public function customFieldsValues()
    {
        return $this->morphMany('App\Models\CustomFieldValue', 'customizable');
    }

    public function getFirstMediaUrl($collectionName = 'default',$conversion = '')
    {
        $url = $this->getFirstMediaUrlTrait($collectionName);
        $array = explode('.', $url);
        $extension = strtolower(end($array));
        if (in_array($extension,config('medialibrary.extensions_has_thumb'))) {
            return asset($this->getFirstMediaUrlTrait($collectionName,$conversion));
        }else{
            return asset(config('medialibrary.icons_folder').'/'.$extension.'.png');
        }
    }


    public function getCustomFieldsAttribute()
    {
        $hasCustomField = in_array(static::class,setting('custom_field_models',[]));
        if (!$hasCustomField){
            return [];
        }
        $array = $this->customFieldsValues()
            ->join('custom_fields','custom_fields.id','=','custom_field_values.custom_field_id')
            ->where('custom_fields.in_table','=',true)
            ->get()->toArray();

        return convertToAssoc($array,'name');
    }

    public function getHasMediaAttribute()
    {
        return $this->hasMedia('image') ? true : false;
    }

}
