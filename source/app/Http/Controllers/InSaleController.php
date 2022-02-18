<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicinebrand;
use App\Models\Medicinegeneric;
use App\Models\Medicinedetails;
use App\Models\insale;
use App\Models\insaledetail;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Traits\ResponseTrait;
use Session;
use App\Models\InPatient;


class InSaleController extends Controller
{
    
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale=insale::orderBy('id','desc')->paginate(5);
        return view('medicine_sale_inpatient.index',compact('sale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data=array('brands'=>Medicinebrand::all(),'generics'=>Medicinegeneric::all(),'medicinedetails'=>Medicinedetails::all());
        return view('medicine_sale_inpatient.create',$data);
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
            $sale = new insale();
            $sale->in_patient_id=$request->p_id;
            $sale->total_payment=$request->total_amount;
            $sale->due=$request->due_amount;
            $sale->sale_date=$request->pur_date;
            $sale->created_by=Session::get('user');
            $sale->updated_by=Session::get('user');
            if(!!$sale->save()){
                 $inpatient = InPatient::findOrFail($request->p_id);
              $inpatient->bill_due=$inpatient->bill_due+$request->due_amount;
              
              if(!!$inpatient->save()){
                foreach($request->qty as $key=>$value){
                    $data=Medicinedetails::findOrFail($request->medicinedetail_id[$key]);
                    $data->stock=$data->stock-$request->qty[$key];
                    $data->save();
                $saledetail = new insaledetail();
                $saledetail->qty=$request->qty[$key];
                $saledetail->medicinedetail_id=$request->medicinedetail_id[$key];
                $saledetail->created_by=Session::get('user');
                $saledetail->updated_by=Session::get('user');
                $saledetail->insale_id=$sale->id;
                $saledetail->save();
                }
                return redirect(route(Session::get('identity').'.inmedsale.index'))->with($this->responseMessage(true,null,"Sale successfully created."));
            }
            }
           
        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.inmedsale.create'))->with($this->responseMessage(false,"error","Please try again!"));
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
