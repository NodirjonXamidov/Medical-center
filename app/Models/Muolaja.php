<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muolaja extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        // 'count',    
        'price',
        
    ];
    public function getMuolajaInfoAttribute()
{
    return $this->attributes['name'] . ' - ' . $this->attributes['count'];
}
    public function client(){
        return $this->belongsTo(Client::class,'clients','id');
    }
    
}
