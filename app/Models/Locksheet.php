<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locksheet extends Model
{
    protected $table = "locksheets";
    protected $fillable =[
        "name",
        "slipNo",
        "date",
        "inTime",
        "outTime",
        "totalTime",
        "workdetail",
        "companyname",
        "gaadino"
    ];
    //get the  locksheet data
    static public function getLocksheet(){
        $return = self::select('locksheets.*')
        ->orderBy('created_at','desc');
        $return = $return->paginate(5);
        return $return;
    }
}
