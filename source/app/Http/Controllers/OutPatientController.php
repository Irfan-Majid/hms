<?php

namespace App\Http\Controllers;

use App\Models\OutPatient;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests\Out_patient\CreateRequest;
use App\Http\Requests\Out_patient\UpdateRequest;

use App\Http\Traits\ResponseTrait;
use Exception;
use Session;
use Illuminate\Support\Facades\Log;




class OutPatientController extends Controller
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

        $out_patients=OutPatient::orderBy('id','DESC')->paginate(5);
        return view('out_patient.index',compact('out_patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('out_patient.create');
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
               $outpatient=new OutPatient();
               $outpatient->name=$request->name;
               $outpatient->address=$request->address;
               $outpatient->contact=$request->contact;
               $outpatient->email=$request->email;
               $outpatient->image=$imageName;
               $outpatient->user_id=$usr_id;
               $outpatient->b_date=$request->b_date;
               $outpatient->core_casualty=$request->c_casuelty;
               $outpatient->blood=$request->blood;
               $outpatient->height=$request->height;
               $outpatient->weight=$request->weight;
               if(!!$outpatient->save()){
                            //===insert patient id===//
                        $a = $outpatient->id;
                        $ran = RAND(1000,9999);
                        $patient_id = 'PA-OUT-'.$a.$ran;
                        $pati=OutPatient::find($outpatient->id);
                        $pati->patient_id = $patient_id;
                        $pati->save();/*added but not tested */
                        /**/

                //    Log::info("if2".$emp_id);
                        $image->move(public_path('images'),$imageName);
                        return redirect(route(Session::get('identity').'.out-patient.index'))->with($this->responseMessage(true, null, "You have successfully added a patient."));
                   
               }
            }
        } catch (Exception $e) {
            // DB::rollBack();
            dd($e);
            return redirect(route(Session::get('identity').'.out-patient.create'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OutPatient  $outPatient
     * @return \Illuminate\Http\Response
     */
    public function show(OutPatient $outPatient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OutPatient  $outPatient
     * @return \Illuminate\Http\Response
     */
    public function edit(OutPatient $outPatient)
    {
        //
        $user=User::findorfail($outPatient->user_id);
        return view('out_patient.edit',compact('outPatient','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OutPatient  $outPatient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //

        try {
            $image=$request->file('image');
            $outpatient=OutPatient::find($id);
            if($image){
                $imageName = 'images/'.time().'.'.$image->extension();
                if(file_exists(public_path("$outpatient->image"))){
                     unlink(public_path("$outpatient->image"));
               }
               $imageName = 'images/'.time().'.'.$image->extension();
           }else{
               $imageName=$outpatient->image;
           }
            // $image->move(public_path('images'),$imageName);
               $outpatient->name=$request->name;
               $outpatient->address=$request->address;
               $outpatient->contact=$request->contact;
               $outpatient->email=$request->email;
               $outpatient->image=$imageName;
               $outpatient->b_date=$request->b_date;
               $outpatient->core_casualty=$request->c_casuelty;
               $outpatient->blood=$request->blood;
               $outpatient->height=$request->height;
               $outpatient->weight=$request->weight;
               if(!!$outpatient->save()){
                $user=User::find($outpatient->user_id);
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
                    return redirect(route(Session::get('identity').'.out-patient.index'))->with($this->responseMessage(true, null, "You have successfully edited a patient."));
                    } 
               }
        } catch (Exception $e) {
            // DB::rollBack();
            dd($e);
            return redirect(route(Session::get('identity').'.out-patient.edit'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OutPatient  $outPatient
     * @return \Illuminate\Http\Response
     */
    public function destroy(OutPatient $outPatient)
    {
        //
       
            $user=User::find($outPatient->user_id);
            $user->status=0;
            if($user->save()){
                if($outPatient->delete()){
                    return redirect(route(Session::get('identity').'.out-patient.index'))->with($this->responseMessage(true,null,"Data successfully release."));
                }else{
                    return redirect(route(Session::get('identity').'.out-patient.index'))->with($this->responseMessage(false,'error',"Data deletion failed"));
                }
        }
    }
}
