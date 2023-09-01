<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuMoi extends Model
{
    use HasFactory;
    protected $table = "tu_moi";
    protected $fillable = ["name", "phien_am","audio","tu_loai","vi_du","image","che_tu","cau_truc_cau","chu_de_id", "status"];
}
