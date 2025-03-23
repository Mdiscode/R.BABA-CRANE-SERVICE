<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardContent extends Model
{
    /** @use HasFactory<\Database\Factories\CardContentFactory> */
    use HasFactory;
    // $cardContent= CardContentFactory::factory()->count(10)->create();
    protected $table="card_contents";
    protected $fillable =[
        'title',
        'description',
        'location',
        'address',
        'image',
        'phoneNo'
    ];

    //get the contact data
    static public function getCardData(){
        $return = self::select('card_contents.*')
        ->orderBy('id','asc');
        $return = $return->paginate(8);
        return $return;
    }
}
