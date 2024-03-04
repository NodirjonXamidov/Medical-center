<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sklad extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'apteka_id',
        'amount',
    ];

    public function sklad(){
        return $this->belongsTo(Client::class);
    }
}
