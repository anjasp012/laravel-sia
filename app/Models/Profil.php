<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_profil';
    protected $guarded = [];
    public $timestamps = false;

    public function getLogo()
    {
        return '/storage/' . $this->logo;
    }
}
