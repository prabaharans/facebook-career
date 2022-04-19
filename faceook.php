<?php

getHitProbability(2, 3, [[0,0,1],[1,0,1]]);
getHitProbability(2, 2, [[1,1],[1,1]]);
function getHitProbability(int $R, int $C, array $G): float {
  // Write your code here
  if($R >= 1 && $R <= 100 && $C >= 1 && $C <= 100) {
    $G = check_array($G);
    if($G == false) {
      return false;
    }
    $new_g = array_count_values(call_user_func_array('array_merge', $G));

    $cnt_g = array_sum($new_g);
    $res = $new_g[1]/$cnt_g; 
    echo number_format($res,8,'.',''); die;
    return round($res,8);
  }
}

function check_array($G) {
  $new_arr = array();
  foreach($G as $k=>$v) {
    if(is_array($v)) {
      $new_arr[$k] = check_array($v);
    } else {
      if($v >=0 || $v <= 1) {
        $new_arr[$k] = $v;
      } else {
        return false;
      }
    }
  }
  return $new_arr;
}