<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuMoi extends Model
{
    use HasFactory;
    protected $table = "tu_moi";
    protected $fillable = ["TU_MOI_NAME, PHIEN_AM","AUDIO","TU_LOAI","VI_DU","IMAGE","CHE_TU","CAU_TRUC_CAU","CHU_DE_ID","STATUS"];
}
