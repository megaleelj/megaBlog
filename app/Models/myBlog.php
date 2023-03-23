<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myBlog extends Model
{
    use HasFactory;
    protected $table = 'blogs';

    public $primaryKey ='id';

    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
