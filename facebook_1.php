<?php

// getMaxAdditionalDinersCount(10, 1, 2, [2, 6]);
echo "<br><br><br>";
getMaxAdditionalDinersCount(15, 2, 3, [11, 6, 14]);
function getMaxAdditionalDinersCount(int $N, int $K, int $M, array $S): int {
  // Write your code here
  $arr = range(1, $N);
  sort($S);
  $key = [];
  foreach($S as $k=>$v) {
    $key[] = array_search($v, $arr);
  }
  // echo '<pre>';
  // print_r($key);
  // echo '</pre>';
  
  $allocate = ($K==1)?3:($K*2)+1;

  // foreach($key as $k1=>$v1) {
    // if($v1 > 0 && $v1 > $allocate) {
      // $allocate_res = $v1-$allocate;
      // $allocate_res_1 = $v1+$allocate;
      // echo '$allocate_res => '.$allocate_res."\n";
      // echo '$allocate_res_1 => '.$allocate_res_1."\n";
      // echo '$v1 => '.$v1."<br>";
      $i = 0;
      while ($i < $N) {
        $i = $i+$K;
        if(in_array($i, $S)) {
          $i = $i+$K;
        } else {
          echo '$i => '.$i."<br>";
        }
      }

      while ($N > 0) {
        $N = $N-$K;
        if(in_array($N, $S)) {
          echo '$N1 => '.$N."<br>";
          $N = $N-$K;
        } else {
          if($N != 0) {
            echo '$N => '.$N."<br>";  
          }
        }
        // echo '$N => '.$N."<br>";
        // echo '$K => '.$K."<br>";
      }
      
    // }
  // }



  // foreach($arr as $k2=>$v2) {
  //   if(in_array($v2, $S)) {

  //   }
  // }

      die;
  return 0;
}

function check_last($v, $allocate, $cnt) {
  return (($cnt > ($v+$allocate))?($v+$allocate):$cnt);
}
function check_initial($v, $allocate) {
  return ((($v-$allocate) >= 0)?($v-$allocate):0);
}
// function check_pre_post_val(1, [], []) {
//   check_pre_post_val($n, $arr, $S);
// }