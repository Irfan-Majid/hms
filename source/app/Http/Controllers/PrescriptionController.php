<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointement;
use App\Models\Prescription;
use App\Models\Prescribmedicine;
use Exception;
use Session;
use App\Http\Traits\ResponseTrait;

class PrescriptionController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $appointment=$request->all();
        // return view('prescription.prescription_create',compact('appointment'));
        //return view('prescription.prescription_show');
        
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

            $data1 = new Prescription;
			$data1->cc = $request->cc;
			$data1->investigation = $request->investigation;
			$data1->appointement_id = $request->appointment_id;
			$data1->advice = $request->advice;
			$data1->nxt_visit = $request->nxt_visit;
            $data1->created_by = Session::get('user');
            $data1->updated_by = Session::get('user');
			//echo $data1;
			
			if(!!$data1->save()){
                foreach($request->m_name as $key => $value){
			
                    $insertedId = $data1->id;
                    $data2 = new Prescribmedicine;
                    $data2->prescription_id = $insertedId;
                    $data2->medicine_name = $request->m_name[$key];
                    $data2->medicine_type = $request->m_type[$key];
                    $data2->medicine_dose = $request->dose[$key];
                    $data2->medicine_note = $request->note[$key];
                    $data2->medicine_duration = $request->duration[$key];
                    $data2->created_by = Session::get('user');
                    $data2->updated_by = Session::get('user');
                    //echo $data2;
                    $data2->save();	  
                }
            };
		$data3 = Appointement::findOrFail($request->appointment_id);
		$data3->status = 0;
		$data3->save();
        return redirect(route(Session::get('identity').'.appointment.index'))->with($this->responseMessage(true, null, "You have successfully added a prescription."));

        }catch(Exception $e){
            dd($e);

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
        $appointment=Appointement::findOrFail($id);
        return view('prescription.prescription_show',compact('appointment'));
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
        $appointment=Appointement::findOrFail($id);
        return view('prescription.prescription_create',compact('appointment'));
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
}
