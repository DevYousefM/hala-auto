<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['branch_phone','status'];
    public $translatedAttributes = ['branch_name', 'branch_address',  'branch_services'];
}
