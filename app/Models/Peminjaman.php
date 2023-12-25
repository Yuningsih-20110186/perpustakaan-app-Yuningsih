<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'peminjaman_t';
    protected $fillable = [
        'id',
        'no_peminjaman',
        'books_id',
        'pengunjung_id',
        'pegawai_id',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
}
