<?php

namespace App;

use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Listing extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('bathrooms')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            });
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10);

        $this->addMediaConversion('old')
              ->greyscale();
    }
}
