<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuDe extends Model
{
    use HasFactory;
    protected $table = 'chu_de';
    protected $fillable = ["id","chu_de_name","image","so_nguoi_theo_hoc","tong_so_tu","category_id"];
    //Joint 1 - 1
    public function cat()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function totalTuMoi()
    {
        return $this->hasOne(TuMoi::class,'chu_de_id','id');
    }
}
