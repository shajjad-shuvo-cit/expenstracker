<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCatagory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['status','sub_catagory_name'];
    protected function relationToCatagory()
    {
        return $this->belongsTo('App\Models\Catagory','catagory_id','id');
    }
}
