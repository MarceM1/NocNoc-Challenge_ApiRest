<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable= [
        "title",
        "description",
        "status",
        "due_date",
        "assigned_user_id",
        "user_id"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function file()
    {
        return $this->hasMany(File::class);
    }
}
