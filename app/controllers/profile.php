<?php

Class Profile extends Controller
{
	function index()
	{
		
		$data['page_title'] = "Profile";
		$user = $this->loadModel("user");
		$user_info = $user->get_user_info();
		$data['user'] = $user_info;
		$id = $user->get_user_id();
		$posts = $this->loadModel("posts");
		$result = $posts->get_all_user_image($id);


		$pagination = $this->loadModel("pagination");
		$data['prev_page'] = $pagination->generate_link($pagination->current_page_number() - 1);
		$data['next_page'] = $pagination->generate_link($pagination->current_page_number() + 1);


		$data['posts'] = $result;
		$image_class = $this->loadModel("image_class");

		if(is_array($data['posts']))
		{
			foreach ($data['posts'] as $key => $value) {
				# code...
				$data['posts'][$key]->image = $image_class->get_thumbnail($data['posts'][$key]->image);
			}
		}
		$this->view("pages/profile",$data);
	}

}