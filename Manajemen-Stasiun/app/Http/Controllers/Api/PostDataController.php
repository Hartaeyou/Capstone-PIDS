<?php

namespace App\Http\Controllers\Api;
use App\Models\Point;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostDataResource;


    /**
     * index
     *
     * @return void
     */
class PostDataController extends Controller
{
    public function index ()
    {
        // gett all posts
        $posts = Point::orderBy('order')->paginate(5);
        //return collection of posts as a resource
    
        return new PostDataResource(true, 'List Data Point', $posts);
    }
}
