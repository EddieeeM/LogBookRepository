<?php

  class EmailValidationTest extends \PHPUnit_Framework_TestCase
  {
    public function testCanBeCreatedFromValidEmailAddress(): void
    {
      $email = 'lewish@gmail.com';
      $expected = false;

      if(filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        $expected = true;
      }

      $this->assertTrue($expected);
    }

    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
      $email = 'lewis.h.@example.com';
      $expected = false;

      if(filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        $expected = true;
      }

      $this->assertFalse($expected);

    }

    //Email is set.
    public function testEmailSet(): void
    {
      $email = 'lewish@gmail.com';
      $expected = false;

      if(isset($email))
      {
        $expected = true;
      }

      $this->assertTrue($expected);
    }

    //Email not set.
    public function testEmailNotSet(): void
    {
      $email;
      $expected = false;

      if(isset($email))
      {
        $expected = true;
      }

      $this->assertFalse($expected);
    }

  }
 ?>
