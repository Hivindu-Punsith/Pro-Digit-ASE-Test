<?php

namespace domain\Services;

use App\Models\BlogPost;

class BlogPostService
{
    protected $blogPost;

    public function __construct()
    {
        $this->blogPost = new BlogPost();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->blogPost->all();
    }

    public function activeAll()
    {
        return $this->blogPost->where('is_active', 1)->get();
    }

    /**
     * get
     *
     * @param  mixed $product_id
     * @return void
     */
    public function get($id)
    {
        return $this->blogPost->find($id);
    }

    public function store($data)
    {
        
        $this->blogPost->create([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);
    }

    public function update($id, $data)
    {
        $this->get($id)->update($data);
    }

    public function destroy($id)
    {
        $this->get($id)->delete();
    }

    public function updateBlogPostStatus($data)
    {
        $blogPost = $this->get($data['id']);

        if ($blogPost) {
            $blogPost->is_active = $data['status'];
            $blogPost->save();
        }
    }
}
