<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ComposeEmail;
use Mail;
use App\Mail\ComposeEmailMail;
class EmailController extends Controller
{
   public function email_compose(){
      $getEmail = User::whereIn('role', ['agent', 'user'])->get();
    return view('admin.email.compose',compact('getEmail'));
   }

   public function email_compose_post(Request $request){
      // return dd($request->all());
      $save = new ComposeEmail;
      $save->user_id = $request->user_id;
      $save->cc_email = trim($request->cc_email);
      $save->subject = trim($request->subject);
      $save->message = trim($request->message);
      $dadaSave=$save->save();
      // --email start--
      if($dadaSave){
         $getUserEmail = User::where('id','=',$request->user_id)->first();
         
         Mail::to($getUserEmail->email)->cc($request->cc_email)
         ->send(new ComposeEmailMail($save));
         // ---email send end--
         return redirect('admin/email/compose')->with('success',"Email send is successfully!");
      }
      
   }
   //sent mail function
   public function Email_sent(){
      // return "hello";
      $getEmail = ComposeEmail::getEmail();
      // return response()->json($getEmail);
      return view("admin/email/sent",compact('getEmail'));
   }

   // ---email-sent--delete---- 
   public function email_sent_delete(Request $request){
          if(!empty($request->id)){
            $option = explode(',',$request->id);
            foreach($option as $id)
            {
               if(!empty($id)){
                  $getRecord =  ComposeEmail::find($id);
                  $getRecord->delete();
               }
            }
          }
         return redirect()->back()->with('success',"Send Email Delete Successfully!");
   }

   ///read the email
   public function email_read($id,Request $request){
         //  return "id=".$id;
         $data = ComposeEmail::find($id);
         $user_id = $data->user_id;
         $getUserName = User::select("name","photo")->find($user_id);
         // return $getUserName;
         return view('admin.email.read' ,compact('data','getUserName'));
   }
   //email delete the read email
   public function email_read_delete($id){

       $delete = ComposeEmail::find($id);
       $delete->delete();
      return redirect('admin/email/sent')->with('success',"Email Delete successfully!");
      
   }
}
