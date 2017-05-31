<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Por;

class PorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pors = Por::all();
      $data = array(
        'pors' => $pors
      );

      return view('pors.index',$data);  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //คือการส่งค่าไปหน้าฟอม
      return view('pors.form');
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
          'title' => 'required|max:200',
          'url' => 'required|max:200',
          'description' => 'required|max:200'
        ]); //
        $pors = new Por;

        $pors->title = $request->title;
        $pors->url = $request->url;
        $pors->description = $request->description;
$pors->save();
return redirect('pors');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $pors = Por::find($id);
      $data = array(
          'pors' => $pors

      );
      return view('pors/show',$data); //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if($id !== ''){
 $pors = Por::find($id);
 $data = array(
 'pors' => $pors

 );
      return view('pors/form',$data);
      }  //
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
      $this->validate($request,[
          'title' => 'required|max:200',
          'url' => 'required|max:200',
          'description' => 'required|max:200'
        ]); //
$pors = Por::find($id);
$pors->title = $request->title;
$pors->url = $request->url;
$pors->description = $request->description;
$pors->save();
Session::flash('message','อัฟเดตสำเร็จ');
return redirect('pors');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pors = Por::find($id);
      $pors->delete();
      Session::flash('message','ลบเรียบร้อยเเล้ว');
      return redirect('pors');//
    }
}
