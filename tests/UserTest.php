<?php

class UserTest extends \PHPUnit\Framework\TestCase {

    protected $Users;

    public function test_get_username()
    {

        $Users = new \App\Users;
        $Users->setProfileInfo("Md Aminul Haque",19,"https://www.facebook.com/aminul.haque.5","aminul@gmail.com", "123456");

        $result = $Users->getUsername(19);
        $this->assertEquals("Md Aminul Haque", $result);
    }
}
