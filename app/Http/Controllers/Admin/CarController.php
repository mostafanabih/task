<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Type;
use Illuminate\Http\Request;
use Session;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Car::all();
        $types = Type::all();
        return view('admin.car.index',compact('data','types'));
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
        $info = Car::create($data);
        if($request->hasFile('car_image') && $request->file('car_image')->isValid()){
            $info->addMediaFromRequest('car_image')->toMediaCollection('car_image');
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
        $info = Car::find($id);
        $info->update($data);
        if ($request->hasFile('car_image')) {
            $info->clearMediaCollection('car_image');
            $info->addMedia($request->car_image)->toMediaCollection('car_image');
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
        $info = Car::find($id);
        
            $info->clearMediaCollection('car_image');
            $info->delete();
            Session::flash('success','تمت الحذف بنجاح'); 
        return redirect()->back();
    }

    public function deleteCheckCars(Request $request)
    {
        $ids = $request->ids;
        Car::whereIn('id',$ids)->delete();
        return response()->json(['success'=>'cars deleted']);
    }
}
