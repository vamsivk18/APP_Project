<?php
include "includes.php";
class ExampleAssertionTest extends \PHPUnit\Framework\TestCase{
    // public function testThatStringsMatch(){
    //     $string1 = "test";;
    //     $string2 = "test";
    //     $this->assertSame($string1,$string2);
    // }
    public function testUserLogin(){
        $logindata = new LoginContr("vamsi","");
        $this->assertEquals($logindata->isemptyInput(),true);//password field empty
        $logindata = new LoginContr("vam","Vamsi");
        $this->assertEquals($logindata->userNotFound(),true);//User Doesnot Exist
        $logindata = new LoginContr("vamsi","Vamsi");
        $this->assertEquals($logindata->passwordIncorrect(),true);//Password Incorrect
        $logindata = new LoginContr("vamsi","Vamsi@1827");
        $this->assertEquals($logindata->isemptyInput(),false);//Fields not empty
        $this->assertEquals($logindata->userNotFound(),false);//User Exists
        $this->assertEquals($logindata->passwordIncorrect(),false);//Password is correct
        $this->assertEquals($logindata->loginUser(),true);//Succesfully Logged in
    }
    // public function testUserSignup(){
    //     $signupdata = new SignupContr("Vamsi","vamsikrishna1827@gmail.com","vamsi","Vamsi@1827","Vamsi@1827");
    //     $sugnupdata->
    // }
}
?>