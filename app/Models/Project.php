<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'detail',
        'thumbnail',
        'youtube_link',
        'github_link',
        'is_featured',
    ];
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}