<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class invoices extends Model
{
    use SoftDeletes;

    protected $guarded=[];

    public function sections(){
        return $this->belongsTo(sections::class,'section_id');
        // return $this->belongsTo('App\sections');

    }
}