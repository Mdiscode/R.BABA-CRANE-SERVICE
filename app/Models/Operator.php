<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table ="operators";
    protected $fillable =[
        "name",
        "address",
        "phone",
        "gaadino",
        "aadharno",
        "image",
        "license"
    ];

    //get Operator data
    static public function getOperator(){
        $return = self::select('operators.*')
        ->orderBy('created_at','desc');
        $return = $return->paginate(5);
        return $return;
    }
}
