<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myBlog extends Model
{
    use HasFactory;
    protected $table = 'my_blogs';
    protected $fillable = [
        'title',
        'content',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }


}
