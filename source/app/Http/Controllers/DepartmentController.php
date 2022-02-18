<?php

namespace App\Http\Controllers;



use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\Department\UpdateRequest;
use App\Http\Requests\Department\CreateRequest;
use Illuminate\Support\Facades\Log;

use App\Http\Traits\ResponseTrait;
use Exception;
use Session;

class DepartmentController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dep=Department::orderBy('id','DESC')->paginate(5);
        return view('department.index',compact('dep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


/*this function is for ajax save*/

    // public function store(CreateRequest $request)
    // {
    //     //
    //     try {
    //         $department= new Department();
    //         $department->name=$request->name;
            
    //         if (!!$department->save()) {
    //             $dep=Department::orderBy('id','DESC')->paginate(5);
                
    //            return response()->json(array('error'=>0,'data'=>$department));
    //         }
    //     } catch (Exception $e) {
    //         return response()->json(array('error'=>1,'data'=>$e));
    //     }
    // }


/*this is for normal store*/

 public function store(CreateRequest $request)
    {
        //
        try {
            $department= new Department();
            $department->name=$request->name;
            $department->description=$request->description;
            $department->created_by=Session::get('user');
            $department->updated_by=Session::get('user');
            if (!!$department->save()) {
                return redirect(route(Session::get('identity').'.department.index'))->with($this->responseMessage(true,null,"Department successfully created."));
            }
        } catch (Exception $e) {
            return redirect(route(Session::get('identity').'.department.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Request $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
        return view('department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Department $department)
    {
        //

        {
            // Log::info("update request".$request);
            // Log::info("update request".$department);
            try {
                $department->name=$request->name;
                $department->description=$request->description;
                $department->updated_by=Session::get('user');

                if (!!$department->save()) {
                    return redirect(route(Session::get('identity').'.department.index'))->with($this->responseMessage(true, null, "You have successfully added a department."));
                }
            } catch (Exception $e) {
                return redirect(route(Session::get('identity').'.department.create'))->with($this->responseMessage(false, "error", "Please try again!"));
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
        
        $department->updated_by=Session::get('user');
        $department->save();
        if($department->delete()){
            return redirect(route(Session::get('identity').'.department.index'))->with($this->responseMessage(true,null,"Data successfully deleted."));
        }else{
            return redirect(route(Session::get('identity').'.department.index'))->with($this->responseMessage(false,'error',"Data deletion failed"));
        }
        
    }


    /*this funtion is for ajax update*/

    public function get_id($id){
        $a=department::findorfail($id)->first();
        return response()->json(array('error'=>0,'data'=>$a));
        // return response()->json($);
    }

    
}
