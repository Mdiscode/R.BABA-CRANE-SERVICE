<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\About;
use File;
class ServiceController extends Controller
{
    public function Add_service(){
        $service = Service::paginate(5);
        return view('admin.users.service',compact('service'));
    }
    public function AddServices_Data(Request $request){
        $validate = $request->validate([
            'stitle'=>"required|min:4|string",
            'description'=>"required|min:10",
            'image'=>'required'
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $imgName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move('serviceimg/',$imgName);
        }
        $service = Service::create([
           "title"=>$request->stitle,
           "description"=>$request->description,
           "image"=>$imgName
        ]);
     return redirect()->back()->with("success","Services data is insert successfully!");
    
    }
    //update--services
    public function UpdateServices(Request $request){
        $validate = $request->validate([
            'stitle'=>"required|min:4|string",
            'description'=>"required|min:10",
            // 'image'=>'required'
        ]);
        $Service = Service::find($request->id);
        //image
      if($request->hasFile('image')){
        $path= 'serviceimg/'.$Service->image;
        if(File::exists($path)){
          File::delete($path);
        }
        //new img
        $file= $request->file('image');
        $imgName = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('serviceimg/',$imgName);
      }else{
        $imgName = $Service->image;
      }
      //update
      $Service->update([
        "title"=>$request->stitle,
        "description"=>$request->description,
        "image"=>$imgName
      ]);
      return redirect()->back()->with('success',"Services is Update Successfully!");
    }
    //delete 
    public function delete_Services($id){
        $ser = Service::find($id);
        if($ser){
            $path = '/serviceimg'.$ser->image;
            if(File::exists($path)){
              File::delete($path);
            }
            
            $ser->delete();
          }
          return redirect()->back()->with('success','Services is Delete Successfully!');
    }
    //user_view_services_page
    public function get_services(){
        $servicesValue = Service::get();
        return view('userUi/services',compact('servicesValue'));
    
    }
    //---END---SERVICES--CONTROLLER-----//

   //----START--ABOUT---PAGE-------//
    public function get_About(){
        $userabout = About::get();
        // return $userabout;
        return view('userUi/about',compact('userabout'));
    }
    //view--About--data---
    public function get_about_data(){
        $about = About::get();
        return view('admin.users.about',compact('about'));
    }

    //update
    public function Update_about(Request  $request){
      $uabout = About::find($request->id);
      $validate = $request->validate([
        'ow_name'=>'required|min:3|string',
        "ad_name"=>'required|min:3|string',
        "heading"=>'required|min:5|string',
        "about"=>'required|min:10|string'
      ]);
       //slid_image
       if($request->hasFile('sphoto')){
        $path= 'serviceimg/'.$uabout->sphoto;
        if(File::exists($path)){
          File::delete($path);
        }
        //new img
        $file1= $request->file('sphoto');
        $slimage = uniqid().'.'.$file1->getClientOriginalExtension();
        $file1->move('serviceimg/',$slimage);
      }
      else{
        $slimage = $uabout->sphoto;
      } //end_slide---

      //-----ow_image------
      if($request->hasFile('owphoto')){
        $path= 'serviceimg/'.$uabout->owphoto;
        if(File::exists($path)){
          File::delete($path);
        }
        //new
        $file2 = $request->file('owphoto');
        $owimage = uniqid().'.'.$file2->getClientOriginalExtension();
        $file2->move('serviceimg/',$owimage);
      }
      else{
        $owimage = $uabout->owphoto;
      } //end--owimage---

      //-----ad_image------
      if($request->hasFile('ad_photo')){
        $path= 'serviceimg/'.$uabout->ad_photo;
        if(File::exists($path)){
          File::delete($path);
        }
        //new
        $file3 = $request->file('ad_photo');
        $adimage = uniqid().'.'.$file3->getClientOriginalExtension();
        $file3->move('serviceimg/',$adimage);
      }
      else{
        $owimage = $uabout->ad_photo;
      } //end--adimage---
      // update
      $uabout->update([
         "sphoto"=>$slimage,
         "owphoto"=>$owimage,
         "ad_photo"=>$adimage,
         "ow_name"=>$request->ow_name,
         "ad_name"=>$request->ad_name,
         'heading'=>$request->heading,
         'instaid'=>$request->instaid,
         "facebookid"=>$request->facebookid,
         "about"=>$request->about
      ]);
      return redirect()->back()->with('success','About update successfully!');

      // return $adimage;
    }
       //----END--ABOUT---PAGE-------//
}
