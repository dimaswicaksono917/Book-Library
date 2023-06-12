<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $table ="books";
    protected $fillable = [
        'isbn',
        'title',
        'author',
        'desc',
        'category',
        'image',
    ];
    use HasFactory;

    /**
     * The roles that belong to the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function Categories(): BelongsToMany
    // {
    //     return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    // }
}

