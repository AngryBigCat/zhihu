<?php

namespace App\Http\Controllers;

use App\Tag;

class SearchController extends Controller
{
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
