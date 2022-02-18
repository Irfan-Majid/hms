<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;


use App\Http\Requests\Employee\CreateRequest;
use App\Http\Requests\Employee\UpdateRequest;

use Illuminate\Support\Facades\Log;
use App\Http\Traits\ResponseTrait;
use Exception;
use Session;

class EmployeeController extends Controller
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
        $doc=Employee::orderBy('id','DESC')->paginate(5);
        
        return view('employee.index',compact('doc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        try{

            $image=$request->file('image');
            $imageName = '/source/public/images/'.time().'.'.$image->extension();
            $user=new User();
            $user->name=$request->name;
            $user->username=$request->username;
            $user->contact=$request->contact;
            $user->email=$request->email;
            $user->image=$imageName;
            $user->password=sha1(md5($request->password));
            $user->role_id=11;
            if(!!$user->save()){
                $usr_id=$user->id;
               $employe=new Employee();
               $employe->name=$request->name;
               $employe->address=$request->address;
               $employe->contact=$request->contact;
               $employe->email=$request->email;
               $employe->image=$imageName;
               $employe->user_id=$usr_id;
               $employe->b_date=$request->b_date;
               $employe->e_qualification=$request->e_qualification;
               $employe->designation=$request->designation;
               if(!!$employe->save()){
                $image->move(public_path('images'),$imageName);     
                 return redirect(route(Session::get('identity').'.employee.index'))->with($this->responseMessage(true, null, "You have successfully added a employee."));
               }
            }
        }catch (Exception $e) {
            // DB::rollBack();
            dd($e);
            return redirect(route(Session::get('identity').'.employee.create'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
      
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        
        $user=User::findorfail($employee->user_id);
        return view('employee.edit',compact('employee','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        try {
            $image=$request->file('image');
            $employe=Employee::find($id);
            if($image){
                $imageName = '/source/public/images/'.time().'.'.$image->extension();
                if(file_exists(public_path("$employe->image"))){
                     unlink(public_path("$employe->image"));
               }
            //    $imageName = 'images/'.time().'.'.$image->extension();
           }else{
               $imageName=$employe->image;
           }
                $employe->name=$request->name;
               $employe->address=$request->address;
               $employe->contact=$request->contact;
               $employe->email=$request->email;
               $employe->image=$imageName;
               $employe->b_date=$request->b_date;
               $employe->e_qualification=$request->e_qualification;
               $employe->designation=$request->designation;
               if(!!$employe->save()){
                $user=User::find($employe->user_id);
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
                    return redirect(route(Session::get('identity').'.employee.index'))->with($this->responseMessage(true, null, "You have successfully edited a employee."));
                    } 
               }
        } catch (Exception $e) {
            // DB::rollBack();
            dd($e);
            return redirect(route(Session::get('identity').'.employee.edit'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        try{
            $employee->status=2;
            if(!!$employee->save()){
                $user=User::find($employee->user_id);
                $user->status=0;
                if(!!$user->save()){
                    return redirect(route(Session::get('identity').'.employee.index'))->with($this->responseMessage(true, null, "You have successfully retired a employee."));
                }
            }
         }catch(Exception $e){
             dd($e);
            return redirect(route(Session::get('identity').'.employee.index'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
        
           
            
            
                
    }
}
