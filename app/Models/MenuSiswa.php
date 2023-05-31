<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSiswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_menu';

    protected $guarded = [''];

    public $timestamps = false;
}
