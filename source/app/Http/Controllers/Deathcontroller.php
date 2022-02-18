<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\deathreport;
use App\Models\Doctor;
use Illuminate\Support\Facades\Log;
use Exception;
use Session;
use App\Http\Traits\ResponseTrait;

class Deathcontroller extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=deathreport::orderBy('id','DESC')->paginate(5);
        return view('deathview.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor=Doctor::all();
        return view('deathview.create',compact('doctor'));
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
            Log::info($request->all());
            $pieces = explode(" ", $request->date);
            $dateformat = date('Y-m-d',strtotime($pieces['1']));
            $birth = new deathreport();
            $birth->in_patient_id = $request->patient_id;
            $birth->doctor_id = $request->doctor_id;
            $birth->death_date = $dateformat;
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
        $data = deathreport::findOrFail($id);
        return view('deathview.show',compact('data'));
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
