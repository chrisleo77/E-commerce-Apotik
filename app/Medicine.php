<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    // use SoftDeletes;
    public $timestamps = false;
    // bisa melihat kategori yang sesuai dengan kolom category_id
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function transactions()
    {
        return $this->belongsToMany('App\Transaction','medicine_transactions','medicine_id','transaction_id')
        ->withPivot('quantity','price');
    }
}
