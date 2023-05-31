<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'satuan_id', 'price'
    ];

    public function satuan(){
        return $this->belongsTo('App\Models\Satuan', 'satuan_id');
    }

}
