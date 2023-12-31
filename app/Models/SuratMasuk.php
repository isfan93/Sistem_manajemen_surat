<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratMasuk extends Model
{
    use SoftDeletes;

    protected $table = 'surat_m';
    protected $fillable = ['judul_srt', 'asal_srt','doc','no_srt','tgl_srt'];
    protected $dates = ['deleted_at'];
}
