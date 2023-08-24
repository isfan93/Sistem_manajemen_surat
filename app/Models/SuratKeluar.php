<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat_k';
    protected $fillable = ['judul_srt', 'asal_srt','doc','no_srt','tgl_srt'];
}
