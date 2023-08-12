<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'images',
        'post_id'
    ];
    public function posts(){
        return $this->belongsTo(post::class);
    }
}
