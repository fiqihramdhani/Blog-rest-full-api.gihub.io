<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Posts()
    {
        return $this->hasMany(Posting::class);
    }

    public function POST()
    {
        return $this->hasMany(Home::class);
    }

    public function About()
    {
        return $this->hasMany(About::class);
    }
}
