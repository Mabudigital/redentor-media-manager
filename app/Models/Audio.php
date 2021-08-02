<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
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
        $destination_path = "audios";
        $name = $this->title;

        $this->uploadFileToDisk($value, $attribute_name, $name, $disk, $destination_path);

    // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }


    public function audioPlayer(){
        return '<audio controls>
        <source src="'.url("/uploads/{$this->url}").'" type="audio/mp3">
      Your browser does not support the audio tag.
      </audio>';
    }
}
