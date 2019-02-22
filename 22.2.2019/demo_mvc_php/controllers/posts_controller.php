<?php
require_once('controllers/base_controller.php');
require_once('models/post.php');

class PostsController extends BaseController{
 	function __construct(){
   		$this->folder = 'posts';
 	}

 	public function index(){
	   $posts = Post::all();
	   $data = array('posts' => $posts);
	   $this->render('index', $data);
 	}
 	public function show(){
 		$post = Post::find($_GET['id']);
 		$data = array('posts'=>$post) ;
 		$this->render('show',$data);
 	}
}
?>