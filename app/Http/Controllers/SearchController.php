<?php

namespace App\Http\Controllers;

use App\Tag;

class SearchController extends Controller
{
    public function testInsertTopic($key)
    {
        return Tag::create([
            'pid' => 1,
            'path' => 'www',
            'tag_name' => $key,
            'description' => 'asdasdqweqweqwe',
            'img' => '/img/avatar04.png',
        ]);
    }

    public function topicSearch($keyword = '')
    {
        if (empty($keyword)) {
            return [];
        }
        $result = Tag::search($keyword)->get();
        if ($result->isEmpty()) {
            return [];
        }
        return $result;
    }
}
