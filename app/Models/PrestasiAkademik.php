<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrestasiAkademik extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id','juara','lomba','penyelenggara','tingkat','tanggal', 'sertifikat'];

    public function siswa(): BelongsTo

    {
        return $this->belongsTo(Siswa::class);
    }
}
