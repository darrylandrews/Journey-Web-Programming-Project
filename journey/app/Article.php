<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function category()
    {   
        // has one category
        return $this->belongsTo(Category::class);
    }

    public function user()
    {   
        // belongs to user
        return $this->belongsTo(User::class);
    }
}
