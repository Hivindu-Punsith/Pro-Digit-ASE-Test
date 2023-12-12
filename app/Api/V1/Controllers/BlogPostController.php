<?php

namespace App\Api\V1\Controllers;

use Throwable;
use domain\Facades\BlogPostFacade;
use App\Http\Responses\ApiResponse;
use App\Http\Controllers\Controller;

class BlogPostController extends Controller
{
    public function getBlockPosts()
    {
        try {
            $posts = BlogPostFacade::activeAllPaginate();
            return ApiResponse::success($posts);
        } catch (Throwable $th) {
            throw $th;
            return ApiResponse::exception();
        }
    }

    public function getBlockPostsById($id)
    {
        try {

            $posts = BlogPostFacade::get($id);

            return ApiResponse::success($posts);
        } catch (Throwable $th) {
            throw $th;
            return ApiResponse::exception();
        }
    }
}
