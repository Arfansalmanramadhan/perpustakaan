<?php

namespace App\Models;

use App\Models\Catagory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        "book_code",
        "title",
        "slug",
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    /**
     * The Categoriyes that belong to the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Categoriyes(): BelongsToMany
    {
        return $this->belongsToMany(Catagory::class, 'books_catagory','book_id','catagory_id');
    }
}
