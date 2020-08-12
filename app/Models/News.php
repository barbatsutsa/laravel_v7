<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    public function getAll(): array
    {
        return \DB::table($this->table)->select('id', 'title', 'description')->orderBy('slug', 'desc')->get()->toArray();
    }

    public function getById(int $id)
    {
        return \DB::table($this->table)->find($id);
    }
}
