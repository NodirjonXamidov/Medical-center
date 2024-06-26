<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apteka extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'count',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
