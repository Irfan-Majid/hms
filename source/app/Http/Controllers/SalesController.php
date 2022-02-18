<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicinebrand;
use App\Models\Medicinegeneric;
use App\Models\Medicinedetails;
use App\Models\sale;
use App\Models\saledetail;

use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Traits\ResponseTrait;
use Session;


class SalesController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale=sale::orderBy('id','desc')->paginate(5);
        return view('medicine_sale.index',compact('sale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=array('brands'=>Medicinebrand::all(),'generics'=>Medicinegeneric::all(),'medicinedetails'=>Medicinedetails::all());
        return view('medicine_sale.create',$data);
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
            $sale = new sale();
            $sale->out_patient_id=$request->p_id;
            $sale->total_payment=$request->total_amount;
            $sale->due=$request->due_amount;
            $sale->sale_date=$request->pur_date;
            $sale->created_by=Session::get('user');
            $sale->updated_by=Session::get('user');
            if(!!$sale->save()){
                foreach($request->qty as $key=>$value){
                    $data=Medicinedetails::findOrFail($request->medicinedetail_id[$key]);
                    $data->stock=$data->stock-$request->qty[$key];
                    $data->save();
                $saledetail = new saledetail();
                $saledetail->qty=$request->qty[$key];
                $saledetail->medicinedetail_id=$request->medicinedetail_id[$key];
                $saledetail->created_by=Session::get('user');
                $saledetail->updated_by=Session::get('user');
                $saledetail->sale_id=$sale->id;
                $saledetail->save();
                }
                return redirect(route(Session::get('identity').'.medsale.index'))->with($this->responseMessage(true,null,"sold successfully created."));
            }
        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.medsale.index'))->with($this->responseMessage(true,null,"puchased successfully created."));
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
        $datas=sale::findOrFail($id);
        return view('medicine_sale.edit',compact('datas'));
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
        try{
            $datas=sale::findOrFail($id);
            $datas->due=$datas->due-$request->payment;
            if($datas->due==0){
                $datas->status=0;
            }
            if(!!$datas->save()){
                return redirect(route(Session::get('identity').'.medsale.index'))->with($this->responseMessage(true,null,"sold successfully created."));
            }
        }catch(Exception $e){
    dd($e);
    return redirect(route(Session::get('identity').'.medsale.index'))->with($this->responseMessage(true,null,"puchased successfully created."));
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
