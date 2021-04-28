<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Childcategory extends Model
{
    use HasMediaTrait {
        getFirstMediaUrl as protected getFirstMediaUrlTrait;
    }
    public $fillable = [
        'name',
        'description',
        'subcategory_id'
    ];
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'subcategory_id' => 'required'
    ];
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'subcategory_id' => 'integer'
    ];

    public $table = 'child_category';

    public function Subcategories()
    {
        return $this->belongsTo(\App\Models\Subcategory::class,'subcategory_id');
    }
}
