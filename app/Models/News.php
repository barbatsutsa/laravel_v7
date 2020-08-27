<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $table = "news";
    protected $primaryKey = "id";

    protected $fillable = ['img', 'title', 'slug', 'description', 'link', 'pub_date'];
    //protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function loadNews(array $data)
    {

        $news = self::where('title', $data['title'])->first();
        if(!$news) {
            $news =  self::create([
                'link'    => $data['link'],
                'title'   => $data['title'],
                'slug' => Str::slug($data['title'], "-"),
                'description'   => $data['description'],
                'pub_date'   => $data['pubDate'],
            ]);
            if($news) {
                return $news;
            }
        }
        return false;
    }

}
