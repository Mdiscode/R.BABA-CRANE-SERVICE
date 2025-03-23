<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected $table = "contactus";
    protected $fillable =[
        'name',
        'phoneNumber',
        'email',
        'company',
        'craneType'
    ];

    //get the contact data
    static public function getContact(){
        $return = self::select('contactus.*')
        ->orderBy('id','asc');
        $return = $return->paginate(8);
        return $return;
    }
}
