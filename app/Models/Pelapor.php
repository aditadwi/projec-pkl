<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelapor extends Model
{
    use HasFactory;

    protected $fillable = [
        'namapelapor',
        'tanggal_pelaporan',
        'nohp',
        'nik',
        'alamat',
        'namasaksi1',
        'namasaksi2',
        'niksaksi1',
        'niksaksi2',
    ];

    public function almarhum()
{
    return $this->hasMany(Almarhum::class, 'pelapor_id'); 
}

}