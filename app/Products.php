<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $fillable = [
        'category','line','sku','ean','price','stock','title','desc',
        'i_1','i_2','i_3','i_4','i_5','generic_keyword','platinum_keyword','id_status'
    ];

    public function status()
    {
        return $this->belongsTo('App\Status', 'id_status');        
    }
}
