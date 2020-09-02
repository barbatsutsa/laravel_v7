<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resourse extends Model
{
    protected $table = "resourses";
    protected $primaryKey = "id";

    protected $fillable = ['title', 'url'];

    public function news()
    {
        return $this->belongsToMany(News::class, 'sources_has_news',
            'sourses_id', 'news_id');
    }


}
