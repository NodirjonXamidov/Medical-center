<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'muolaja_id',
        'count',
        'price',
    ];
    public function transactions(){
        return $this->belongsTo(Client::class);
    }
    // public function transaction(){
    //     return $this->hasMany(Client::class);
    // }
}
