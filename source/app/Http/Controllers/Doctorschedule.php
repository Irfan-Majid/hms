<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctorschedule as d_schedule;
use App\Models\Doctor;
use App\Models\Weekday;
use App\Models\Dutyshift;
use App\Http\Requests\DoctorSchedule\CreateRequest;

use App\Http\Traits\ResponseTrait;
use Exception;
use Session;

use Illuminate\Support\Facades\Log;

class Doctorschedule extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schedule=d_schedule::orderBy('id','DESC')->paginate(5);
        return view('doctorschedule.index',compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $doctors=Doctor::all();
        $weekdays=Weekday::all();
        $dutyshifts=Dutyshift::all();
        return view('doctorschedule.create',compact('doctors','weekdays','dutyshifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        //
        try{
            $data = $request->all();
            $data['created_by'] = Session::get('user');
            $data['updated_by'] = Session::get('user');
            $test=d_schedule::create($data);
            if($test){
                    return redirect(route(Session::get('identity').'.doctorschedule.index'))->with($this->responseMessage(true, null, "You have successfully added a shift."));
            }
        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.doctorschedule.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
        $doctors=Doctor::all();
        $weekdays=Weekday::all();
        $dutyshifts=Dutyshift::all();
        $shift=d_schedule::findorfail($id);
        return view('doctorschedule.edit',compact('shift','doctors','weekdays','dutyshifts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRequest $request, $id)
    {
        //
        try{
            $all=$request->all();
            $all['updated_by']=Session::get('user');
            $flight =d_schedule::updateOrCreate(['id'=>$id],$all);
            if($flight){
                return redirect(route(Session::get('identity').'.doctorschedule.index'))->with($this->responseMessage(true, null, "You have successfully updated a shift."));
            }
        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.doctorschedule.edit'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
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
