<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Topic extends Model
{
    use Searchable;

    protected $fillable = ['name', 'img_url', 'describe'];

    public function searchableAs()
    {
        return 'topics_index';
    }
}
