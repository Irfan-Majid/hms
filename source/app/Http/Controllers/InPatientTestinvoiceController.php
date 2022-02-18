<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Models\InPatient;
use App\Models\Testcategory;
use App\Models\Inpatienttest;
use App\Models\Inpatienttestdetail;
use Illuminate\Support\Facades\Log;
use App\Models\Testname;
use Session;
use Exception;


class InPatientTestinvoiceController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Inpatienttest::orderBy('id','desc')->paginate(5);
        return view('in_patient_test_invoice.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Testcategory::all();
        return view('in_patient_test_invoice.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $Test= new Inpatienttest();
            $Test->in_patient_id=$request->patient_id;
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
                $inpatient = InPatient::findOrFail($request->patient_id);
                $inpatient->bill_due=$inpatient->bill_due+$request->due;
                
                if(!!$inpatient->save()){
                    foreach($request->inv_list_id as $id){
                        $Testdetails=new Inpatienttestdetail();
                        $Testdetails->inpatienttest_id= $Test->id;
                        $Testdetails->testname_id=$id;
                        if($request->due==0){
                            $Testdetails->status=0;
                        }
                        $Testdetails->save();
                    }
                    return redirect(route(Session::get('identity').'.intestinvoice.index'))->with($this->responseMessage(true, null, "You have successfully added a invoice."));
                }
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
        $data = Inpatienttest::findOrFail($id);
		$test_d=Inpatienttestdetail::where('patienttest_id',$id)->get();
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
        $a=InPatient::where('id',$request->id)->get();
        return $a;
     }



     public function FindPatientsug(Request $request){
        $patients=InPatient::where('patient_id', 'like', '%' . $request->id . '%')->get();
        $html='';
        if($patients){
            foreach ($patients as $patient):
               $html .= "<li>";
               $html .= $patient->name. '(<span class="iiid">'.$patient->patient_id.'</span>)<span class="hide" style="display:none;">'.$patient->id.'</span>' ;
               $html .= "</li>";
             endforeach;
          } else {
    
            $html .= '<li>';
            $html .= 'Not found';
            $html .= "</li>";
    
          }
          return $html;
    }
}
