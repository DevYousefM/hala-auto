<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchTranslation extends Model
{
    protected $fillable = ['branch_name', 'branch_address', 'branch_services'];
    protected $timestamps = false;
}
