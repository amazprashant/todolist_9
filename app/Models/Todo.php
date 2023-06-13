<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'list';
    public static function getTodo()
    {
        //return self::all();
        /* return self::join('category', 'category.id', '=', 'todo.category_id')
        ->select('todo.name', 'category.id','category.name AS category_name','category.created_at')
        ->get(); */
    }
}
