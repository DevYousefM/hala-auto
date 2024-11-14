<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model implements TranslatableContract
{
    use Translatable;
    protected $fillable = ['image', 'status'];
    public $translatedAttributes = ['title'];

    public function getImageAttribute()
    {
        if ($this->attributes['image'] == 'default.jpg') {
            return asset('default.jpg');
        }
        if ($this->attributes['image'] !== null) {
            return URL('storage/sliders/images') . '/' . $this->attributes['image'];
        }
        return null;
    }
    public function delete_image()
    {
        if ($this->attributes['image'] !== null) {
            Storage::disk('public')->delete('sliders/images/' . basename($this->attributes['image']));
        }
    }
}
