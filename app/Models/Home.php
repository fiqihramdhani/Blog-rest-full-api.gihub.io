<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Home extends Model
{

    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = ['Category'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('Title', 'like', '%' . $search . '%')
                    ->orWhere('Judul_Posting', 'like', '%' . $search . '%')
                    ->orWhere('Body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['Category'] ?? false, function ($query, $Category) {
            return $query->wherehas('Category', function ($query) use ($Category) {
                $query->where('slug', $Category);
            });
        });

        $query->when($filters['User'] ?? false, function ($query, $User) {
            return $query->wherehas('User', function ($query) use ($User) {
                $query->where('id', $User);
            });
        });
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'Title'
            ]
        ];
    }
}
