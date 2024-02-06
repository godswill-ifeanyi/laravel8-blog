<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    protected $fillable = ['title','slug','description','image_path','user_id'];
    
    use HasFactory;
    use Sluggable;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function sluggable() : array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
