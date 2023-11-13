<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post_model extends Model{
    use HasFactory;

    protected $tbl_c = 'category';
    protected $tbl_p = 'post';

    public function getCategory(){

        $query = DB::table($this->tbl_c)->get();
        return $query;

    }

    public function getPost(){

        $query = DB::table($this->tbl_p)
                ->join($this->tbl_c, $this->tbl_p.'.category', '=' , $this->tbl_c.'.categoryID')
                ->get();
        return $query;

    }

    public function savePost($category,$content){

        $data = [
            'category' => $category,
            'post' => $content
        ];
        if(DB::table($this->tbl_p)->insert($data)){
            return true;
        }
        return false;
        
    }

    public function updatePost($category,$content,$pID){
        $data = [
            'category' => $category,
            'post' => $content
        ];
        if(DB::table($this->tbl_p)->where('postID', $pID)->update($data)){
            return true;
        }
        return false;
    }
    
    public function deletePost($pID){

        if(DB::table($this->tbl_p)->where('postID', $pID)->delete()){
            return true;
        }
        return false;

    }

}
