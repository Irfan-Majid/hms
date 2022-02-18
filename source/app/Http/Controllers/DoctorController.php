<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Department;
use App\Models\User;
use App\Models\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\Doctor\CreateRequest;
use App\Http\Requests\Doctor\UpdateRequest;

use App\Http\Traits\ResponseTrait;
use Exception;
use Session;
use Illuminate\Support\Facades\Log;

class DoctorController extends Controller
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
        $doc=Doctor::orderBy('id','DESC')->paginate(5);
        return view('doctor.index',compact('doc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $deps=Department::all();
        return view('doctor.create',compact('deps'));
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

            // $image=$request->file('image');
            // $imageName = 'images/'.time().'.'.$image->extension();
            // $image->move(public_path('images'),$imageName);
            // Log::info($request->name);
            // Log::info($request->username);
            // Log::info($request->contact);
            // Log::info($request->email);
            // Log::info($request->password);
            // Log::info($request->address);
            // Log::info($request->e_qualification);
            // Log::info($request->specialization);
            // Log::info($imageName);
            // Log::info($request->b_date);
            // Log::info($request->department);
            // Log::info($request->designation);
            
//             
// $user = User::create($formData);
// if (!$user)
// {
//     DB::rollbackTransaction();
// }
// DB::commitTransaction();

           DB::beginTransaction();
            $image=$request->file('image');
            $imageName = '/source/public/images/'.time().'.'.$image->extension();
            // $image->move(public_path('images'),$imageName);
            $user=new User();
            $user->name=$request->name;
            $user->username=$request->username;
            $user->contact=$request->contact;
            $user->email=$request->email;
            $user->image=$imageName;
            $user->role_id=3;
            $user->password=sha1(md5($request->password));
			if(!!$user->save()){
                $usr_id=$user->id;
                // Log::info("if1".$usr_id);
               $employe=new Employee();
               $employe->name=$request->name;
               $employe->address=$request->address;
               $employe->contact=$request->contact;
               $employe->email=$request->email;
               $employe->designation=$request->designation;
               $employe->e_qualification=$request->e_qualification;
               $employe->image=$imageName;
               $employe->user_id=$usr_id;
               $employe->b_date=$request->b_date;
               if(!!$employe->save()){
                   $emp_id=$employe->id;
                //    Log::info("if2".$emp_id);
                   $doc=new Doctor();
                    $doc->name=$request->name;
                    $doc->specialization=$request->specialization;
                    $doc->e_qualification=$request->e_qualification;
                    $doc->designation=$request->designation;
                    $doc->contact=$request->contact;
                    $doc->email=$request->email;
                    $doc->address=$request->address;
                    $doc->image=$imageName;
                    $doc->department_id=$request->department;
                    $doc->employee_id=$emp_id;
                    $doc->user_id=$usr_id;
                    $doc->fee=$request->fee;
                    if(!!$doc->save()){
                        // Log::info("if3");
                        $image->move(public_path('images'),$imageName);
                       DB::commit();
                       
                        return redirect(route(Session::get('identity').'.doctor.index'))->with($this->responseMessage(true, null, "You have successfully added a doctor."));
                    }
               }
            }
     
          
        } catch (Exception $e) {
           DB::rollBack();
            dd($e);
            return redirect(route(Session::get('identity').'.doctor.create'))->with($this->responseMessage(false, "error", "Please try again!"));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        
        return view('doctor.show',compact('doctor'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
        $deps=Department::all();
        $user=User::findorfail($doctor->user_id);
        $employee=Employee::findorfail($doctor->employee_id);
        return view('doctor.edit',compact('doctor','deps','user','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        try {
            $image=$request->file('image');
            
            // $image->move(public_path('images'),$imageName);
            $doc=Doctor::find($id);
            if($image){
                $imageName = '/source/public/images/'.time().'.'.$image->extension();
                if(file_exists(public_path("$doc->image"))){
                     unlink(public_path("$doc->image"));
               }
            //    $imageName = 'images/'.time().'.'.$image->extension();
           }else{
               $imageName=$doc->image;
           }
            $doc->name=$request->name;
            $doc->specialization=$request->specialization;
            $doc->e_qualification=$request->e_qualification;
            $doc->designation=$request->designation;
            $doc->contact=$request->contact;
            $doc->email=$request->email;
            $doc->address=$request->address;
            $doc->image=$imageName;
            $doc->fee=$request->fee;
            $doc->department_id=$request->department;
            if(!!$doc->save()){
                $user=User::find($doc->user_id);
                $user->name=$request->name;
                $user->username=$request->username;
                $user->contact=$request->contact;
                $user->email=$request->email;
                $user->image=$imageName;
                $user->role_id=3;
                if($request->password){
                $user->password=sha1(md5($request->password));
                }
                if(!!$user->save()){
                $employe=Employee::find($doc->employee_id);
               $employe->name=$request->name;
               $employe->address=$request->address;
               $employe->contact=$request->contact;
               $employe->email=$request->email;
               $employe->designation=$request->designation;
               $employe->e_qualification=$request->e_qualification;
               $employe->image=$imageName;
               $employe->b_date=$request->b_date;
               if(!!$employe->save()){
                if($image){
                    $image->move(public_path('images'),$imageName);
                }
                 return redirect(route(Session::get('identity').'.doctor.index'))->with($this->responseMessage(true, null, "You have successfully added a doctor."));
               }
                }
                
            }
     
          
        } catch (Exception $e) {
            // DB::rollBack();
            dd($e);
            return redirect(route(Session::get('identity').'.doctor.edit'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
        $employe=Employee::find($doctor->employee_id);
        $employe->status=2;
        if(!!$employe->save()){
            $user=User::find($doctor->user_id);
            $user->status=0;
            if($user->save()){
                $doctor->status=2;
                if($doctor->save()){
                    return redirect(route(Session::get('identity').'.doctor.index'))->with($this->responseMessage(true,null,"Data successfully retired."));
                }else{
                    return redirect(route(Session::get('identity').'.doctor.index'))->with($this->responseMessage(false,'error',"Data deletion failed"));
                }
            }
        }
        
    }
}
