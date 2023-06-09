<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $primaryKey = 'id_kelas';

    public $timestamps = false;

    public function tingkat_kelas()
    {
        return $this->belongsTo(Tingkat::class, 'id_tingkat', 'id_tingkat');
    }
}
