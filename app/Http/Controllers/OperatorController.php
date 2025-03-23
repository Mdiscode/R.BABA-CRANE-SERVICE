<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operator;
use File;
use Illuminate\Support\Facades\Validator;
class OperatorController extends Controller
{
    // ----OPERATOR---START-----
    public function AddOperator(){
      return  view('admin/company/AddOperator');
    }
    //--store--operator-data--
    public function StoreAddOperator(Request $request){
      $validate = $request->validate([
        "name"=>'required|string|min:3',
        "address"=>"required|min:3",
        "phone"=>"required|min:10|regex:/^[0-9]+$/"
      ]);
      //image
      if($request->hasFile('image')){
         $file=$request->file('image');
         $imgName = uniqid().'.'.$file->getClientOriginalExtension();
         $file->move('upload/',$imgName);
      }
      //license
      if($request->hasFile('license')){
        $file=$request->file('license');
        $license = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('upload/',$license);
      }
      $store= Operator::create([
         "name"=>$request->name,
         "address"=>$request->address,
         "phone"=>$request->phone,
         "gaadino"=>$request->gaadino,
         "aadharno"=>$request->aadharno,
         "image"=>$imgName,
         "license"=>$license
      ]);
      return redirect()->back()->with('success',"Operator data  store successfully!");
    }
    // ----view--list--of--operator--
    public function ViewOperator(){
        $getOperator=Operator::getOperator();
        return view('admin/company/operator-list',compact('getOperator')); 
        return "heelo";
    }
    // ----Update--Operator---
    public function UpdateOperatorData(Request $request){
      $validation = $request->validate([
        "name"=>"required|min:3|string",
        "address"=>"required|min:3",
        "phone"=>"required|min:10|regex:/^[0-9]+$/",
        // "aadharno"=>"min:16"
      ]);
      $operator = Operator::find($request->id);
      //image
      if($request->hasFile('image')){
        $path= 'upload/'.$operator->image;
        if(File::exists($path)){
          File::delete($path);
        }
        //new img
        $file= $request->file('image');
        $imgName = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('upload/',$imgName);
      }else{
        $imgName = $operator->image;
      }
      //license
      if($request->hasFile('license')){
        $path = $operator->license;
        if(File::exists($path)){
          File::delete($path);
        }
        //new img
        $file = $request->license;
        $license = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('upload/',$license);
      }else{
        $license = $operator->license;
      }
       
      //update
      $operator->update([
         "name"=>$request->name,
         "address"=>$request->address,
         "phone"=>$request->phone,
         "gaadino"=>$request->gaadino,
         "aadharno"=>$request->aadharno,
         "image"=>$imgName,
         "license"=>$license
      ]);
      return redirect()->back()->with('success','Operator Update Successfully!');
    }
    //delete Operator
    public function Delete_Operator($id){
      $oper = Operator::find($id);
      if($oper){
        $path = 'upload/'.$oper->image;
        $path2 ='upload/'.$oper->license;
        if(File::exists($path)){
          File::delete($path);
        }
        if(File::exists($path2)){
          File::delete($path2);
        }
        $oper->delete();
      }
      return redirect()->back()->with('success',"Operator Delete successfully!");
    }
    // -----END---OPERATOR---
}
