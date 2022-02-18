<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Operationtheatre as ot;
use App\Http\Requests\OperationRoomReq\CreateRequest;
use App\Http\Requests\OperationRoomReq\UpdateRequest;
use Illuminate\Support\Facades\Log;

use App\Http\Traits\ResponseTrait;
use Exception;
use Session;

class Operationtheatre extends Controller
{
   use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ots=ot::orderBy('id','DESC')->paginate(5);
        return view('operation_theatre.index',compact('ots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operation_theatre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        try {
            $ot= new ot();
            $ot->name=$request->name;
            $ot->description=$request->description;
            $ot->created_by=Session::get('user');
            $ot->updated_by=Session::get('user');
            if (!!$ot->save()) {
                return redirect(route(Session::get('identity').'.o_theatre.index'))->with($this->responseMessage(true,null,"department successfully created."));
            }
        } catch (Exception $e) {
            dd($e);
            return redirect(route(Session::get('identity').'.o_theatre.create'))->with($this->responseMessage(false,"error","Please try again!"));
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operationtheatre=ot::findOrFail($id);
        return view('operation_theatre.edit',compact('operationtheatre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $OT=ot::findOrFail($id);
            $OT->name=$request->name;
            $OT->description=$request->description;
            $OT->updated_by=Session::get('user');

            if (!!$OT->save()) {
                return redirect(route(Session::get('identity').'.o_theatre.index'))->with($this->responseMessage(true, null, "You have successfully added a department."));
            }
        } catch (Exception $e) {
            return redirect(route(Session::get('identity').'.o_theatre.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
