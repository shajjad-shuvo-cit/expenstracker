<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catagory;

use Str;
use Carbon\Carbon;

class CatagoryController extends Controller
{
    //to view catagory page;
    public function create()
    {
        return view('catagory.create');
    }

    //to store catagory data in database;
    public function store(Request $request)
    {
        $request->validate([
            'catagory_name' => 'required',
        ]);
       $catagory_name = Str::upper($request->catagory_name);
       if(Catagory::where('catagory_name',$catagory_name)->doesntExist()){
            Catagory::insert([
                'catagory_name' => $catagory_name,
                'created_at' => Carbon::now(),
            ]);
            return back()->with('success','Inserted Successfully !');
       }else{
           return back()->with('fail','Already Added !');
       }
    }

    //to view catagory index page;
    public function index()
    {
        // $all_catagories = Catagory::all();
        return view('catagory.index',[
            'all_catagories' => Catagory::all(),
        ]);
    }

    //de-active catagory
    public function deactive($id)
    {
        Catagory::find($id)->update([
            'status' => 2,
        ]);
        return back();
    }

    //active catagory
    public function active($id)
    {
        Catagory::find($id)->update([
            'status' => 1,
        ]);
        return back();
    }

    //soft delete catagory
    public function delete($id)
    {
        Catagory::find($id)->delete();
        return back();
    }

    //to view trashed catagory;
    public function trash()
    {
        return view('catagory.trash',[
            'all_trashed' => Catagory::onlyTrashed()->get(),
        ]);
    }

    //to restore catagory;
    public function restore($id)
    {
        Catagory::withTrashed()->where('id',$id)->restore();
        return redirect('/catagory/trash');
    }

    //to delete catagory items from database
    public function forcedelete($id)
    {
        Catagory::withTrashed()->where('id',$id)->forceDelete();
        return redirect('/catagory/trash');
    }

    //to view edit page for catagory item
    public function edit($id)
    {
        return view('catagory.edit',[
            'catagory_info' => Catagory::find($id),
        ]);
    }

    //to update catagory ;
    public function update(Request $request)
    {
        Catagory::find($request->id)->update([
            'catagory_name' => Str::upper($request->catagory_name),
        ]);
        return back();
    }








}
