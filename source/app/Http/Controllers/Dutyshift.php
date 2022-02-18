<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dutyshift as d_shift;
use App\Http\Requests\Dutyshift\CreateRequest;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\Log;

use Exception;
use Session;
class Dutyshift extends Controller
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
        $shifts=d_shift::orderBy('id','DESC')->paginate(5);
        return view('dutyshift.index',compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dutyshift.create');
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
            $test=d_shift::create($data);
            if($test){
                    return redirect(route(Session::get('identity').'.dutyshift.index'))->with($this->responseMessage(true, null, "You have successfully added a shift."));
            }
        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.dutyshift.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
        $shift=d_shift::findorfail($id);
        return view('dutyshift.edit',compact('shift'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRequest $request,$id)
    {
        //
        try{
            $all=$request->all();
            $all['updated_by']=Session::get('user');
            $flight = d_shift::updateOrCreate(['id'=>$id],$all);
            if($flight){
                return redirect(route(Session::get('identity').'.dutyshift.index'))->with($this->responseMessage(true, null, "You have successfully updated a shift."));
            }
        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.dutyshift.edit'))->with($this->responseMessage(false, "error", "Please try again!"));
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
