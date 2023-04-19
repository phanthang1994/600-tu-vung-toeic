<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "category";
    protected $fillable = ['CATEGORY_NAME',"IMAGE","TRANG_THAI"];
    public function totalChuDe()
    {
        return $this->hasOne(ChuDe::class,'CATEGORY_ID','ID');
    }

}
