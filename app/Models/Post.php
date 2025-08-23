<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'image',
        'article_images',
        'views',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'article_images' => 'array', // Automatically decode JSON to array
    ];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * Get the author name from the associated user.
     *
     * @return string
     */
    public function getAuthorAttribute()
    {
        if ($this->user) {
            return $this->user->name ?? $this->user->email ?? 'Admin';
        }
        return 'Admin';
    }

    /**
     * Get the image URL with fallback.
     *
     * @return string|null
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // If it's a full URL, return as is
            if (filter_var($this->image, FILTER_VALIDATE_URL)) {
                return $this->image;
            }
            // Otherwise, assume it's a relative path
            return asset('storage/' . $this->image);
        }
        return null;
    }

    /**
     * Get the article images URLs.
     *
     * @return array
     */
    public function getArticleImagesUrlsAttribute()
    {
        if (!$this->article_images) {
            return [];
        }

        $images = is_array($this->article_images) ? $this->article_images : json_decode($this->article_images, true);
        
        if (!is_array($images)) {
            return [];
        }

        return array_map(function ($image) {
            // If it's a full URL, return as is
            if (filter_var($image, FILTER_VALIDATE_URL)) {
                return $image;
            }
            // Otherwise, assume it's a relative path
            return asset('storage/' . $image);
        }, $images);
    }

    /**
     * Check if the post has an image.
     *
     * @return bool
     */
    public function hasImage()
    {
        return !empty($this->image);
    }

    /**
     * Check if the post has article images.
     *
     * @return bool
     */
    public function hasArticleImages()
    {
        return !empty($this->article_images) && is_array($this->article_images) && count($this->article_images) > 0;
    }

    /**
     * Get the count of article images.
     *
     * @return int
     */
    public function getArticleImagesCountAttribute()
    {
        if (!$this->article_images) {
            return 0;
        }

        $images = is_array($this->article_images) ? $this->article_images : json_decode($this->article_images, true);
        
        return is_array($images) ? count($images) : 0;
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically set user_id when creating
        static::creating(function ($post) {
            if (empty($post->user_id) && Auth::check()) {
                $post->user_id = Auth::id();
            }
        });
    }

    public function scopeMostViewed($query, $limit = 10)
    {
        return $query->orderBy('views', 'desc')->limit($limit);
    }
}