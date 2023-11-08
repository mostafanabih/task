<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Session;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Type::all();
        return view('admin.type.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $info = Type::create($data);
        if($request->hasFile('type_image') && $request->file('type_image')->isValid()){
            $info->addMediaFromRequest('type_image')->toMediaCollection('type_image');
        }
        Session::flash('success','تمت الاضافه بنجاح'); 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $info = Type::find($id);
        $info->update($data);
        if ($request->hasFile('type_image')) {
            $info->clearMediaCollection('type_image');
            $info->addMedia($request->type_image)->toMediaCollection('type_image');
        }
        Session::flash('success','تمت التعديل بنجاح'); 
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Type::find($id);
        
            $info->clearMediaCollection('type_image');
            $info->delete();
            Session::flash('success','تمت الحذف بنجاح'); 
        return redirect()->back();
    }

    public function deleteCheckTypes(Request $request)
    {
        $ids = $request->ids;
        Type::whereIn('id',$ids)->delete();
        return response()->json(['success'=>'types deleted']);
    }
}
