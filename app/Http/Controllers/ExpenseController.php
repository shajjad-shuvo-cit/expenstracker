<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catagory;
use App\Models\SubCatagory;
use App\Models\Expense;

use Carbon\Carbon;
use Str;


class ExpenseController extends Controller
{
    //to view catagory page;
    public function create()
    {
        return view('expense.create',[
            'catagories' => Catagory::where('status',1)->get(),
        ]);
    }

    //get sub catagory by ajax
    public function getsubcatagory(Request $request)
    {
        $catagory_id =  $request->catagory_id;
        $sub_catagories = SubCatagory::where('catagory_id',$catagory_id)->get();

        $output = "";

        foreach($sub_catagories as $sub_catagory){
            $output .= "<option value='$sub_catagory->id'>$sub_catagory->sub_catagory_name</option>";
        }

        echo $output;
    }


    //to store expense in database;
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'catagory_id' => 'required',
            'amount' => 'required',
            'remark' => 'required',
        ]);
        
        if(Expense::where('date',$request->date)->where('remark',$request->remark)->doesntExist()){
            Expense::insert([
                'date' => $request->date,
                'catagory_id' => $request->catagory_id,
                'sub_catagory_id' => $request->sub_catagory_id,
                'amount' => $request->amount,
                'remark' => Str::upper($request->remark),
                'created_at' => Carbon::now(),
            ]);
            return back()->with('success','Inserted Successfully !');
        }else{
            return back()->with('fail','Already Added !');
        }
    }

    //to view expense page;
    public function index()
    {
        return view('expense.index',[
            'all_expenses' => Expense::all(),
            'catagories' => Catagory::where('status',1)->get(),
        ]);
    }








}
