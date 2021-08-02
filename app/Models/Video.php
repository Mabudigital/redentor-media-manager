<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'program',
        'event',
        'artist',
        'date',
        'url',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function setUrlAttribute($value)
    {
        $attribute_name = "url";
        $disk = "uploads";
        $destination_path = "videos";
        $name = $this->title;

        $this->uploadFileToDisk($value, $attribute_name, $name, $disk, $destination_path);

    // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }


    public function videoPlayer(){
        return '<video width="320" height="240" controls>
        <source src="'.url("/uploads/{$this->url}").'" type="video/mp4">
      Your browser does not support the video tag.
      </video>';
    }
}
