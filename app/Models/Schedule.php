<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        //'student_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruangan',
        'kode_absensi',
        'tahun_akademik',
        'semester',
        'created_by',
        'updated_by',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
