<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $primaryKey = "id";

    protected $fillable = ['img', 'title', 'slug', 'description'];
    //protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

}
