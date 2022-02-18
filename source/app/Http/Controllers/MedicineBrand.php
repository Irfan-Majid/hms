<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\MedBrandReq\CreateRequest;
use App\http\Requests\MedBrandReq\UpdateRequest;
use App\Models\Medicinebrand as brand_mod;
use Exception;
use Session;
use App\Http\Traits\ResponseTrait;

class MedicineBrand extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=brand_mod::orderBy('id','DESC')->paginate(5);
        return view('medicine_brand.index',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicine_brand.create');
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
            $brand= new brand_mod();
            $brand->name=$request->name;
            $brand->description=$request->description;
            $brand->created_by=Session::get('user');
            $brand->updated_by=Session::get('user');
            if (!!$brand->save()) {
                return redirect(route(Session::get('identity').'.medicinebrand.index'))->with($this->responseMessage(true,null,"department successfully created."));
            }
        } catch (Exception $e) {
           
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
    public function edit(brand_mod $medicinebrand)
    {
        return view('medicine_brand.edit',compact('medicinebrand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, brand_mod $medicinebrand)
    {
        try {
            $medicinebrand->name=$request->name;
            $medicinebrand->description=$request->description;
            $medicinebrand->updated_by=Session::get('user');

            if (!!$medicinebrand->save()) {
                return redirect(route(Session::get('identity').'.medicinebrand.index'))->with($this->responseMessage(true, null, "You have successfully added a department."));
            }
        } catch (Exception $e) {
            return redirect(route(Session::get('identity').'.medicinebrand.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
