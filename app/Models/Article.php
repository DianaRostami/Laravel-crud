<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import this for the return type hint
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Article extends Model
{
    use HasFactory;

    protected $fillable = ['writer_name', 'article_title']; // Allow mass assignment

    /**
     * Get the user that owns the article.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * The categories that belong to the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id');
    }
}
