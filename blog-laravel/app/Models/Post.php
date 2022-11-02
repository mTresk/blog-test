<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['title', 'image', 'slug', 'user_id', 'content', 'category_id'];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('cropped')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued()
            ->nonOptimized();
        $this->addMediaConversion('big')
            ->fit(Manipulations::FIT_CROP, 700, 700)
            ->nonQueued()
            ->nonOptimized();
        $this->addMediaConversion('cropped_webp')
            ->format('webp')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued()
            ->nonOptimized();
        $this->addMediaConversion('big_webp')
            ->format('webp')
            ->fit(Manipulations::FIT_CROP, 700, 700)
            ->nonQueued()
            ->nonOptimized();
    }

    public function getImageAttribute()
    {
        $image = $this->getMedia('postImages')->last();
        if ($image) {
            $image->url = $image->getUrl();
            $image->cropped = $image->getUrl('cropped');
            $image->big = $image->getUrl('big');
            $image->cropped_webp = $image->getUrl('cropped_webp');
            $image->big_webp = $image->getUrl('big_webp');
        }

        return $image;
    }
}
