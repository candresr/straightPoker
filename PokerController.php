<?php
/**
*
*/
class PokerController
{

  function __construct()
  {

  }

  public function isStraight($barajas)
  {
    sort($barajas, SORT_NUMERIC);

    if(count($barajas) > 7){
      return false;
    }
    if (count($barajas) > count(array_unique($barajas))) {
      return false;
    }

    if(in_array(14, $barajas) && in_array(2, $barajas)){
      array_pop($barajas);
      array_unshift($barajas,1);
    }

    $secuencia = range(current($barajas),end($barajas));
    $resultado = array_diff($secuencia, $barajas);

    if(count($resultado) > 0){
      return false;
    }else{
      return true;
    }
  }

}
?>
