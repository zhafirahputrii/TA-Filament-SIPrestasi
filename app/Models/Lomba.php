<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lomba extends Model
{
    use HasFactory;
    protected $fillable = ['siswa_id','nisn','kelas','lomba','penyelenggara','tingkat','tanggal', 'status'];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }
}
