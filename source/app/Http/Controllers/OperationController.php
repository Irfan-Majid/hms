<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Operationtheatre;
use App\Models\operationschedule;
use App\Models\operationtime;
use App\Models\operationtype;
use App\Models\InPatient;
use App\Models\operationtimeschedule;
use Illuminate\Support\Facades\Log;
use Exception;
use Session;

class OperationController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $op=operationtimeschedule::orderBy('id','desc')->paginate(5);
       return view('operation.index',compact('op'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deps=Operationtheatre::all();
        $O_tm=operationtime::all();
        $O_type=operationtype::all();
        $doctor=Doctor::all();
        return view('operation.create',compact('deps','O_tm','O_type','doctor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request->all());
        try{
            $pieces = explode(" ", $request->date);
            $dateformat = date('Y-m-d',strtotime($pieces['1']));
            $op_schedule=new operationtimeschedule();
            $op_schedule->in_patient_id=$request->p_id;
            $op_schedule->operationtime_id=$request->operation_time;
            $op_schedule->doctor_id=$request->doctor;
            $op_schedule->operationtheatre_id=$request->room;
            $op_schedule->operationtype_id=$request->operation_type;
            $op_schedule->operation_date=$dateformat;
            $op_schedule->discount=$request->discount_tk;
            $op_schedule->due=$request->due;
            $op_schedule->created_by=Session::get('user');
            $op_schedule->updated_by=Session::get('user');
            if(!!$op_schedule->save()){
              $inpatient = InPatient::findOrFail($request->p_id);
              $inpatient->bill_due=$inpatient->bill_due+$request->due;
              if(!!$inpatient->save()){
                return redirect(route(Session::get('identity').'.operation.index'))->with($this->responseMessage(true,null,"department successfully created."));
              };
             
            }

        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.operation.create'))->with($this->responseMessage(false,"error","Please try again!"));
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

    public function FindOperationSerial(Request $request){
        $date=date('Y-m-d',strtotime($request->date));
       $data = operationtimeschedule::where('operation_date',$date)->where('operationtheatre_id',$request->ot_id)->get();
  return $data;
    }

    public function FindOperationTk(Request $request){
       $a = operationtype::find(($request->all()));
       return $a;
    }
}
