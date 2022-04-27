<?php

Class Contact extends Controller 
{
	function index()
	{
		
		$data['page_title'] = "Contact Us";
		$this->view("pages/contact",$data);
	}

}