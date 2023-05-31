<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'kd_transactions', 'product_id', 'qty', 'total'
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    
}
