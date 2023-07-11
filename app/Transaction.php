<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function medicines()
    {
        return $this->belongsToMany('App\Medicine','medicine_transactions','transaction_id','medicine_id')->withPivot('quantity','price', 'subtotal');
    }

    public function insertProduct($cart, $user)
    {
        $total = 0;
        foreach($cart as $id => $detail)
        {
            $total += $detail['price'] * $detail['quantity'];
            // insert ke junction table menggunakan attach
            $this->medicines()->attach($id, ['quantity' => $detail['quantity'],
                                            'price' => $detail['price'],
                                            'subtotal' => $detail['price'] * $detail['quantity']]);
        }
        return $total;
    }
}
