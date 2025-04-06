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
use App\Models\Operator;
use Barryvdh\Snappy\Facades\SnappyPdf;
use NumberFormatter;
use App\Models\Invoice;
use Twilio\Rest\Client;

// use Barryvdh\DomPDF\Facade as PDF;
class UserController extends Controller
{
    public function userHome(){
        $cardData = CardContent::all();
        // get staff count;
         $staff = Operator::count();
         //get users count 
         $usercount = User::count();
        return view('userUi.home',compact("cardData",'staff','usercount'));
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

            $adminEmail = User::where('role','admin')->first();
        
            if($savedb){
                Mail::to($adminEmail->email)->send(new InquiryMail($save));
            }

            ///----send--SMS-----to-----user-------
            try{
                    $ac_sid=env('TWILIO_SID');
                    $token = env('TWILIO_AUTH_TOKEN');
                    $number = env('TWILIO_NUMBER');
                    $client = new Client($ac_sid,$token);
                    // $client->messages->create('+91'.$request->phone,[
                    //     'from'=>$number,
                    //     'body' => "
                    //         Thanks for your inquiry with R. Baba Crane Services We'll contact you soon. We Serve (".$request->inquiry. ") & nearby areas.Call us for urgent help: {$adminEmail->phone}
                    //     "

                    // ]);

                    //  2. Send SMS to the admin
                    $client->messages->create('+91' .$adminEmail->phone, [
                        'from' => $number,
                        'body' => "New inquiry : {$request->name}, Phone: {$request->phone}, inquiry: {$request->inquiry}"
                    ]);
        
                    // return "hello";
                }catch(Exception $e){
                    console.log($e);
                }
            ///----send--SMS-----to-----user---End----

            return redirect()->back()->with("success","Inqueiry is Successfully");


        }
      //GET inquiry---detail
        //-----End--INQUIRY------
    
        // ----------------Start--GENERATE-INVOICE---------------------
        public function download_pdf(Request $request){
            
                        // Fetch records between the selected dates
        $lock = Locksheet::whereBetween('date', [$request->start_date, $request->end_date])
        ->where('companyname',$request->companyname)->get();
            

        ///totalTime
        // $totalTimeArray = ["6 hours and 37 minutes", "5 hours and 40 minutes"];
           $totalTimeArray =$lock->pluck('totalTime');
        $totalHours = 0;
        $totalMinutes = 0;

        foreach ($totalTimeArray as $time) {
            preg_match('/(\d+)\s*hours?/', $time, $hoursMatch);
            preg_match('/(\d+)\s*minutes?/', $time, $minutesMatch);

            $hours = isset($hoursMatch[1]) ? (int)$hoursMatch[1] : 0;
            $minutes = isset($minutesMatch[1]) ? (int)$minutesMatch[1] : 0;

            // $totalHours += $hours;
            // $totalMinutes += $minutes;

              // Convert everything to minutes
           $totalMinutes += ($hours * 60) + $minutes;
        }

        // Convert total minutes back to hours and minutes
        $totalHours = floor($totalMinutes / 60);  // Get full hours
        $remainingMinutes = $totalMinutes % 60;   // Get remaining minutes
        
        $monthTotalTime = $totalHours.":".$remainingMinutes;

        //-------------totalAmount---------
        $TotalAmount=$lock->pluck('totalAmount');
        $Amount =0;
        foreach ($TotalAmount as $amount){
            $Amount += $amount;
        }
        $TotalAmount = number_format($Amount,2);
        $GST = ($Amount * 18)/100;
        $GST2 = number_format($GST,2);
        $TotalAmountGST = $Amount + $GST;
        $TotalAmountGST2 = number_format($TotalAmountGST,2);
        // ----total--amount----end----

        // --------convert--to--nuber-to-text------------
        function convertNumberToWords($number) {
            $formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        
            if ($number >= 100000) {
                // Extract lakh and remaining amount
                $lakhValue = floor($number / 100000); // Get full lakhs
                $remaining = $number % 100000; // Get remaining amount below 1 lakh
        
                $words = ucfirst($formatter->format($lakhValue)) . " lakh";
                
                // If there is a remaining amount, convert it and append
                if ($remaining > 0) {
                    $words .= " " . $formatter->format($remaining) . " rupees";
                } else {
                    $words .= " only";
                }
                
                return $words;
            } else {
                // Convert to rupees format
                return ucfirst($formatter->format($number)) . " rupees only";
            }
        }
        
        // Example Usage
        $TotalAmountGST = $TotalAmountGST;  
        $amountInWords = convertNumberToWords($TotalAmountGST);
        //   --------convert---to---number--to---text---End-----

        //-------work---detail----------
        $itemName = $lock[0]->workdetail;
        //-------end---work----detial----

        // ---------CGST-Amount---------
        $CGST = ($Amount * 9)/100;
        $CGSTAmount = number_format($CGST,2);
        
        //SGST
        $SGST = ($Amount * 9)/100;
        $SGSTAmount = number_format($SGST,2);

        //Total--Tax
           $total =($CGST + $SGST);
           $TotalTax = number_format($total);
        // ---------CGST-Amount---------
          $paymentMode=isset($request->paymentMode) ?$request->paymentMode : "";

          $lastInvoice = Invoice::orderBy('id','desc')->first();
        //   return $lastInvoice;
        $nextNumber = $lastInvoice ? ((int)$lastInvoice->invoice_no + 1) : 1;
        $formatterNo = str_pad($nextNumber,3,'0',STR_PAD_LEFT);
        // return $formatterNo;
        $data = [
            "invoiceNo"=> $formatterNo,
            "company" => $lock->isNotEmpty() ? $lock[0]->companyname : null,
            "itemName"=>$itemName,
            "totalTime"=>$monthTotalTime,
            "Amount"=>$TotalAmount,
            "GST"=>$GST2,
            "TotalAmountGST"=>$TotalAmountGST2,
            "CGST"=>$CGSTAmount,
            "SGST"=>$SGSTAmount,
            "TotalTax"=>$TotalTax,
            "amountInWords"=>$amountInWords,
            'date'=>$request->start_date,
            'paymentMode'=> $paymentMode,
        ];
        
        // ----------Store-----invoice--data---------
         
        if($data){
            $invoice = Invoice::create([
                "invoice_no"=>$data['invoiceNo'],
                "company_name"=>$data['company'],
                "itemName"=>$data['itemName'],
                "totalTime"=>$data['totalTime'],
                "TotalAmount"=>$data['Amount'],
                "TotalAmountGST"=>$data['TotalAmountGST'],
                "paymentMode"=>$data['paymentMode'],
            ]);
        }
        
        // ----------Store-----invoice--data----End-----


        // ----------gentrate-PDF------ 
                    SnappyPdf::setBinary('"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe"');

            $pdf = SnappyPdf::loadView('myPDF', compact('data'));
                        // ->setPaper('a4')
                        // ->setOption('margin-top', 10)
                        // ->setOption('margin-right', 10)
                        // ->setOption('margin-bottom', 10)
                        // ->setOption('margin-left', 10);
         

            if($pdf){
                // $filePath = 'invoices/invoice-' .$formatterNo. '.pdf';
                // $pdf->save(storage_path('app/public/' . $filePath));
                return $pdf->download('invoice'.$formatterNo.'.pdf');
            }

        // ----------------END--GENERATE-INVOICE---------------------
        }

        



}
