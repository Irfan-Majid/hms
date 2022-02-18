<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestCategory\CreateRequest;
use App\Http\Requests\TestCategory\UpdateRequest;
use App\Models\Testcategory;

use App\Http\Traits\ResponseTrait;
use Session;
use Exception;
use Illuminate\Support\Facades\Log;

class TestcategoryController extends Controller
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
        $Categorys=Testcategory::orderBy('id','DESC')->paginate(5);
        return view('test_category.index',compact('Categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('test_category.create');
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
            $categ=new Testcategory();
            $categ->name=$request->name;
            $categ->description=$request->description;
            if(!!$categ->save()){
                return redirect(route(Session::get('identity').'.testcategory.index'))->with($this->responseMessage(true, null, "You have successfully added a Test Category."));
            }
        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.testcategory.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
        $category=Testcategory::findOrFail($id);
        return view('test_category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$id)
    {
        //
        try{
            $categ=Testcategory::findOrFail($id);
            $categ->name=$request->name;
            $categ->description=$request->description;
            if(!!$categ->save()){
                return redirect(route(Session::get('identity').'.testcategory.index'))->with($this->responseMessage(true, null, "You have successfully updated a Test Category."));
            }
        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.testcategory.create'))->with($this->responseMessage(false, "error", "Please try again!"));
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
