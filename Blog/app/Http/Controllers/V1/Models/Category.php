<?php

namespace App\Http\Controllers\V1\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    // Relationship: one category has many posts
        public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
?>