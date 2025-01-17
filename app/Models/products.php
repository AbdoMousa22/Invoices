<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable=[
        "product_name",
        'description',
        "section_id",
    ];
    // protected $guarded=[];

    public function sections(){
        return $this->belongsTo(sections::class,'section_id');
        // return $this->belongsTo('App\sections');

    }
}
