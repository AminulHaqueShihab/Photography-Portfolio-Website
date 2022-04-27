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
			if(isset($_POST['like']))
			{
				$like_count = $posts->like_increment($link);
				$data['like_count'] = $like_count;
				$this->view("pages/single_post",$data);
			}
			// $like_count = $like['like_count'];
			// $data['like_count'] = $like;
			
			
			$data['page_title'] = "Single Post";
			$this->view("pages/single_post",$data);
		}

	}

}