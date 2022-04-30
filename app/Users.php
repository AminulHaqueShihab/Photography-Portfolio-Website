<?php 
namespace App;
class Users{
    public $username;
    public $id;
    public $url_address;
    public $email;
    public $password;


    public function setProfileInfo($username,$id,$url,$email,$password){
        $this->username = $username;
        $this->id = $id;
        $this->url = $url;
        $this->email = $email;
        $this->password = $password;
    }

    public function getUsername($id)
    {   
        if($id == $this->id){    
            return $this->username;
        }
        else{
            return false;
        }
    }

}