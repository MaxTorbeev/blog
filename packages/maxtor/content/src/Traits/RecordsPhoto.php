<?php

namespace MaxTor\Content\Traits;

use MaxTor\Content\Models\Photo;

trait RecordsPhoto
{
    protected static function bootRecordsPhoto()
    {
        // @todo override this
    }

    public function activity()
    {
        return $this->morphMany(Photo::class, 'subject');
    }
}