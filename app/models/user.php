<?php 

Class User 
{

	function login($POST)
	{
		$db = new Database();

		$_SESSION['error'] = "";
		if(isset($POST['username']) && isset($POST['password']))
		{

			$list['username'] = $POST['username'];
			$list['password'] = $POST['password'];

			$query = "select * from users where username = :username && password = :password limit 1";
			$info = $db->read($query,$list);
			if(is_array($info))
			{
				//logged in
				$_SESSION['user_name'] = $info[0]->username;
				$_SESSION['user_url'] = $info[0]->url_address;

				header("Location:". ROOT . "home");
				die;

			}else{

				$_SESSION['error'] = "Wrong username or password";
			}
		}else{

			$_SESSION['error'] = "Username or password is not valid. Please, enter again";
		}

	}

	function signup($POST)
	{

		$db = new Database();

		$_SESSION['error'] = "";
		if(isset($POST['username']) && isset($POST['password']))
		{

			$list['username'] = $POST['username'];
			$list['password'] = $POST['password'];
			$list['email'] = $POST['email'];
			$list['url_address'] = get_random_string_max(30);
			$list['date'] = date("Y-m-d H:i:s");

			$query_u = "select * from users where username = :username limit 1";
			$info_u = $db->read($query_u, $list);
			$query_e = "select * from users where email = :email limit 1";
			$info_e = $db->read($query_e, $list);
			
			if($list['username'] == "" || $list['password'] == "" || $list['email'] == "")
			{
				$_SESSION['error'] = "Empty fields are not allowed";
				header("Location:". ROOT . "signup");
				die;
			}
			else{

				$query = "insert into users (username, password, email, url_address,date) values (:username,:password,:email,:url_address,:date)";
				$info = $db->write($query, $list);
				if($info)
				{
					$_SESSION['error'] = "Sign up successful. Log in now";
					header("Location:". ROOT . "login");
					die;
				}
			}

		}else{

			$_SESSION['error'] = "Username or password is not valid. Please, enter again";
		}
	}

	function verify_login()
	{

		$db = new Database();

		if(isset($_SESSION['user_url']))
		{

			$list['user_url'] = $_SESSION['user_url'];

			$query = "select * from users where url_address = :user_url limit 1";
			$data = $db->read($query,$list);
			if(is_array($data))
			{
				//logged in
				$_SESSION['user_name'] = $data[0]->username;
				$_SESSION['user_url'] = $data[0]->url_address;

				return true;
			}
		}

		return false;

	}

	function logout()
	{
		//logged in
		unset($_SESSION['user_name']);
		unset($_SESSION['user_url']);

		header("Location:". ROOT . "login");
		die;
	}


}