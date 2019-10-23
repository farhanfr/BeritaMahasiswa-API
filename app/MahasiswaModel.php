<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    protected $table='mahasiswa';
    protected $primaryKey='mahasiswa_id';
    protected $fillable=['mahasiswa_name','mahasiswa_nim','mahasiswa_class','mahasiswa_born','mahasiswa_password','mahasiswa_token'];
    public $timestamps=FALSE;
}
