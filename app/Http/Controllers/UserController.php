<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\CardContent;
use App\Models\Contactus;
use App\Models\Inquiry;
use Mail;
use App\Mail\InquiryMail;
use App\Models\Locksheet;
use App\Models\User;
use PDF;
// use Barryvdh\DomPDF\Facade as PDF;
class UserController extends Controller
{
    public function userHome(){
        $cardData = CardContent::all();
        // print_r($card);
        return view('userUi.home',compact("cardData"));
    }
    //delete  user data
    public function deleteRoleData($id){
        $role = User::find($id)->delete();
        return redirect()->back()->with('success','Role data Delete successfully!');
     }
    //logout
    public function UserLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.home');
    }

    //----CONTACT-US--RECORD--START----
    
    public function contactUs(Request $request){
        $validate = $request->validate([
          "name"=>"required|string|min:3|max:20|regex:/^[a-zA-Z\s]+$/",
          "phone"=>"required|min:10|max:12|regex:/^[0-9]+$/",
           "email"=>"required|email|lowercase",
        ]);

        // return $request->all();
        $create = Contactus::create([
            'name'=>$request->name,
            "phoneNumber"=>$request->phone,
            "email"=>$request->email,
            "company"=>$request->company,
            "craneType"=>$request->craneType
        ]);

        if($create){
            return redirect()->route('user.home')->with('success',"Enquire is send successfully");
        }
        // return $request->all();
    } 
   // ------END--CONTACT-US---RECORD-----
    
//    ------INQUIRY_USER--------
        public function User_inquiry(Request $request){
            

            $save = new Inquiry;
            $save->inquiry =trim($request->inquiry);
            $save->email = trim($request->email);
            $save->phone = trim($request->phone);
            $savedb = $save->save();

            if($savedb){
                Mail::to('israrshekh.code22@gmail.com')->send(new InquiryMail($save));
            }
               // Send Email to Admin
            return redirect()->back()->with("success","Inqueiry is Successfully");


        }
      //GET inquiry---detail
        //-----End--INQUIRY------
        //generate pdf
        public function download_pdf(Request $request){
            
                        // Fetch records between the selected dates
        $lock = Locksheet::whereBetween('date', [$request->start_date, $request->end_date])
        ->where('companyname',$request->companyname)->get();
            
            $data = [
                "title"=>'welcome to R.baba',
                'date'=>$request->start_date,
                'locksheet'=>$lock
            ];
            $pdf = PDF::loadview('myPDF',compact('lock'));
            return $pdf->download('locksheet.pdf');
   
        }
}
