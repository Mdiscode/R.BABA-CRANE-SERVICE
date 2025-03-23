<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table ="companys";
    protected $fillable =[
        "companyname",
        "address",
        "gaadino",
        "email",
        "phone"
    ];

    //get the contact data
    // static public function getCardData(){
    //     $return = self::select('card_contents.*')
    //     ->orderBy('id','asc');
    //     $return = $return->paginate(8);
    //     return $return;
    // }
    static public function getCompany(){
        $return = self::select('companys.*')
        ->orderBy('created_at','desc');
        $return = $return->paginate(5);
        return $return;
    }
}
