<?php

namespace App\Http\Controllers;

use App\Models\InPatient;
use App\Models\User;
use App\Models\Room;
use App\Models\Roomtype;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\insale;
use App\Models\insaledetail;
use App\Models\operationtimeschedule;
use App\Models\Inpatienttest;
use App\Models\Inpatienttestdetail;

use App\Http\Requests\In_patient\CreateRequest;
use App\Http\Requests\In_patient\UpdateRequest;

use App\Http\Traits\ResponseTrait;
use Exception;
use Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InPatientController extends Controller
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
        $in_patients=InPatient::orderBy('id','DESC')->paginate(5);
        return view('in_patient.index',compact('in_patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rooms=Room::all();
        $doctors=Doctor::all();
        return view('in_patient.create',compact('rooms','doctors'));
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

        try {
            $image=$request->file('image');
            $imageName = '/source/public/images/'.time().'.'.$image->extension();
            // $image->move(public_path('images'),$imageName);
            $user=new User();
            $user->name=$request->name;
            $user->username=$request->username;
            $user->contact=$request->contact;
            $user->email=$request->email;
            $user->image=$imageName;
            $user->role_id=4;
            $user->password=sha1(md5($request->password));
			if(!!$user->save()){
                $usr_id=$user->id;
                // Log::info("if1".$usr_id);
               $inpatient=new InPatient();
               $inpatient->name=$request->name;
               $inpatient->address=$request->address;
               $inpatient->contact=$request->contact;
               $inpatient->email=$request->email;
               $inpatient->image=$imageName;
               $inpatient->user_id=$usr_id;
               $inpatient->b_date=$request->b_date;
               $inpatient->core_casualty=$request->c_casuelty;
               $inpatient->blood=$request->blood;
               $inpatient->height=$request->height;
               $inpatient->weight=$request->weight;
               $inpatient->room_id=$request->room;
               $inpatient->admit_date=Carbon::now()->isoFormat('YYYY-MM-DD');
               $inpatient->referred_by=$request->doctor;
               if(!!$inpatient->save()){
                //    Log::info("if2".$emp_id);

                //===insert patient id===//
                $a = $inpatient->id;
                $ran = RAND(1000,9999);
                $patient_id = 'PA-IN-'.$a.$ran;
                $pati=InPatient::find($inpatient->id);
                $pati->patient_id = $patient_id;
                $pati->save();/*added but not tested */
                /**/
                $room=Room::find($request->room);
                $room->status=1;
                $room->save();
                        $image->move(public_path('images'),$imageName);
                        return redirect(route(Session::get('identity').'.in-patient.index'))->with($this->responseMessage(true, null, "You have successfully added a patient."));
               }
            }
        } catch (Exception $e) {
            // DB::rollBack();
            dd($e);
            return redirect(route(Session::get('identity').'.in-patient.create'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InPatient  $inPatient
     * @return \Illuminate\Http\Response
     */
    public function show(InPatient $inPatient)
    {  
        
        $aaa=Roomtype::where('id',(Room::where('id',$inPatient->room_id)->get())[0]->roomtype_id)->get();
        $room_rent=$aaa[0]['price'];
        $now = Carbon::now()->isoFormat('YYYY-MM-DD') ;
        // $inPatient->bill_due = ((Carbon::parse( $inPatient->admit_date )->diffInDays( $now ))*$room_rent) + $inPatient->bill_due;
        // $inPatient->release_date=$now;   
        // $inPatient->save();
        // $date = Carbon::parse($inPatient->admit_date);
        // $now = Carbon::now();
        // $diff = $date->diffInDays($now);               
        $MEDICINE=insale::where('in_patient_id',$inPatient->id)->sum('due');
        $operationtk= operationtimeschedule::where('in_patient_id',$inPatient->id)->sum('due');
        $testtk=Inpatienttest::where('in_patient_id',$inPatient->id)->select(\DB::raw("SUM(grand_total) as Gtotal"),\DB::raw("SUM(paid) as paid"))->groupBy("in_patient_id")->get();
        return view('in_patient.show',compact('operationtk','MEDICINE','testtk','inPatient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InPatient  $inPatient
     * @return \Illuminate\Http\Response
     */
    public function edit(InPatient $inPatient)
    {
        //
        $rooms=Room::all();
        $doctors=Doctor::all();
        $user=User::findorfail($inPatient->user_id);
        return view('in_patient.edit',compact('inPatient','rooms','doctors','user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InPatient  $inPatient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //

        try {
            $image=$request->file('image');
            $inpatient=InPatient::find($id);
            if($image){
                $imageName = '/source/public/images/'.time().'.'.$image->extension();
                if(file_exists(public_path("$inpatient->image"))){
                     unlink(public_path("$inpatient->image"));
               }
            //    $imageName = 'images/'.time().'.'.$image->extension();
           }else{
               $imageName=$inpatient->image;
           }
            // $image->move(public_path('images'),$imageName);
               $inpatient->name=$request->name;
               $inpatient->address=$request->address;
               $inpatient->contact=$request->contact;
               $inpatient->email=$request->email;
               $inpatient->image=$imageName;
               $inpatient->b_date=$request->b_date;
               $inpatient->core_casualty=$request->c_casuelty;
               $inpatient->blood=$request->blood;
               $inpatient->height=$request->height;
               $inpatient->weight=$request->weight;
               $inpatient->room_id=$request->room;
               $inpatient->referred_by=$request->doctor;
               if(!!$inpatient->save()){
                $user=User::find($inpatient->user_id);
                $user->name=$request->name;
                $user->username=$request->username;
                $user->contact=$request->contact;
                $user->email=$request->email;
                $user->image=$imageName;   
                if($request->password){
                    $user->password=sha1(md5($request->password));
                    }    
                if(!!$user->save()){
                    if($image){
                        $image->move(public_path('images'),$imageName);
                    }
                    return redirect(route(Session::get('identity').'.in-patient.index'))->with($this->responseMessage(true, null, "You have successfully edited a patient."));
                    } 
               }

            
        } catch (Exception $e) {
            // DB::rollBack();
            dd($e);
            return redirect(route(Session::get('identity').'.in-patient.edit'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InPatient  $inPatient
     * @return \Illuminate\Http\Response
     */
    public function destroy(InPatient $inPatient)
    {
        //
        $room=Room::find($inPatient->room_id);
        $room->status=2;
        if(!!$room->save()){
            $user=User::find($inPatient->user_id);
            $user->status=0;
            
            if($user->save()){
                $inPatient->status=2;
                $inPatient->bill_due=0;
                if($inPatient->save()){
                    return redirect(route(Session::get('identity').'.in-patient.index'))->with($this->responseMessage(true,null,"PAtient successfully release."));
                }else{
                    return redirect(route(Session::get('identity').'.in-patient.index'))->with($this->responseMessage(false,'error',"Patient Releasion Failed failed"));
                }


            }
        }
    
    }
}
