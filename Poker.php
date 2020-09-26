<?php
  require_once 'PokerController.php';
  use PHPUnit\Framework\TestCase;
  /**
   *
   */
  class Poker extends TestCase
  {

    public function testAlgorithm() {
      $poker = new PokerController();
      $results1 = $poker->isStraight([2, 3, 4 ,5, 6]);
      $this->assertEquals($results1, true, "2, 3, 4 ,5, 6");
      $results2 = $poker->isStraight([14, 5, 4 ,2, 3]);
      $this->assertEquals($results2, true, "14, 5, 4 ,2, 3");
      $results3 = $poker->isStraight([7, 7, 12 ,11, 3, 4, 14]);
      $this->assertEquals($results3, false, "7, 7, 12 ,11, 3, 4, 14");
      $results4 = $poker->isStraight([7, 3, 2]);
      $this->assertEquals($results4, false, "7, 3, 2");
      $results5 = $poker->isStraight([7, 3, 2, 14, 8, 9, 6, 5]);
      $this->assertEquals($results5, false, "7, 3, 2, 14, 8, 9, 1");
      $results6 = $poker->isStraight([8,9,10,11,12,13,14]);
      $this->assertEquals($results6, true, "8,9,10,11,12,13,14");
    }
  }

 ?>
