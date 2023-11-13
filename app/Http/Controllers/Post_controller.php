<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post_model;

class Post_controller extends Controller{


    protected $post_model;
    protected $req;

    public function __construct(){

        $this->post_model = new Post_model();
        $this->req = new Request();
    }

    public function viewPost(){

        $data['post'] = $this->post_model->getPost();
        $data['category'] = $this->post_model->getCategory();
        
        echo view('includes/header');
        echo view('test/post', $data);
        echo view('includes/footer');

    }


    public function addPost(){

        $data['category'] = $this->post_model->getCategory();

        echo view('includes/header');
        echo view('test/addpost', $data);
        echo view('includes/footer');

    }


    public function savePost(Request $req){

        $category = $req->input('category');
        $content = $req->input('content');

        $res = $this->post_model->savePost($category,$content);
        if($res){
            return redirect('/post/add');
        }

    }


    public function updatePost(Request $req,$pID){

        $category = $req->input('category');
        $content = $req->input('content');
        $res = $this->post_model->updatePost($category,$content,$pID);
        if($res){
            return redirect('/post/view');
        }

    }


    public function deletePost($pID){

        $res = $this->post_model->deletePost($pID);
        if($res){
            return redirect('/post/view');
        }

    }


    


    

}
