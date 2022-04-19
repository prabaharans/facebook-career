<?php
echo getUniformIntegerCountInInterval(75,300);
function getUniformIntegerCountInInterval(int $A, int $B): int {
  // Write your code here
  if($A >= 1 && $B >= 1 && $A <= $B && $A <= (10 ** 12) && $B <= (10 ** 12)) {
    //$arr = range($A, $B);
    //$i = 0;
    //foreach($arr as $k=>$v) {
      /*$arr_str = str_split($v,1);
      $arr_unique = array_unique($arr_str);
      if(count($arr_unique) == 1) {
        $i++;
      }*/
      /*$strlen = strlen($v);
      $d = '';
      $d = (int) str_pad($d,$strlen,'1',STR_PAD_LEFT);
      $c = $v/$d;
      //echo $v.' >= '.$d.' && '.$v%$d.' == 0 && '.$c[0].' == '.$v[0]."\n";
      if($v >= $d && $v%$d == 0 && $c[0] == $v[0]) {
        $i++;
      }
      unset($strlen);
      unset($d);
      unset($j);
      unset($c);*/
    //}
    //unset($arr);
    $dA = floor(log10($A)) + 1;
    echo '$dA => '.$dA."<br>";
    $dB = floor(log10($B)) + 1;
    echo '$dB => '.$dB."<br>";

    $diff = $dB - $dA;

    $cA = 10**$dA;
    $cB = 10**$dB;
    echo '$cA => '.$cA."<br>";
    echo '$cB => '.$cB."<br>";
    $fA = floor((1/9)*($cA));
    $fB = floor((1/9)*($cB));
    echo '$fA => '.$fA."<br>";
    echo '$fB => '.$fB."<br>";
    

    if($diff > 0) {
      $uniA = floor(($cA-1)/$fA) - floor($A/$fA);
      $uniB = floor($B/$fB);
      echo '$uniA => '.$uniA."<br>";
      echo '$uniB => '.$uniB."<br>";
      $uni = $uniA + $uniB + ($diff-1) * 9; 
    } else {
      $uniA = floor($A/$fA);
      $uniB = floor($B/$fB);
      echo '$uniA 1 => '.$uniA."<br>";
      echo '$uniB 1 => '.$uniB."<br>";
      
      $uni = $uniB - $uniA;
    }
    if($A%$fA == 0) {
      $uni += 1;
    }    
    return $uni;
    //return $i;
  } else {
    return false;
  }
}
