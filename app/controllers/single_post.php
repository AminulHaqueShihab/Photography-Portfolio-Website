<?php

Class Single_post extends Controller 
{
	function index($link = '')
	{
		
		if($link == "")
		{

			$data['page_title'] = "Image not found";
			$this->view("minima/not_found",$data);
		}else{

			$posts = $this->loadModel("posts");
			$result = $posts->get_one($link);

			$data['post'] = $result;
			$data['view'] = $posts->views_increment($link);
			$user_comments = $posts->get_comments($link);
			$data['comments'] = $user_comments;

			$user = $this->loadModel("user");
			$id = $user->get_user_id();
			$data['user'] = $user->get_username($id);
			
			if(isset($_POST['name']) && isset($_POST['comment']))
			{
				$user = $this->loadModel("user");
		
				if(!$result = $user->verify_login())
				{
					header("Location:". ROOT . "login");
					die;
				}else{
					$posts->user_comment($_POST, $link);
					$data['page_title'] = "Single Post";
					$this->view("pages/single_post",$data);
				}
			}
			// $data['like'] = $posts->like_increment($link);

			// if(isset($_POST['like']))
			// {
			// 	$data['like'] = $posts->like_increment($link);
			// 	// $data['like_count'] = $like_count;
			// 	$this->view("pages/single_post",$data);
			// }
			// $like_count = $like['like_count'];
			// $data['like_count'] = $like;
			
			
			$data['page_title'] = "Single Post";
			$this->view("pages/single_post",$data);
		}
		
		// if(isset($_POST['like']))
		// {
		// 	$posts = $this->loadModel("posts");
		// 	$data['like'] = $posts->like_increment($link);
		// 	// $data['like_count'] = $like_count;
		// 	$this->view("pages/single_post",$data);
		// }

	}
	// function comment()
	// {
		
	// 	$user = $this->loadModel("user");
		
	// 	if(!$result = $user->verify_login())
	// 	{
	// 		header("Location:". ROOT . "login");
	// 		die;
	// 	}
    //     // if($link == "")
	// 	// {

	// 	// 	$data['page_title'] = "Image not found";
	// 	// 	$this->view("minima/not_found",$data);
	// 	// }else
	// 	if(isset($_POST['name']) && isset($_POST['comment']))
	// 	{
	// 		// show($_POST);
	// 		$commenter = $this->loadModel("posts");
	// 		$commenter->user_comment($_POST);
	// 	}
		
	// 	$data['page_title'] = "Comment";
	// 	$this->view("pages/single_post",$data);
	// }
	
}