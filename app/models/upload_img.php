<?php

Class Upload_img
{

	function upload($POST,$FILES,$id)
	{
		$DB = new Database();
		$_SESSION['error'] = ""; 

		$allowed[] = "image/jpeg";
		$allowed[] = "image/png";
		if(isset($POST['title']) && isset($FILES['file']))
		{
			//upload file
			if($FILES['file']['name'] != "" && $FILES['file']['error'] == 0 && in_array($FILES['file']['type'], $allowed))
			{


				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder,0777,true);

				}

				$destination = $folder . $FILES['file']['name'];

				move_uploaded_file($FILES['file']['tmp_name'], $destination);

			}else{
				$_SESSION['error'] = "This file could not be uploaded";
			}

			if($_SESSION['error'] == "")
			{

				//save to db
				$arr['title'] = $POST['title'];
				$arr['description'] = $POST['description'];
				$arr['image'] = $destination;
				$arr['user_id']=$id;
				$arr['url_address'] = get_random_string_max(20);
				$arr['date'] = date("Y-m-d H:i:s");
				$arr['view_count'] = 0;

				$query = "insert into images (title,description,url_address,date,image,view_count,user_id) values (:title,:description,:url_address,:date,:image,:view_count, :user_id)";
				$data = $DB->write($query,$arr);
				if($data)
				{
					
					header("Location:". ROOT . "home");
					die;
				}
			}

		
		}
	}

}