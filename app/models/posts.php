<?php 

Class Posts 
{

	function get_all()
	{

		$page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$page_number = $page_number < 1 ? 1 : $page_number;

		$limit = 10;
		$offset = ($page_number - 1) * $limit;

		$query = "select * from images order by view_count desc limit $limit offset $offset";

		$DB = new Database();
		$data = $DB->read($query);
		if(is_array($data))
		{

			return $data;
		}

		return false;
	}

	function get_one($link)
	{

		$query = "select * from images where url_address = :link limit 1";
		$arr['link'] = $link;

		$DB = new Database();
		$data = $DB->read($query,$arr);
		if(is_array($data))
		{

			return $data[0];
		}

		return false;
	}

	function views_increment($link)
	{

		$query = "update images set view_count = view_count + 1 where url_address = :link";
		$arr['link'] = $link;

		$DB = new Database();
		$data = $DB->update($query,$arr);
		if(is_array($data))
		{

			return $data[0];
		}

		return false;
	}

	function user_comment($POST,$url)
	{
		$DB = new Database();
		$_SESSION['error'] = ""; 

		if(isset($POST['name']) && isset($POST['comment']))
		{

			if($_SESSION['error'] == "")
			{

				//save to db
				$arr['comment_auth'] = $POST['name'];
				$arr['comment_text'] = $POST['comment'];
				$arr['comment_img_link'] = $url;
				$arr['comment_date'] = date("Y-m-d H:i:s");

				$query = "insert into comments (comment_auth,comment_text,comment_img_link,comment_date) values (:comment_auth, :comment_text, :comment_img_link, :comment_date)";
				$data = $DB->write($query,$arr);
				if($data)
				{
					
					// header("Location:". ROOT . "post");
					header("Location:". ROOT . 'single_post/' .$url);
					die;
				}
			}

		
		}
	}

	function get_comments($link)
	{
		$arr['link'] = $link;
		$query = "select * from comments where comment_img_link = :link order by comment_date desc";
		

		$DB = new Database();
		$data = $DB->read($query,$arr);
		if(is_array($data))
		{

			return $data;
		}

		return false;
	}

	function get_all_user_image($id)
	{

		$page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$page_number = $page_number < 1 ? 1 : $page_number;

		$limit = 10;
		$offset = ($page_number - 1) * $limit;
		$arr['id'] = $id;
		$query = "select * from images where user_id = :id order by view_count desc limit $limit offset $offset";

		$DB = new Database();
		$data = $DB->read($query,$arr);
		if(is_array($data))
		{
			// show($data);
			return $data;
		}

		return false;
	}

}