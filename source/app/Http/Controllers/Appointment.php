<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InPatient;
use App\Models\OutPatient;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Doctorschedule;
use Illuminate\Support\Facades\Log;
use App\Models\Appointement as appoint;
// use Illuminate\Support\Facades\DB;
use App\Models\Weekday;
use App\Http\Requests\AppointmentRequest\CreateRequest;
use App\Http\Traits\ResponseTrait;
use Session;
use Exception;

class Appointment extends Controller
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
        $appoint=appoint::orderBy('id','desc')->paginate(5);
        return view('appointment.index',compact('appoint'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deps=Department::all();
        return view('appointment.create',compact('deps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{
            // Log::info($request->serial);
            $appoint=new appoint();
            $pieces = explode(" ", $request->date);
            $dateformat = date('Y-m-d',strtotime($pieces['1']));
            $appoint->out_patient_id=$request->p_id;
            $appoint->doctor_id=$request->doctor_id;
            $appoint->appoint_date=$dateformat;
            // $appoint->approved=$request->
            $appoint->serial=$request->serial;
        
            $appoint->problem=$request->prob;
            $appoint->status=$request->approve;
            $appoint->created_by=Session::get('user');
            $appoint->updated_by=Session::get('user');
            if(!!$appoint->save()){
                return redirect(route(Session::get('identity').'.appointment.index'))->with($this->responseMessage(true, null, "You have successfully created an appointment."));
            }

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
        //
        $appoint=appoint::findOrFail($id);
        return view('appointment.show',compact('appoint'));
         
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
        return view('prescription.prescription_create');
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

    /*code for ajax call*/

    public function FindPatient(Request $request){
        $data = OutPatient::where('patient_id',$request->id)->get();
		return $data;
    }
    public function FindDoctor(Request $request){
        $data = Doctor::where('department_id',$request->id)->get();
        $html ='';
		foreach($data as $row)
		{
			$html .='<option value='.$row->id.'>'.'Dr. '.$row->employee->name.'</option>';
				  
		}
		return $html;
    }
    public function FindSchedule(Request $request){
        $data = Doctorschedule::where('doctor_id',$request->id)->get();
        
		$html ='';
		foreach($data as $row)
		{
			$html .='<div><i class="fa fa-calendar"></i> '.$row->weekday->name.' ['.$row->dutyshift->start_time.' to '.$row->dutyshift->end_time.']</div>';
				  
		}
		return $html;
    }

    public function FindSerial(Request $request){
        // Log::info($request->all());
        
		$day = date('l',strtotime($request->date));
        $dateFormat = date('Y-m-d',strtotime($request->date));
		// $dayId = DB::table('weekdays')->where('name', $day)->get();
        $dayId=Weekday::where('name', $day)->get();
        $d = $dayId[0]->id;
		$data = Doctorschedule::where('doctor_id',$request->id)->where('weekday_id', $d)->count();
        if($data==0)
		{
			return 'daYnotfind';
		}else{
			$row = appoint::where('doctor_id',$request->id)->where('appoint_date',$dateFormat)->get();
			 if(count($row)>0)
			{
                return $row;
			}else
			 {
			    return 'rownotfind';
			}
			
		}
    }

    public function FindPatientsug(Request $request){
        $patients=OutPatient::where('patient_id', 'like', '%' . $request->id . '%')->get();
        $html='';
        if($patients){
            foreach ($patients as $patient):
               $html .= "<li>";
               $html .= $patient->name. '(<span class="iiid">'.$patient->patient_id.'</span>)<span class="hide" style="display:none;">'.$patient->id.'</span>' ;
               $html .= "</li>";
             endforeach;
          } else {
    
            $html .= '<li>';
            $html .= 'Not found';
            $html .= "</li>";
    
          }
          return $html;
    }


    public function SaveAppoint(Request $request){
        try{
            
            $appoint=new appoint();
            $dateformat = date('Y-m-d',strtotime($request->date));
            $appoint->out_patient_id=$request->p_id;
            $appoint->doctor_id=$request->doctor_id;
            $appoint->appoint_date=$dateformat;
            // $appoint->approved=$request->
            $appoint->serial=$request->serial;
        
            $appoint->problem=$request->prob;
            $iiid=OutPatient::where('id',$request->p_id)->get();
            $appoint->created_by=$iiid[0]->user_id;
            $appoint->updated_by=$iiid[0]->user_id;
            if(!!$appoint->save()){
                return ['id'=>$appoint->id,'success'=>'your appointmet is submitted serial'.$request->serial];
             }

        }catch(Exception $e){
            return ['error'=>'your appointmet is not submitted'];
        }
    }
}
