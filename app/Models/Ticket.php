<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'kd_tickets', 'name', 'email', 'status', 'concert_id',
    ];

    public function concert(){
        return $this->belongsTo('App\Models\Concert', 'concert_id');
    }

}
