<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\birthreport;
use Illuminate\Support\Facades\Log;
use Exception;
use Session;
use App\Http\Traits\ResponseTrait;

class Birhtcontroller extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=birthreport::orderBy('id','DESC')->paginate(5);
        return view('birthview.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor=Doctor::all();
        return view('birthview.create',compact('doctor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $pieces = explode(" ", $request->date);
            $dateformat = date('Y-m-d',strtotime($pieces['1']));
            $birth = new birthreport();
            $birth->in_patient_id = $request->patient_id;
            $birth->doctor_id = $request->doctor_id;
            $birth->title = $request->child_title;
            $birth->gender = $request->gender;
            $birth->birth_date = $dateformat;
            $birth->description = $request->description;
            $birth->created_by=Session::get('user');
            $birth->updated_by=Session::get('user');
            $birth->save();
        }catch(Exception $e){
dd($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = birthreport::findOrFail($id);
        return view('birthview.show',compact('data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
