<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = "about";

    protected $fillable =[
        "sphoto",
        "owphoto",
        "ow_name",
        "ad_photo",
        "ad_name",
        "heading",
        "about",
        "instaid",
        "facebookid"
    ];
}
