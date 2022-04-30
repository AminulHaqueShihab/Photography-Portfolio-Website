<?php

class UserTest extends \PHPUnit\Framework\TestCase {
    public function test_get_username()
    {
        include "../Photography-Portfolio-Website/app/models/". 'user' .".php";
        include "../Photography-Portfolio-Website/app/core/". 'database' .".php";
        $user = new User();
        // $user = $this->loadModel("user");
        // $user = new  ....\app\models\User;
        $result = $user->get_username(19);
        $this->assertEquals('Md Aminul Haque',$result);
    }

}