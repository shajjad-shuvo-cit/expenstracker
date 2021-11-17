<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catagory;
use App\Models\SubCatagory;

use Str;
use Carbon\Carbon;

class SubCatagoryController extends Controller
{
    //to view sub catagory create page;
    public function create()
    {
        return view('subcatagory.create',[
            'catagories' => Catagory::all(),
        ]);
    }

    //to store sub catagory in database;
    public function store(Request $request)
    {
        $request->validate([
            'catagory_id' => 'required',
            'sub_catagory_name' => 'required',
        ]);

        $sub_catagory_name = Str::upper($request->sub_catagory_name);
        if(SubCatagory::where('sub_catagory_name',$sub_catagory_name)->doesntExist()){
            SubCatagory::insert([
                'catagory_id' => $request->catagory_id,
                'sub_catagory_name' => $sub_catagory_name,
                'created_at' => Carbon::now(),
            ]);
            return back()->with('success','Inserted Successfully !');
        }else{
            return back()->with('fail','Already Added !');
        }
    }

    //to view subcatagory index page;
    public function index()
    {
        return view('subcatagory.index',[
            'all_sub_catagories' => SubCatagory::all(),
        ]);
    }

    //de-active subcatagory
    public function deactive($id)
    {
        SubCatagory::find($id)->update([
            'status' => 2,
        ]);
        return back();
    }

    //active subcatagory
    public function active($id)
    {
        SubCatagory::find($id)->update([
            'status' => 1,
        ]);
        return back();
    }

    //soft delete subcatagory
    public function delete($id)
    {
        SubCatagory::find($id)->delete();
        return back();
    }

    //to view trashed subcatagory;
    public function trash()
    {
        return view('subcatagory.trash',[
            'all_trashed' => SubCatagory::onlyTrashed()->get(),
        ]);
    }

    //to restore subcatagory;
    public function restore($id)
    {
        SubCatagory::withTrashed()->where('id',$id)->restore();
        return redirect('/subcatagory/trash');
    }

    //to delete subcatagory items from database
    public function forcedelete($id)
    {
        SubCatagory::withTrashed()->where('id',$id)->forceDelete();
        return redirect('/subcatagory/trash');
    }

    //to view edit page for subcatagory item
    public function edit($id)
    {
        return view('subcatagory.edit',[
            'sub_catagory_info' => SubCatagory::find($id),
            'catagories' => Catagory::all(),
        ]);
    }

    //to update subcatagory ;
    public function update(Request $request)
    {
        SubCatagory::find($request->id)->update([
            'sub_catagory_name' => Str::upper($request->sub_catagory_name),
        ]);
        return back();
    }









}
