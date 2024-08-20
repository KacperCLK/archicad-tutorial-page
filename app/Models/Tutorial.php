<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'name', 'description', 'chapter_id'];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function hints()
    {
        return $this->belongsToMany(Tutorial::class, 'hints', 'tutorial_id', 'hint_id');
    }
}
