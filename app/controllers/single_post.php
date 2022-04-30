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
			$id = $user->get_auth($link);
			$data['user'] = $user->get_username($id);

			if(isset($_POST['name']) && isset($_POST['comment']))
			{
		
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

			$data['page_title'] = "Single Post";
			$this->view("pages/single_post",$data);
		}
		


	}

}