<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComposeEmail extends Model
{
    protected $table="compose_emails";
    
    static public function getEmail(){
        $return = self::select('compose_emails.*')
        ->orderBy('id','desc');
        $return = $return->paginate(6);
        return $return;
    }
}
