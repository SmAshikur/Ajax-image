<?php

namespace App\Http\Controllers;

use App\Models\Ajax;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Ajax::latest()->paginate(3);
        return view('ajax',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pagination(Request $request){
        if($request->ajax()){
            $data=Ajax::latest()->paginate(3);
            return view('ajax_child',compact('data'))->render();
        }
    }

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
        $this->validate($request,[
            'name'=>'required',
            'image'=>'image',
            'address'=>'required',
            'mobile'=>'numeric'
        ]);
        $data= new Ajax();
        $data->name= $request->name;
        $data->address= $request->address;
        $data->mobile= $request->mobile;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extention=$file->getClientOriginalExtension();
            $fileName=time().'.'.$extention;
            $file->move('images',$fileName);
            $data->image=$fileName;
        }
        $data->save();
        return response()->json($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ajax  $ajax
     * @return \Illuminate\Http\Response
     */
    public function show(Ajax $ajax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ajax  $ajax
     * @return \Illuminate\Http\Response
     */
    public function edit(Ajax $ajax)
    {
        return response()->json($ajax);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ajax  $ajax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ajax $ajax)
    {
         //return response()->json();
        $this->validate($request,[
            'name'=>'required',
            'image'=>'image',
            'address'=>'required',
            'mobile'=>'numeric'
        ]);
        //$ajax= new Ajax();
        $ajax->name= $request->name;
        $ajax->address= $request->address;
        $ajax->mobile= $request->mobile;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extention=$file->getClientOriginalExtension();
            $fileName=time().'.'.$extention;
            $file->move('images',$fileName);
            $ajax->image=$fileName;
        }
        $ajax->save();
        return response()->json($ajax);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ajax  $ajax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ajax $ajax)
    {
        $ajax->delete();
        return response()->json($ajax);
    }
}
