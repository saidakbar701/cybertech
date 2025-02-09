<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','body','image','category_id','view','ads'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
    return $this->belongsToMany(Tag::class);
    }
}
