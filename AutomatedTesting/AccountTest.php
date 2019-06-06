<?php

  class AccountTest extends \PHPUnit_Framework_TestCase
  {
    //Test for id existence and then pass.
    public function testIDFound()
    {
      //Simulates DB checking.
      $dbdriverid = array('101624498', '193285782', '283745982', '283745928');
      $userid = '101624498';
      $found = false;

      if(in_array($userid, $dbdriverid))
      {
        $found = true;
      }

      $this->assertTrue($found);
    }

    //Test for id existence but fail.
    public function testIDNotFound()
    {
      //Simulates DB checking.
      $dbdriverid = array('101624498', '193285782', '283745982', '283745928');
      $userid = '982457295';
      $found = false;

      if(in_array($userid, $dbdriverid))
      {
        $found = true;
      }

      $this->assertFalse($found);
    }

    //Changing a value / account detail.
    public function testDetailChange()
    {
      $detail = 'Montreal';
      $confdetail = $detail;
      $change = true;
      $changedstatus = false;

      if($change == true)
      {
        $confdetail = 'Quebec';
      }
      if(strcmp($detail, $confdetail) != 0)
      {
        $changedstatus = true;
      }

      $this->assertTrue($changedstatus);
    }

    //Not changing a value / account detail.
    public function testDetailUnchanged()
    {
      $detail = 'Montreal';
      $confdetail = $detail;
      $change = false;
      $changedstatus = false;

      if($change == true)
      {
        $confdetail = 'Quebec';
      }
      if(strcmp($detail, $confdetail) != 0)
      {
        $changedstatus = true;
      }

      $this->assertFalse($changedstatus);
    }
  }
?>
