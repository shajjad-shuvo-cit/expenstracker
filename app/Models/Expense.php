<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Expense extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected function relationToCatagory()
    {
        return $this->belongsTo('App\Models\Catagory','catagory_id','id');
    }
    
    protected function relationToSubCatagory()
    {
        return $this->belongsTo('App\Models\SubCatagory','sub_catagory_id','id');
    }


   
}
