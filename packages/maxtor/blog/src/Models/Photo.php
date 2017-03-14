<?php

namespace MaxTor\Blog\Models;

use Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Photo extends Model
{
    protected $table = 'posts_photos';

    protected $baseDir = 'images/posts';

    protected $fillable = [
        'filename',
        'path',
        'original_name'
    ];

    public function posts()
    {
        return $this->belongsTo('MaxTor\Blog\Models\Post');
    }

    public function getThumbnail()
    {
        return $this->path . '/' . $this->thumbnail_filename;
    }

    /**
     *
     * (new static) === $photo = new static;
     * @param string $filename
     * @return mixed
     */
    public static function named($filename)
    {
        return (new static)->saveAs($filename);
    }

    protected function saveAs($file)
    {
        $this->filename         = md5(time()) . '.' .$file->getClientOriginalExtension();
        $this->path             = $this->baseDir;
        $this->thumbnail_filename   = 'tn-' . $this->filename;
        $this->original_name    = $file->getClientOriginalName();

        return $this;
    }

    public function move(UploadedFile $file)
    {
        $file->move($this->baseDir, $this->filename);
        $this->makeThumbnail();

        return $this;
    }

    protected function makeThumbnail()
    {
        Image::make($this->path . '/' . $this->filename)
            ->resize(900, 330)
            ->save($this->path . '/' . $this->thumbnail_filename);
    }
}
