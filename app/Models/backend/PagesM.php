<?php

namespace App\Models\backend;

use App\Models\KategoriM;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagesM extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $table = 'pages';
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function sluggable(): array
    {
        return [
            'pages_slug' => [
                'source' => 'pages_title'
            ]
        ];
    }
    
    public function postingan()
    {
        return $this->hasOne(KategoriM::class, 'id', 'pages_category_id');
    }
}
