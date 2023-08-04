<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'surat_m';
    protected $fillable = ['judul_srt', 'asal_srt','no_srt','tgl_srt'];
}
