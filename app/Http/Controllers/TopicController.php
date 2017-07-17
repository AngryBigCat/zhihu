<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Topic;
use DB;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::all();
        return view('home.topic.index', compact('topics'));
    }

    public function show($id)
    {
        return view('home.topic.show');
    }

    public function search($keyword = '')
    {
        if (empty($keyword)) {
            return [];
        }
        $result = Topic::search($keyword)->get();
        if ($result->isEmpty()) {
            return [];
        }
        return $result;
    }
}
