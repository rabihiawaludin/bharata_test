<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    

    protected $fillable = [
        'nama',
        'kode',
        'stok',
        'lokasi_rak',
    ];


    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
