<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;

    public $fillable = ['preview_path', 'detail_path'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
