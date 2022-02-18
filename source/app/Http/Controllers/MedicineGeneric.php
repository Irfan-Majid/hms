<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\MedGenReq\CreateRequest;
use App\http\Requests\MedGenReq\UpdateRequest;
use App\Models\Medicinegeneric as gen_mod;
use Exception;
use Session;
use App\Http\Traits\ResponseTrait;

class MedicineGeneric extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gen=gen_mod::orderBy('id','DESC')->paginate(5);
        return view('medicine_gen.index',compact('gen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('medicine_gen.create');
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
            $gen= new gen_mod();
            $gen->name=$request->name;
            $gen->description=$request->description;
            $gen->created_by=Session::get('user');
            $gen->updated_by=Session::get('user');
            if (!!$gen->save()) {
                return redirect(route(Session::get('identity').'.medicinegeneric.index'))->with($this->responseMessage(true,null,"department successfully created."));
            }
        } catch (Exception $e) {
            return redirect(route(Session::get('identity').'.medicinegeneric.create'))->with($this->responseMessage(false,"error","Please try again!"));
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
    public function edit(gen_mod $medicinegeneric)
    {
        return view('medicine_gen.edit',compact('medicinegeneric'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, gen_mod $medicinegeneric)
    {
            try {
                $medicinegeneric->name=$request->name;
                $medicinegeneric->description=$request->description;
                $medicinegeneric->updated_by=Session::get('user');

                if (!!$medicinegeneric->save()) {
                    return redirect(route(Session::get('identity').'.medicinegeneric.index'))->with($this->responseMessage(true, null, "You have successfully added a department."));
                }
            } catch (Exception $e) {
                return redirect(route(Session::get('identity').'.medicinegeneric.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
