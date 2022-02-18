<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;
use App\Models\Employee;


use App\Http\Requests\Nurse\CreateRequest;
use App\Http\Requests\Nurse\UpdateRequest;

use App\Http\Traits\ResponseTrait;
use Exception;
use Session;
use Illuminate\Support\Facades\Log;


class NurseController extends Controller
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
        $nur=Nurse::orderBy('id','DESC')->paginate(5);
        return view('nurse.index',compact('nur'));
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
        return view('nurse.create',compact('deps'));
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
            $user=new User();
            $user->name=$request->name;
            $user->username=$request->username;
            $user->contact=$request->contact;
            $user->email=$request->email;
            $user->image=$imageName;
            $user->role_id=5;
            $user->password=sha1(md5($request->password));
			if(!!$user->save()){
               $usr_id=$user->id;
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
                   $nur=new Nurse();
                    $nur->name=$request->name;
                    $nur->specialization=$request->specialization;
                    $nur->e_qualification=$request->e_qualification;
                    $nur->designation=$request->designation;
                    $nur->contact=$request->contact;
                    $nur->email=$request->email;
                    $nur->address=$request->address;
                    $nur->image=$imageName;
                    $nur->department_id=$request->department;
                    $nur->employee_id=$emp_id;
                    $nur->user_id=$usr_id;
                    if(!!$nur->save()){
                        $image->move(public_path('images'),$imageName);
                        return redirect(route(Session::get('identity').'.nurse.index'))->with($this->responseMessage(true, null, "You have successfully added a nurse."));
                    }
               }
            }
        } catch (Exception $e) {
            dd($e);
            return redirect(route(Session::get('identity').'.nurse.create'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function show(Nurse $nurse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function edit(Nurse $nurse)
    {
        //
        $deps=Department::all();
        $user=User::findorfail($nurse->user_id);
        $employee=Employee::findorfail($nurse->employee_id);
        return view('nurse.edit',compact('nurse','deps','user','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $image=$request->file('image');
            $nur=Nurse::find($id);
            if($image){
                $imageName = '/source/public/images/'.time().'.'.$image->extension();
                if(file_exists(public_path("$nur->image"))){
                     unlink(public_path("$nur->image"));
               }
            //    $imageName = 'images/'.time().'.'.$image->extension();
           }else{
               $imageName=$nur->image;
           }
            $nur->name=$request->name;
            $nur->specialization=$request->specialization;
            $nur->e_qualification=$request->e_qualification;
            $nur->designation=$request->designation;
            $nur->contact=$request->contact;
            $nur->email=$request->email;
            $nur->address=$request->address;
            $nur->image=$imageName;
            $nur->department_id=$request->department;
            if(!!$nur->save()){
                $user=User::find($nur->user_id);
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
                $employe=Employee::find($nur->employee_id);
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
                 return redirect(route(Session::get('identity').'.nurse.index'))->with($this->responseMessage(true, null, "You have successfully added a nurse."));
               }
                }
            }
        } catch (Exception $e) {
            dd($e);
            return redirect(route(Session::get('identity').'.nurse.edit'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nurse $nurse)
    {
        //
        $employe=Employee::find($nurse->employee_id);
        $employe->status=2;
        if(!!$employe->save()){
            $user=User::find($nurse->user_id);
            $user->status=0;
            if($user->save()){
                if($nurse->delete()){
                    return redirect(route(Session::get('identity').'.nurse.index'))->with($this->responseMessage(true,null,"Data successfully deleted."));
                }else{
                    return redirect(route(Session::get('identity').'.nurse.index'))->with($this->responseMessage(false,'error',"Data deletion failed"));
                }
            }
        }
    }
}
