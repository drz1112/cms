<?php

namespace App\Models\backend;

use App\Models\KategoriM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingLayoutM extends Model
{
    use HasFactory;
    protected $table = 'setting_layout';
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function child_kategori_1_1()
    {
        return $this->hasOne(KategoriM::class, 'id','link_footer_1_1');
    }
    public function child_kategori_1_2()
    {
        return $this->hasOne(KategoriM::class, 'id','link_footer_1_2');
    }
    public function child_kategori_1_3()
    {
        return $this->hasOne(KategoriM::class, 'id','link_footer_1_3');
    }
    public function child_kategori_1_4()
    {
        return $this->hasOne(KategoriM::class, 'id','link_footer_1_4');
    }
    public function child_kategori_2_1()
    {
        return $this->hasOne(KategoriM::class, 'id','link_footer_2_1');
    }
    public function child_kategori_2_2()
    {
        return $this->hasOne(KategoriM::class, 'id','link_footer_2_2');
    }
    public function child_kategori_2_3()
    {
        return $this->hasOne(KategoriM::class, 'id','link_footer_2_3');
    }
    public function child_kategori_2_4()
    {
        return $this->hasOne(KategoriM::class, 'id','link_footer_2_4');
    }
}
