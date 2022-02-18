<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Models\OutPatient;
use App\Models\Testcategory;
use App\Models\Patienttest;
use App\Models\Patienttestdetail;
use Illuminate\Support\Facades\Log;
use App\Models\Testname;
use Session;
use Exception;

class TestinvoiceController extends Controller
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
        $datas=Patienttest::orderBy('id','desc')->paginate(5);
        return view('test_invoice.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data=Testcategory::all();
        return view('test_invoice.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        try{
            $Test= new Patienttest();
            $Test->out_patient_id=$request->patient_id;
            $Test->vat=$request->vat_tk;
            $Test->discount=$request->discount_tk;
            $Test->grand_total=$request->grand_total;
            $Test->paid=$request->paid;
            $Test->created_by=Session::get('user');
            $Test->updated_by=Session::get('user');
            if($request->due==0){
                $Test->status=0;
            }
            if(!!$Test->save()){
                foreach($request->inv_list_id as $id){
                    $Testdetails=new Patienttestdetail();
                    $Testdetails->patienttest_id = $Test->id;
                    $Testdetails->testname_id=$id;
                    if($request->due==0){
                        $Testdetails->status=0;
                    }
                    $Testdetails->save();
                }
                return redirect(route(Session::get('identity').'.testinvoice.index'))->with($this->responseMessage(true, null, "You have successfully added a invoice."));
            }
           

        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.testinvoice.index'))->with($this->responseMessage(false, "error", "Please try again!"));
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
        $data = Patienttest::findOrFail($id);
		$test_d=Patienttestdetail::where('patienttest_id',$id)->get();
		return view('test_invoice.show')->with('data',$data)->with('test_d',$test_d);


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
        $data = Patienttest::findOrFail($id);
        return view('test_invoice.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try{
        $data = Patienttest::findOrFail($id);
        $data->paid=$data->paid+$request->payment;
        if($data->paid==$data->grand_total){
            $data->status=0;
        };
        if(!!$data->save());
        return redirect(route(Session::get('identity').'.testinvoice.index'))->with($this->responseMessage(true, null, "You have successfully added a invoice."));
        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.testinvoice.index'))->with($this->responseMessage(false, "error", "Please try again!"));
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

    public function FindPatientsugdet(Request $request){
       $a=OutPatient::where('id',$request->id)->get();
       return $a;
    }

    public function FindTestName(Request $request){
        $a=Testname::where('testcategory_id',$request->id)->get();
        return $a;
    }

    public function FindTestPrice(Request $request){
        $a=Testname::where('id',$request->id)->get();
        return $a;
    }
}
