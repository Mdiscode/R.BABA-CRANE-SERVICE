<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Locksheet;
use File;
class CompanyController extends Controller
{
    // ------Company--controller--start---
    public function AddCompany(){
        return view('admin/company/AddCompany');
    }
    //--store--company--data--
    public function StoreAddCompany(Request $request){
        $validate= $request->validate([
          "companyname"=>"required|min:3|string",
          "address"=>"required|min:3",
          "email"=>"required|string|email|lowercase|max:30|unique:users",
          "phone"=>"min:10|regex:/[0-9]+$/"
        ]);
        //create
        $createcompany = Company::create([
          "companyname"=>$request->companyname,
          "address"=>$request->address,
          "gaadino"=>$request->gaadino,
          "email"=>$request->email,
          "phone"=>$request->phone
        ]);
        return redirect()->back()->with('success','Company Data is insert Successfully!');  
    }
    //---list--company--data----
    public function ViewCompany(){
      $getCompany = Company::getCompany();
        return view('admin/company/company-list',compact('getCompany'));
    }
    // ---------End---Company-------------

    //-----LOCKSHEET--RECORD----------START---
    // ---add--locksheet--
    public function AddLockSheet()
{
    $companyNames = Company::pluck('companyname'); 
    return view('admin.company.AddLockSheet', compact('companyNames'));
}
//--store--locksheet--data----
   public function StoreAddLockSheet(Request $request){
    $validate  = $request->validate([
      "name"=>"string|min:3",
      "slipNo"=>"required",
      "inTime"=>"required",
      "outTime"=>"required",
      "workdetail"=>"required|min:4",
      "companyname"=>"required|min:3"
    ]);
    //create
    $locksheet = Locksheet::create([
       "name"=>$request->name,
       "slipNo"=>$request->slipNo,
       "date"=>$request->date,
       "inTime"=>$request->inTime,
       "outTime"=>$request->outTime,
       "totalTime"=>$request->totalTime,
       "workdetail"=>$request->workdetail,
       "companyname"=>$request->companyname,
       "gaadino"=>$request->gaadino
    ]);
    return redirect()->back()->with('success',"locksheet Data store Successfull!");
   }
  //---view--locksheet---
  public function ViewLockSheet(){
    $getLocksheet = Locksheet::getLocksheet();
    return view('admin/company/locksheet',compact('getLocksheet'));
  }
//   ----Edit--locksheet---
public function EditLockSheetData($id){
    $editLocksheet = Locksheet::find($id);
    $companyName = Company::pluck('companyname');
    return view('admin/company/UpdateLockSheet',compact('editLocksheet','companyName'));
}
//--Update--locksheet-data--
public function UpdateLocksheetData(Request $request){
    $validate  = $request->validate([
        "name"=>"string|min:3",
        "slipNo"=>"required",
        "inTime"=>"required",
        "outTime"=>"required",
        "workdetail"=>"required|min:4",
        "companyname"=>"required|min:3"
      ]);
      $lockUpdate = Locksheet::find($request->id);
      $lockUpdate->update([
        "name"=>$request->name,
       "slipNo"=>$request->slipNo,
       "date"=>$request->date,
       "inTime"=>$request->inTime,
       "outTime"=>$request->outTime,
       "totalTime"=>$request->totalTime,
       "workdetail"=>$request->workdetail,
       "companyname"=>$request->companyname,
       "gaadino"=>$request->gaadino
      ]);
      return redirect()->back()->with('success','Locksheet Update Successfully!');
}
//delete--locksheet--
public function DeleteLocksheetData($id){
    $delete  = Locksheet::find($id)->delete();
    return redirect()->back()->with('success','Locksheet Delete Successfully');
}
    //-----END--LOCKSHEET---RECORD------------
}
