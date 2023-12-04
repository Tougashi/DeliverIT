<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'orderCode',
        'items',
        'weight',
        'distance',
        'cost',
        'serviceId',
        // Tambahkan kolom lain yang dapat diisi secara massal sesuai kebutuhan.
    ];
    protected $table = 'transactions'; 
    // Transaction.php (Model Transaction)
    public function service()
    {
        return $this->belongsTo(Service::class, 'serviceId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
  
    protected static function boot()
    {
        parent::boot();

        // Menggunakan event "creating" untuk mengisi orderCode saat menyimpan transaksi baru
        static::creating(function ($transaction) {
            // Generate orderCode dengan format "PCKP" + huruf dan nomor acak
            $orderCode = 'PCKP' . strtoupper(Str::random(mt_rand(4, 8)));

            // Mengisi orderCode ke dalam transaksi
            $transaction->orderCode = $orderCode;
        });
    }
}
 