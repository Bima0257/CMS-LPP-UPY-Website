<?php

namespace App\Models;

use App\Traits\Searchable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Documents extends Model
{
    use HasFactory, Sluggable;
    use Searchable;

    protected $guarded = ['id'];

    protected string $searchBody = 'description';

    public function category(): BelongsTo
    {
        return $this->belongsTo(DocumentCategories::class, 'category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ],
        ];
    }

    public function getFormattedSizeAttribute()
    {
        $size = $this->file_size;

        if ($size >= 1048576) { // >= 1MB
            return round($size / 1048576, 2).' MB';
        } elseif ($size >= 1024) {
            return round($size / 1024, 2).' KB';
        } else {
            return $size.' B';
        }
    }
}
