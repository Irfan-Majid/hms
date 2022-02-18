<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Models\MedicineDetails as med_model;
use App\Models\Medicinegeneric;
use App\Models\Medicinebrand;

use App\Http\Requests\Medicinedetails\CreateRequest;
use App\Http\Requests\Medicinedetails\UpdateRequest;
use Session;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class MedicineDetailsController extends Controller
{
    //
    use ResponseTrait;
        public function index(){
            $medics=med_model::orderBy('id','DESC')->paginate(5);
            return view('medicine_details.index',compact('medics'));
        }

        public function addMed(){
            $generics=Medicinegeneric::all();
            $brands=Medicinebrand::all();
            return view('medicine_details.create',compact('brands','generics'));
        }

        public function storeMed(CreateRequest $request){
        try{
            $image=$request->file('image');
            $imageName = '/source/public/images/'.time().'.'.$image->extension();
            Log::info($imageName);
            $med=new med_model();
            $med->image=$imageName;
            $med->name=$request->name;
            $med->description=$request->description;
            $med->medicinebrand_id=$request->medicinebrand_id;
            $med->medicinegeneric_id=$request->medicinegeneric_id;
            $med->purchase_price=$request->purchase_price;
            $med->sale_price=$request->sale_price;
            if(!!$med->save()){
                $image->move(public_path('images'),$imageName);
                return redirect(route(Session::get('identity').'.medicinedetail'))->with($this->responseMessage(true, null, "You have successfully added medicine."));
            }
        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.addmedicinedetail'))->with($this->responseMessage(true, null, "You have successfully added medicine."));
        }
        
    }

    public function getMed($id){
        
        $medic=med_model::findorfail($id);
        $generics=Medicinegeneric::all();
        $brands=Medicinebrand::all();
        return view('medicine_details.edit',compact('brands','generics','medic'));
    }

    public function updateMed(UpdateRequest $request){
        try{
            
            $image=$request->file('image');
            $med=med_model::find($request->id);
            
            if($image){
                $imageName = '/source/public/images/'.time().'.'.$image->extension();
                if(file_exists(public_path("$med->image"))){
                     unlink(public_path("$med->image"));
               }
               $imageName = '/source/public/images/'.time().'.'.$image->extension();
           }else{
               $imageName=$med->image;
           }
            $med->$image=$imageName;
            $med->name=$request->name;
            $med->description=$request->description;
            /*$med->medicinebrand_id=$request->medicinebrand_id;
            $med->medicinegeneric_id=$request->medicinegeneric_id;*/
            $med->purchase_price=$request->purchase_price;
            $med->sale_price=$request->sale_price;
            $med->updated_at=Carbon::now()->toDateTimeString();
            die();
            if($med->save()){
                if($image){
                    $image->move(public_path('images'),$imageName);
                }
                return redirect(route(Session::get('identity').'.medicinedetail'))->with($this->responseMessage(true, null, "You have successfully added a doctor."));
            }
        }catch(Exception $e){
            dd($e);
            return redirect(route(Session::get('identity').'.getmedicinedetail'))->with($this->responseMessage(true, null, "You have successfully added a doctor."));
        }



    }

    public function deleteMed(){
        
    }

}
