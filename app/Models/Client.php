<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'familyasi',
        'ismi',
        'yili',
        'phone',
        'address',
        'comment',
    ];
    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
    public function muolajas(){
        return $this->hasMany(Muolaja::class);
    }

    public function aptekas(){
        return $this->hasMany(apteka::class);
    }

    public function sklad(){
        return $this->hasMany(sklad::class);
    }

}
