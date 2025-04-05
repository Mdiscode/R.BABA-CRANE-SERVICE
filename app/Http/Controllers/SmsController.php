<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SmsService;
use Twilio\Rest\Client;
use App\Models\User;
class SmsController extends Controller
{
    public function sendSmsToUser(Request $request, SmsService $smsService)
    {
        // $userPhone = $request->input('9044508134'); // e.g. +919876543210
        // $message = "Hello! Your invoice has been created successfully.";
    
        // $smsService->send($userPhone, $message);

        // try{
        //     $ac_sid=env('TWILIO_SID');
        //     $token = env('TWILIO_AUTH_TOKEN');
        //     $number = env('TWILIO_NUMBER');
        //     $client = new Client($ac_sid,$token);
        //     $client->messages->create('+91'."9044508134",[
        //         'from'=>$number,
        //         'body'=>"hello first msg"
        //     ]);

        //     return "hello";
        // }catch(\Exception $th){
        //     console.log($th);
        // }
    
        $admin = User::where('role','admin')->value('email');
        

    }
}
