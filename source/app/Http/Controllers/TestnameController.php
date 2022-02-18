<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testname;
use App\Models\Testcategory;
use App\Http\Requests\TestName\CreateRequest;
use App\Http\Requests\TestName\UpdateRequest;

use App\Http\Traits\ResponseTrait;
use Session;
use Exception;
use Illuminate\Support\Facades\Log;

class TestnameController extends Controller
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
        
        $Tests=Testname::orderBy('id','DESC')->paginate(5);
        return view('test_name.index',compact('Tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Testcategory::all();
        return view('test_name.create',compact('categories'));
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
        $Catname = new Testname();
        $Catname->name=$request->name;
        $Catname->description=$request->description;
        $Catname->price=$request->price;
        $Catname->testcategory_id=$request->category;
        if(!!$Catname->save()){
            return redirect(route(Session::get('identity').'.testname.index'))->with($this->responseMessage(true, null, "You have successfully added a Test Name."));
               }

        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.testname.index'))->with($this->responseMessage(false, "error", "Please try again!"));
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
        $Tests=Testname::findOrFail($id);
        $categories=Testcategory::all();
        return view('test_name.edit',compact('Tests','categories'));
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
        //

        try{
            $categ=Testname::findOrFail($id);
            $categ->name=$request->name;
            $categ->description=$request->description;
            $categ->price=$request->price;
            $categ->testcategory_id=$request->category;
            if(!!$categ->save()){
                return redirect(route(Session::get('identity').'.testname.index'))->with($this->responseMessage(true, null, "You have successfully updated a Test Category."));
            }
        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.testname.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
