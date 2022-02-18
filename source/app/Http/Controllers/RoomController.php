<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Roomtype;


use App\Http\Requests\Room\UpdateRequest;
use App\Http\Requests\Room\CreateRequest;


use App\Http\Traits\ResponseTrait;
use Exception;
use Session;

class RoomController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room=Room::orderBy('id','DESC')->paginate(5);
        return view('room.index',compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomtypes=Roomtype::all();
        return view('room.create',compact('roomtypes'));
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
            $room= new Room();
            $room->room_no=$request->room_no;
            $room->roomtype_id=$request->room_type;
            
            if (!!$room->save()) {
                return redirect(route(Session::get('identity').'.room.index'))->with($this->responseMessage(true, null, "You have successfully added a room."));
            }
        } catch (Exception $e) {
            return redirect(route(Session::get('identity').'.room.create'))->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
        $roomtypes=Roomtype::all();
        return view('room.edit',compact('room','roomtypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Room $room)
    {
            try {
                $room->room_no=$request->room_no;
                $room->roomtype_id=$request->room_type;
                if (!!$room->save()) {
                    return redirect(route(Session::get('identity').'.room.index'))->with($this->responseMessage(true, null, "You have successfully added a room."));
                }
            } catch (Exception $e) {
                return redirect(route(Session::get('identity').'.room.create'))->with($this->responseMessage(false, "error", "Please try again!"));
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
        if($room->delete()){
            return redirect(route(Session::get('identity').'.room.index'))->with($this->responseMessage(true,null,"Data successfully deleted."));
        }else{
            return redirect(route(Session::get('identity').'.room.index'))->with($this->responseMessage(false,'error',"Data deletion failed"));
        }
    }
}
