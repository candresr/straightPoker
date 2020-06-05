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
    }elseif (count($barajas) > count(array_unique($barajas))) {
      return false;
    }else{
      if(array_search(14, $barajas)){
        array_pop($barajas);
        array_unshift($barajas,1);
      }

      $end = current($barajas)+(count($barajas) - current($barajas));
      $secuencia = range(current($barajas),$end + 1);
      $resultado = array_diff($barajas, $secuencia);

      if(count($resultado) > 0){
        return false;
      }else{
        return true;
      }
    }
  }

}
?>
