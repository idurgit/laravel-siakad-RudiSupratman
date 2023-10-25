<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiMatkul extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'student_id',
        'kode_absensi',
        'tahun_akademik',
        'semester',
        'pertemuan',
        'status',
        'keterangan',
        'latitude',
        'longitude',
        'nilai',
        'created_by',
        'updated_by',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
