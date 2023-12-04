<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Finance extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId', 'balance'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
