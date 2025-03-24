<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Contactus;
use App\Models\CardContent;
use Hash;
use Str;
use Illuminate\Support\Facades\Storage;
use File;
use App\Models\Inquiry;
use App\Models\Operator;
// use Illuminate\Support\Facades\File;
use App\Models\ComposeEmail;
class AdminController extends Controller
{
    public function AdminDashboard(){
        $user = User::selectRaw('count(id) as count,DATE_FORMAT(created_at,"%Y-%m") as month')
        ->groupBy('month')->orderBy('month','asc')->get();

        $months= $user->pluck('month');
        $counts = $user->pluck('count');

          //get inquiry--details
          $inquiry = Inquiry::get();
        //get count inquiry
          $inquiryCount = Inquiry::count();
          $userCount = User::count();

        return view('admin.index',compact('months','counts','inquiry','inquiryCount','userCount'));
    }
    //logout
    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    //admin login
    public function AdminLogin(){
        return view('admin.admin_login');
    }
    //admin profile
    public function admin_profile(Request $request){
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.admin_profile',$data);
    }
    //update the profile
    public function admin_profile_update(Request $request){
        // dd($request->all());
        $user = $request->validate([
            // 'email'=>'required|unique:users,email,'.Auth::user()->id
            'email'=>'required|string|email',
            'name'=>'required|string|min:3',
        ]);
        $user = User::find(Auth::user()->id);
        $user->name       =trim($request->name);
        $user->username   =trim($request->username);
        $user->email      =trim($request->email);
        $user->phone      =trim($request->phone);
        $user->address    =trim($request->address);
        if(!empty($request->password)){
            $user->password   = Hash::make($request->password);
        }
        //image 
        if ($request->hasFile('photo')) {
            // Delete the old profile picture if it exists
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
    
            // Store the new picture
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/',$filename);
            // Save the path to the user's picture
            $user->photo = $filename;
        }
        // $user->photo      =trim($request->photo);
            $user->about      =trim($request->about);
            $user->website    =trim($request->website);
       
        if( $user->save()){
            return redirect('admin/profile')->with('success','Profile Update Successfully..');
       
        }else{
            return redirect('admin/profile')->with('error','Profile Not Update Successfully..');
       
        } 
    }
    //admin users
    public function admin_users(){
        $data['getRecord'] = User::getRecord();
        return view('admin.users.list',$data);
    }

    //----CONTACT-US---RECORD---START----
       //display contactus--record
    public function user_contact(){
        $data['contactData'] = Contactus::getContact();
        return view('admin.users.contactus',$data);
    }
    //--Delete--contactus--record---
    public function Delete_contactus($id){
        $contact = Contactus::find($id)->delete();
        return redirect()->back()->with('success','Contactus data is Delete  successfully!');
    }
    //----END--CONTACT-UD--RECORD--------
    //----ADD--CARD--DATA---START----//
    public function addCardData(){
        return view('admin.users.addcard');   
    }
    //---storethe card Data---
    public function storeCardDesc(Request $request){
        $validate = $request->validate([
            "title" => "required|string|min:3|max:100", // Removed "uppercase" and added "max" for better control.
            "description" => "required|string|min:10|max:300", // Added "max" for description length.
            "location" => "required|string|min:3|max:100", // Added "max" for location.
            "address" => "required|string|min:3|max:100", // Added "string" and "max".
            "phone" => "required|min:10|regex:/^[0-9]+$/", // Added "string" and limited the phone length.
        ]);
        
        if(!$validate){
            return redirect('admin.users.addcard')->with('errors','The validation is failed');
        }
        // return $request->all();
        // generate image 
        if ($request->hasFile('image')) {
            // Store the new picture
            $file = $request->file('image');
            $imgName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('cardimg/',$imgName);
        }
        //create
        $createdata = CardContent::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "location"=>$request->location,
            "address"=>$request->address,
            "phoneNo"=>$request->phone,
            "image"=>$imgName,
        ]);
        return redirect('admin/users/addCardData')->with('success','The Card Data is insert successfully.');
    }

    //--display the cardData list
    public function getListCardData(){
        $data['getCardData']= CardContent::getCardData();
        return view('admin/users/CardData-list',$data);
    }
    //UPDATE
    public function Update_CardData(Request $request){
        $validate = $request->validate([
            "title"=>"required|min:3",
            "description"=>"required|min:5|max:100|string",
            "location"=>"required|min:3",
            "phone"=>"required|min:10|regex:/^[0-9]+$/",
            "image"=>"required"
        ]);
        // --get cardData--from-table--
        $cardData = CardContent::find($request->id);
        //image
        if($request->hasFile('image')){    
            $path = 'cardimg/'.$cardData->image;
            if(File::exists($path)){
            File::delete($path);
            } 
            $file = $request->file('image');
            $imgName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('cardimg/',$imgName );
            }else{
                $imgName = $cardData->image;
            }
            //update cardData
            $cardData->update([
                'title'       => $request->input('title'),
                'description' => $request->input('description'),
                'location'    => $request->input('location'),
                'address'     => $request->input('address'),
                'phoneNo'     => $request->input('phone'),
                'image'       => $imgName
            ]);
            
            return redirect()->back()->with("success","CardData is Update successfully!");
    }
    //---Delete--the--card-Data--
    public function delete_cardData($id){
        $delete = CardContent::find($id);
        if($delete){
            $path = 'cardimg/'.$delete->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $delete->delete();
        }
        return redirect()->back()->with('success',"CardData is Delete Successfully!");
    }
    // -----------END--CARD--DATA--------------
    //--Edit the cardData and show--
    // public function edit_cardData($id){
    //     $find = CardContent::where('id',$id)->first();
    //     return response()->json([
    //      'status'=>true,
    //      'cardData'=>$find,
    //     ],200);
    // }
    
    //userSearch..
    public function userSearch(Request $request)
{
    $query = $request->get('query');

    $getRecord = User::when($query, function ($queryBuilder) use ($query) {
        return $queryBuilder->where('name', 'LIKE', "%{$query}%")
                            ->orWhere('id', $query)->orWhere('role','LIKE',"%{$query}%");
    })->paginate(7);

    return view('admin.users.list', compact('getRecord'));
}

}


    

