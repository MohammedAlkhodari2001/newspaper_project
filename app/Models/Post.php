<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to the Category model
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    // Define the relationship to the Tag model
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
    
}
