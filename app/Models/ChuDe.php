<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuDe extends Model
{
    use HasFactory;
    protected $table = 'chu_de';
    protected $fillable = ["ID","CHU_DE_NAME","IMAGE","SO_NGUOI_THEO_HOC","TONG_SO_TU","CATEGORY_ID","STATUS"];
    //Joint 1 - 1
    public function cat()
    {
        return $this->hasOne(Category::class,'ID','CATEGORY_ID');
    }
    public function totalTuMoi()
    {
        return $this->hasOne(TuMoi::class,'CHU_DE_ID','ID');
    }
}
