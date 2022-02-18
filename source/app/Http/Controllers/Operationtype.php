<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OperationTypeReq\CreateRequest;
use App\Http\Requests\OperationTypeReq\UpdateRequest;
use App\Http\Traits\ResponseTrait;
use Session;
use Exception;
use App\Models\operationtype as OT_model;

class Operationtype extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ots=OT_model::orderBy('id','DESC')->paginate(5);
        return view('operation_type.index',compact('ots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operation_type.create');
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
            $OT= new OT_model();
            $OT->name=$request->name;
            $OT->description=$request->description;
            $OT->price=$request->price;
            $OT->created_by=Session::get('user');
            $OT->updated_by=Session::get('user');
            if (!!$OT->save()) {
                return redirect(route(Session::get('identity').'.ot_type.index'))->with($this->responseMessage(true,null,"OT successfully created."));
            }
        } catch (Exception $e) {
            dd($e);
            return redirect(route(Session::get('identity').'.ot_type.create'))->with($this->responseMessage(false,"error","Please try again!"));
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
        $operationtype=OT_model::findOrFail($id);
        return view('operation_type.edit',compact('operationtype'));
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
                $operationtype=OT_model::findOrFail($id);
                 $operationtype->name=$request->name;
                 $operationtype->description=$request->description;
                 $operationtype->updated_by=Session::get('user');
                 $operationtype->price=$request->price;
                if (!! $operationtype->save()) {
                    return redirect(route(Session::get('identity').'.ot_type.index'))->with($this->responseMessage(true, null, "You have successfully added a department."));
                }
            } catch (Exception $e) {
                return redirect(route(Session::get('identity').'.ot_type.edit'))->with($this->responseMessage(false, "error", "Please try again!"));
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
