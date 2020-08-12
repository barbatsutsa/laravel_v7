<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    public function getAll(): array
    {
        return \DB::select("select id, title, description from categories");
    }

    public function getById(int $id)
    {
        return \DB::selectOne("select id, title, description from categories where id = :id",
            ['id' => $id]);
    }
}
