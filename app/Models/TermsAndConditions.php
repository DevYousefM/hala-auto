<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class TermsAndConditions extends Model implements ContractsTranslatable
{
    use Translatable;
    protected $table = 'terms_and_conditions';
    public $translatedAttributes = ['content'];
    protected $guarded = [];
}
