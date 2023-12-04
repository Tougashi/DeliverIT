<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle',
        'weight',
        'size'
    ];
    protected $table = 'services';
    // Service.php (Model Service)
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'serviceId')->count();
    }

}
