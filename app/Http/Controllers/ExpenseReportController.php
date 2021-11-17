<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catagory;
use App\Models\SubCatagory;
use App\Models\Expense;

use Carbon\Carbon;
use Str;


class ExpenseReportController extends Controller
{
    //
    public function index()
    {
        return view('expense.report',[
            'all_catagory_names' => Expense::groupBy('catagory_id')->selectRaw('sum(amount) as sum,catagory_id')->get(),
        ]);

        // $all_sub_cats = Expense::where('catagory_id',1)
        // ->groupBy('sub_catagory_id')
        // ->selectRaw('sum(amount) as sum,sub_catagory_id')
        // ->get();

        // $cat = Catagory::where('id',1)->get();
        // foreach ($cat as $catagory) {
        //     if($catagory->relationToSubCategory->count() > 0 ){
        //         foreach ($catagory->relationToSubCategory as $subcat) {
        //             echo $subcat->sub_catagory_name;
        //             echo '<br>';
        //         }
        //     }
        }


    public function catagorytable(Request $request)
    {
        
       $all_sub_cats = Expense::where('catagory_id',$request->catagory_id)->groupBy('sub_catagory_id')->selectRaw('sum(amount) as sum,sub_catagory_id')->get();

        $output = '
            <table class="table table-bordered">
            <thead>
                <th>Sub Catagory </th>
                <th> Total </th>
            </thead>
            <tbody>
        ';

        foreach($all_sub_cats as $sub_cat){
            if($sub_cat->sub_catagory_id != null){
                $output .= "
                <tr>
                    <td> ". $sub_cat->relationToSubCatagory->sub_catagory_name ."</td>
                    <td> $sub_cat->sum </td>
                </tr>    
            ";
            }else{
                $output .= "
                    <tr>
                        <td colspan='3'>no sub catagory here </td>
                    </tr>
                ";
            }
        }

        $output .= '
            </tbody>
        </table>    
        ';
        echo $output;
    }
















}
