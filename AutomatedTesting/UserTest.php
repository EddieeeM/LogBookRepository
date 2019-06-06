<?php

  //use PHPUnit\Framework\TestCase;

  class UserTest extends \PHPUnit_Framework_TestCase
  {
    //User's Name is Successfuly Obtained.
    public function testNameIsValid()
    {
      $fname = 'Lewis';
      $lname = 'Hamilton';
      $valid = false;
      $fullname = $fname . " " . $lname;
      $expected = 'Lewis Hamilton';

      if(strcmp($fullname, $expected) == 0)
      {
        $valid = true;
      }

      $this->assertTrue($valid);
    }

    //User's Name Will Fail.
    public function testNameIsInvalid()
    {
      $fname = 'Lewis';
      $lname = 'Hamilton';
      $valid = false;
      $fullname = $fname . $lname;
      $expected = 'Lewis Hamilton';

      if(strcmp($fullname, $expected) == 0)
      {
        $valid = true;
      }

      $this->assertFalse($valid);
    }

    //Test for user's username (existance) fail.
    public function testUserNameExistanceFail()
    {
      $dbnames = array('Max13', 'Val67', 'Lewis12', 'Seb05');
      $usernme = 'Lewis12';
      $existance = false;

      if(in_array($usernme, $dbnames))
      {
        $existance = true;
      }

      $this->assertTrue($existance);
    }

    //Test for user's username existance pass.
    public function testUserNameExistancePass()
    {
      $dbnames = array('Max13', 'Val67', 'James34', 'Seb05');
      $usernme = 'Lewis12';
      $existance = false;

      if(in_array($usernme, $dbnames))
      {
        $existance = true;
      }

      $this->assertFalse($existance);
    }

    //For testing the authenticity of a Mobile #. VALID
    public function testMobileNumberValid()
    {
      $mobileNum = '0423983476';
      $valid = false;

      if(preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $mobileNum))
      {
        $valid = true;
      }

      $this->assertTrue($valid);
    }

    //For testing the authenticity of a Mobile #. NOT VALID
    public function testMobileNumberInvalid()
    {
      $mobileNum = '+61-23928472617';
      $valid = false;

      if(preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $mobileNum))
      {
        $valid = true;
      }

      $this->assertFalse($valid);
    }

    //Test for a unique id # found.
    public function testUniqueID()
    {
      //Simulates DB checking.
      $dbids = array('101624498', '193285782', '283745982', '283745928');
      $userid = '101624498';
      $found = false;

      if(!(in_array($userid, $dbids)))
      {
        $found = true;
      }

      $this->assertFalse($found);
    }

    //Test for a uunique id # not found.
    public function testNotUniqueID()
    {
      //Simulates DB checking.
      $dbids = array('101624498', '193285782', '283745982', '283745928');
      $userid = '783746129';
      $found = false;

      if(!(in_array($userid, $dbids)))
      {
        $found = true;
      }

      $this->assertTrue($found);
    }
  }

 ?>
