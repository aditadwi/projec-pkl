<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almarhum extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelapor_id',
        'user_id',
        'namaalmarhum',
        'tempat_tanggal_lahir',
        'tempat_tanggal_meninggal',
        'nama_tempat_pemakaman',
        'nik',
        'nama_keluarga',
        'nohp_keluarga',
    ];

    public function pelapor()
{
    return $this->belongsTo(Pelapor::class, 'pelapor_id'); // Sesuaikan foreign key
}

}