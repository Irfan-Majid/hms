<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Http\Requests\RoomtypeReq\CreateRequest;
use App\Http\Requests\RoomtypeReq\UpdateRequest;
use App\Models\Roomtype;

use Exception;
use Session;


class RoomTypeController extends Controller
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
        $datas=Roomtype::orderBy('id','DESC')->paginate(5);
        return view('room_type.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('room_type.create');
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
            $roomtype= new Roomtype();
            $roomtype->name=$request->name;
            $roomtype->price=$request->charge;
            $roomtype->created_by=Session::get('user');
            $roomtype->updated_by=Session::get('user');
            if (!!$roomtype->save()) {
                return redirect(route(Session::get('identity').'.roomtype.index'))->with($this->responseMessage(true,null,"Room Type successfully created."));
            }
        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.roomtype.create'))->with($this->responseMessage(false,"error","Please try again!"));
       
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
    public function edit(Roomtype $roomtype)
    {
        //
        return view('room_type.edit',compact('roomtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Roomtype $roomtype)
    {
        //
        try {
            $roomtype->name=$request->name;
            $roomtype->price=$request->charge;
            $roomtype->updated_by=Session::get('user');

            if (!!$roomtype->save()) {
                return redirect(route(Session::get('identity').'.roomtype.index'))->with($this->responseMessage(true, null, "You have successfully updated Room Type."));
            }
        } catch (Exception $e) {
            return redirect(route(Session::get('identity').'.roomtype.create'))->with($this->responseMessage(false, "error", "Please try again!"));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roomtype $roomtype)
    {
        //
        $roomtype->updated_by=Session::get('user');
        $roomtype->save();
        if($roomtype->delete()){
            return redirect(route(Session::get('identity').'.roomtype.index'))->with($this->responseMessage(true,null,"Data successfully deleted."));
        }else{
            return redirect(route(Session::get('identity').'.roomtype.index'))->with($this->responseMessage(false,'error',"Data deletion failed"));
        }
    }
}
