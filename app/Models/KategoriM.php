<?php

namespace App\Models;

use App\Models\backend\PagesM;
use App\Models\backend\PostsM;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriM extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $table = 'kategori';
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'namaKate'
            ]
        ];
    }
    public function children()
    {
        return $this->hasMany(KategoriM::class, 'parentid');
    }

    public function parents()
    {
        return $this->belongsTo(KategoriM::class, 'parentid');
  
    }
    public function postingans()
    {
        return $this->hasMany(PostsM::class, 'post_category_id','id');
    }

    public function Pages()
    {
        return $this->hasOne(PagesM::class, 'pages_category_id','id');
    }
}
