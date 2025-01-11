<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

   protected $fillable = [
        'user_id', 'title', 'slug', 'category_id', 'tag_id',
        'short_desc', 'long_desc', 'status', 'slider_news',
        'bracking_news', 'popular_news', 'image',
    ];

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
