<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\AdminController;
use App\Http\controllers\AgentController;
use App\Http\controllers\UserController;
use App\Http\controllers\UpdateController;
use App\Http\controllers\EmailController;
use App\Http\controllers\OperatorController;
use App\Http\controllers\CompanyController;
use App\Http\controllers\ServiceController;
use App\Http\controllers\SmsController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//admin dashboard
Route::middleware(['auth','role:admin'])->group(function(){
    // ---start-controller-group--
    Route::controller(AdminController::class)->group(function(){
    Route::get('admin/dashboard','AdminDashboard')->name('admin.dashboard'); 
        //logout
    Route::get('admin/logout','AdminLogout')->name('admin.logout');
    //profile
    Route::get('admin/profile','admin_profile');
    //update profile
    Route::post('admin_profile/update','admin_profile_update');

    // ---start-route-group--
    Route::prefix('admin/users')->group(function(){
     //admin user list
    Route::get('/list','admin_users')->name('admin.users.list');
    //search user data
    Route::get('/search','userSearch')->name('search');
    //admin user contact list
    Route::get('/contactus','user_contact')->name('admin.contactus');
    Route::get('/contactusDelete/{id}',"Delete_contactus")->name('admin.delete_contactus');
    Route::get('/addCardData','addCardData')->name('admin.addCardData');
    Route::post('/StoreCardData','storeCardDesc')->name('admin.storeCardData');
    Route::get('/cardDataList','getListCardData')->name('admin.cardDataList');
    // Route::get('admin/Update_cardData/{id}','Edit_cardData')->name('admin.edit_cardData');
    Route::post('/update-cardData','Update_CardData')->name('update_cardData');
    Route::get('admin/deleteCardData/{id}','delete_cardData')->name('admin.deleteCard');
    
    });
    // Route::get('/edit-cardData/{id}','edit_cardData');

    // ---end--route--group---

    });
    //  ---end-controller--group-- 

    // -----OPERATOR--CONTROLLER----START---
    Route::controller(OperatorController::class)->group(function(){
      Route::get('/company/addOperator','AddOperator')->name('company.addOperator');
      Route::get('/company/viewOperator','ViewOperator')->name('company.Operatorlist');
      Route::post('/company/addOperator','StoreAddOperator')->name('company.StoreOperator');
      Route::get('/EditOperatorData/{id}','UpdateViewOperatorData');
      Route::get('Operator/deleteOperator/{id}','Delete_Operator')->name('deleteOperator');
      Route::post('/UpdateOperator','UpdateOperatorData')->name('UpdateOperator');
    });
    // ------END---OPERATOR---CONTROLLER----
    
    // ----Strat-COMPANY-CONTROLLER---
    Route::controller(CompanyController::class)->group(function(){    
  
      Route::get('/company/addCompany','AddCompany')->name('company.addCompany');
      Route::get('/company/addlockSheet','AddLockSheet')->name('company.addlocksheet');
      Route::get('/company/viewCompanyLocksheet','companyLocksheet')->name('viewCompanyLocksheet');    
    //    -----view-----
        Route::get('/company/viewCompany/','ViewCompany')->name('company.CompanyList');
        Route::get('/company/viewLockSheet','ViewLockSheet')->name('company.lockSheet-list');
        
        // -----store--company--data----
      Route::post('/company/addCompany','StoreAddCompany')->name('company.StoreCompany');
      Route::post('/company/addlockSheet','StoreAddLockSheet')->name('company.Storelocksheet');

      //---Update the Locksheet--
      Route::get('/EditLockSheet/{id}','EditLockSheetData')->name('EditLockSheet');
      Route::get('/deleteLockSheet/{id}','DeleteLocksheetData')->name('deleteLocksheet');
      Route::post('/UpdateLocksheet','UpdateLocksheetData')->name('UpdateLocksheet');
    });
    // -------END---COMPANY--CONTROLLER----

    //--start--emailController--
    Route::controller(EmailController::class)->group(function(){
     Route::get("admin/email/compose","email_compose")->name("admin.email.compose");
     Route::post("admin/email/compose_post","email_compose_post")->name('compose_post');
     Route::get('admin/email/sent',"Email_sent")->name('admin.email.sent');
     Route::get('admin/email_sent',"email_sent_delete");
     Route::get('admin/email/read/{id}','email_read')->name('admin.email.read');
     Route::get('admin/email/deleteRead/{id}','email_read_delete')->name('admin.email.deleteRead');
    });  //end emailController

    //---USER-CONTROLLER---START------
Route::controller(UserController::class)->group(function(){
  Route::get('admin/users/deleteContact/{id}','deleteContact')->name('deleteContactus');
  Route::get('admin/users/deleteRole/{id}','deleteRoleData')->name('deleteRole');
  // Route::get('user/inquiry_detail','user_inquiry_detail')->name('user.inquiry_detail');
  //pdf
  Route::get('pdf_generator','download_pdf')->name('pdf_generator');
  //---contactUs---
Route::post('user/contactUs','contactUs')->name('user.contactUs');
});
//---USER-CONTROLLER---END------

//---SIDE--CONTROLLER----START---
Route::controller(ServiceController::class)->group(function(){
  Route::get('admin/service','Add_service')->name('admin.service');
  Route::post('admin/add_service','AddServices_Data')->name('Add_Services');
  Route::post('admin/update_service','UpdateServices')->name('update_Services');
  Route::get('admin/deleteService/{id}','delete_Services')->name('deleteservice');
  //About--
  Route::get('admin/About','get_about_data')->name('admin.about_list');
  Route::post('admin/updateAbout','Update_about')->name('update_About');

});

//---SIDE--CONTROLLER----END-----
});  //end middleware


//admin login
Route::get('admin/login',[AdminController::class,'AdminLogin'])->name('admin.login');

//Agent Dashboard
Route::middleware(['auth','role:agent'])->group(function(){
    Route::get('agent/dashboard',[AgentController::class,'AgentDashboard'])->name('agent.dashboard');
    Route::get('agent/logout',[AgentController::class,'AgentLogout'])->name('agent.logout');
    //agent--profile
    Route::get('agent/profile',[AgentController::class,'agent_profile'])->name('agent_profile');
    //update agent_profile
    Route::post('agent/Update_profile',[AgentController::class,'agent_profile_update'])->name('update_agent_profile');
    //agent_locksheet
    Route::get('agent/agent_locksheet',[AgentController::class,'agent_locksheet'])->name('agent.agent_locksheet');
    Route::get('agent/view_locksheet/{id}',[AgentController::class,'agent_view_locksheet'])->name('agent.view_locksheet');
});

//---USER-CONTROLLER---START------
Route::middleware(['auth','role:user'])->group(function(){
  Route::get('user/logout',[Usercontroller::class,'UserLogout'])->name('user.logout');
});
Route::controller(UserController::class)->group(function(){
  Route::get('/','userHome')->name('user.home');
  Route::post('user/inquiry',"User_inquiry")->name('user.inquiry');
});
Route::view('user/raiting','userUi.raiting');

Route::view('locksheet','myPDF');

//----services--page---
Route::get('user/services',[ServiceController::class,'get_services'])->name('user.services');
Route::get('user/about',[ServiceController::class,'get_About'])->name('user.about');
// Route::view('register2','userUi/userRegister');
//---END--USER--CONTROLLER---------

//language route
// Route::middleware('SetLang')->group(function(){
//     Route::get('user/userlogin',[UserLoginController::class,'UserLogin'])->name('user.userlogin');
//     Route::get('setlang/{lang}',function($lang){
//         Session::put('lang',$lang);
//         return redirect('user/userlogin');
//     });
// });


Route::get('sms/',[SmsController::class,'sendSmsToUser']);


