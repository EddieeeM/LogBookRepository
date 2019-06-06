<?php

  class PasswordTest extends \PHPUnit_Framework_TestCase
  {
    //Test password of valid type.
    public function testPasswordValid(): void
    {
      $pswd = 'five5';
      $expected = true;

      if(!ctype_alnum($pswd))
      {
        $expected = false;
      }

      $this->assertTrue($expected);
    }

    //Test password of invalid type.
    public function testPasswordInvalid(): void
    {
      $pswd = 'five_5$';
      $expected = true;

      if(!ctype_alnum($pswd))
      {
        $expected = false;
      }

      $this->assertFalse($expected);
    }

    //Tests passwords entered are the same.
    public function testPasswordConfirm(): void
    {
      $userpswd = 'five5';
      $expected = false;

      if(strcmp($userpswd, 'five5') == 0)
      {
        $expected = true;
      }

      $this->assertTrue($expected);
    }

    //Test passwords entered not the same.
    public function testPasswordUnconfirm():void
    {
      $userpswd = 'five5';
      $expected = false;

      if(strcmp($userpswd, 'lewiswins') == 0)
      {
        $expected = true;
      }

      $this->assertFalse($expected);
    }
  }
 ?>
