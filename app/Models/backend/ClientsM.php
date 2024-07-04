<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientsM extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'clients';
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
