<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CardContent;
use App\Models\Contactus;
use App\Models\User;
use App\Models\Company;
use App\Models\Operator;
use App\Models\Locksheet;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Auth;
use Auth;
class APIController extends Controller
{
    //signup
    public function signup(Request $request){
    //     $validate = Validator::make(
            
    //         $request->all(),
    //         [
    //         'name' => 'required|string|min:3|max:12',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:4|max:10',
    //     ]);
        
    //    if($validate->fails()){
    //     return response()->json([
    //         "status"=>false,
    //         "message"=>"validation is fails",
    //         "password"=>"input 4 and 10",
    //         "name"=>"input 3 character name"
    //         // "errors"=>$validate->errors->all()
    //     ],401);
    //    }
    //    return $request->all();
       
       $user = User::create([
        "name"=>$request->name,
        "email"=>$request->email,
        "password"=>$request->password
       ]);
        if($user){
            return response()->json([
                'status'=>true,
                'message'=>"User Created Successfully",
                'user'=>$user
               ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>"User data is not created",
                'user'=>$user
               ],401);
        }
    }
    // login 
    public function adminlogin(Request $request){
            return response()->json($request->all());
            // return response()->json($request->all());
        // $validateAdmin = validator::make(
        //     $request->all(),
        //     [
        //         "email"=>'required|email',
        //         'password'=>'required'
        //     ]
        //     );
        //     if($validateAdmin->fails()){
        //         return response()->json([
        //             'status'=>false,
        //             'message'=>'Authentication fails',
        //             'errors'=>$validateAdmin->errors()->all()
        //         ],404);
        //     }
        // if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        //     $authUser = Auth::user();
        //     return response()->json([
        //         'status'=>true,
        //         'message'=>"User Logged in Successfully",
        //         'token' =>$authUser->createToken('API Token')->plainTextToken,
        //         'token_type'=>'bearer',
        //         'data'=>$authUser
        //     ],200);
        // }else{
        //         return response()->json([
        //             "status"=>false,
        //             "message"=>"Authentication fails not match "
        //         ],401);
        //     }
    
    }
//logout
public function logout(Request $request){
    $user = $request->user();
    $user->tokens()->delete();

    return response()->json([
        'status'=>true,
        'user'=>$user,
        'message'=>'you logged out successfully'
    ],200);
}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function ViewCompany(string $id)
    {
        $viewCompany = Company::find($id);
        if(!ViewCompany){
            return response()->json([
              "success"=>false,
              "message"=>'Company data not found'
            ],400);
        }
        return response()->json([
            "success"=>true,
            "data"=>$viewCompany
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json([
                'success' => false,
                'message' => 'Company not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
            'cmpyData' => [$company]
            ]
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'companyname' => 'required|string|max:255',
            'address' => 'required|string',
            'gaadino' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:12'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422); // 422 status for validation error
        }

        $updatecmp = Company::where('id',$id)->update([
            "companyname"=>$request->companyname,
            "address"=>$request->address,
            "gaadino"=>$request->gaadino,
            "email"=>$request->email,
            "phone"=>$request->phone

        ]);

        if (!$updatecmp) {
            return response()->json([
                'success' => false,
                'message' => 'Company data not found'
            ], 404);
        }
        // $data = Company::find($id);
        // $email = $request->all();
        return response()->json([
            'success' =>true,
            'message' =>"Company data is successfully",
            'data' =>[$updatecmp],
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::where('id',$id)->delete();
            return response()->json([
                'success'=>true,
                "message"=>"data is deleted",
                "data"=>$company,
            ],200);
    }
}
