<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
      protected $table = "inquirys";
      protected $fillable =[
        "inquiry",
        "email",
        "phone"
      ];
}
