<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    //
    protected $fillable = [
        'caseID', 'state', 'ean','ipxs', 'product', 'details', 'annotation','user'
    ];
}
