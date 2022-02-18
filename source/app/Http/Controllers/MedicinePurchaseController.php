<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicinebrand;
use App\Models\Medicinegeneric;
use App\Models\Medicinedetails;
use App\Models\purchase;
use App\Models\purchasedetails;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Traits\ResponseTrait;
use Session;

class MedicinePurchaseController extends Controller
{
   use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $purchase=purchase::orderBy('id','desc')->paginate(5);
       return view('medicine_purchase.index',compact('purchase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=array('brands'=>Medicinebrand::all(),'generics'=>Medicinegeneric::all(),'medicinedetails'=>Medicinedetails::all());
        return view('medicine_purchase.create',$data);
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
            $purchase = new purchase();
            $purchase->medicinebrand_id=$request->brand_id;
            $purchase->total_payment=$request->total_amount;
            $purchase->due=$request->due_amount;
            $purchase->purchase_date=$request->pur_date;
            $purchase->created_by=Session::get('user');
            $purchase->updated_by=Session::get('user');
            if(!!$purchase->save()){
                
                foreach($request->qty as $key=>$value){
                    $data=Medicinedetails::findOrFail($request->medicinedetail_id[$key]);
                    $data->stock=$data->stock+$request->qty[$key];
                    $data->save();
                $purchasedetail = new purchasedetails();
                $purchasedetail->qty=$request->qty[$key];
                $purchasedetail->medicinedetail_id=$request->medicinedetail_id[$key];
                $purchasedetail->created_by=Session::get('user');
                $purchasedetail->updated_by=Session::get('user');
                $purchasedetail->purchase_id=$purchase->id;
                $purchasedetail->save();
                }
                return redirect(route(Session::get('identity').'.medpurchase.index'))->with($this->responseMessage(true,null,"puchased successfully created."));
            }
        }catch(Exception $e){
dd($e);
return redirect(route(Session::get('identity').'.medpurchase.create'))->with($this->responseMessage(false,"error","Please try again!"));
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
        $datas=purchase::findOrFail($id);
        return view('medicine_purchase.edit',compact('datas'));
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
        $datas=purchase::findOrFail($id);
        $datas->due=$datas->due-$request->payment;
        if($datas->due==0){
            $datas->status=0;
        }
        if(!!$datas->save()){
            return redirect(route(Session::get('identity').'.medpurchase.index'))->with($this->responseMessage(true,null,"puchased successfully created."));
        }
    }catch(Exception $e){
dd($e);
return redirect(route(Session::get('identity').'.medpurchase.index'))->with($this->responseMessage(true,null,"puchased successfully created."));
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

                 
    public function findProduct(request $request){
       $res = Medicinedetails::where('medicinebrand_id',$request->brand)->get();
if($res->count()>0){
            $type=array(1=>"Tab",2=>"Cap",3=>"Syrup",4=>"Injection",5=>"supositor");
            $data='';          
                foreach ($res as $item){
                        $data.='<div class="col-lg-6 col-md-6">';
                        $data.='<div class="ribbon-wrapper card">';
                        $data.='<div class="ribbon ribbon-bookmark ribbon-default">'.$type[$item->type].'</div>';
                        $data.='<img class="card-img-top img-responsive ribbon-content" src="'.asset("$item->image").'" alt="Card image cap">';
                        $data.='<div class="card-body">';
                        $data.='<h4 class="card-title">'.$item->name.'</h4>';
                        $data.='<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>';
                        $data.='<span class="btn btn-primary" onclick="add_cart('.$item->id.')">Add</span>';
                        $data.='</div>';
                        $data.='</div>';
                        $data.='</div>';
                }
                return $data;
                }else{
                    return ['vai'=>'jan'];
                }
    }



    public function findgetProduct(request $request){
        $res = Medicinedetails::where('id',$request->p_id)->get();
        return $res;
    }
}




