<?php

namespace App\Models\backend;

use App\Models\KategoriM;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostsM extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $table = 'post';
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function sluggable(): array
    {
        return [
            'post_slug' => [
                'source' => 'post_title'
            ]
        ];
    }
    public function postingan()
    {
        return $this->belongsTo(KategoriM::class, 'post_category_id', 'id');
    }
    public function postauthor()
    {
        return $this->belongsTo(User::class, 'post_author', 'id');
    }
}
