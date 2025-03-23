<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Locksheet;
class AgentController extends Controller
{
    public function AgentDashboard(){
        return view('agent.index_agent');
    }
    public function AgentLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.home');
    }

    //agent profile
    public function agent_profile(Request $request){
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('agent.agent_profile',$data);
    }
    ///update agent profile
    //update the profile
    public function agent_profile_update(Request $request){
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
            return redirect('agent/agent_profile')->with('success','Profile Update Successfully..');
       
        }else{
            return redirect('agent/agent_profile')->with('error','Profile Not Update Successfully..');
       
        } 
    }
    
    //agent locksheet
    public function agent_locksheet() {
        // Get the authenticated user's company name
        $company = Auth::user()->companyname;
    
        // Retrieve all Locksheet records that match the user's company
        $locksheetData = Locksheet::where('companyname', $company)
                                    ->orderBy('id', 'desc')
                                    ->paginate(6);
    
        // Return JSON response with the filtered Locksheet data
        // return response()->json($locksheetData);
        return view('agent/agent_locksheet',compact('locksheetData'));
    }

    // view--Lock--sheet 
    public function agent_view_locksheet($id){
        $data = Locksheet::find($id);
        return view('agent.agent_view_locksheet',compact('data'));
    }
    
}
