<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catagory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['status','catagory_name'];

    protected function relationToSubCategory()
    {
        return $this->hasMany('App\Models\SubCatagory');
    }
}
