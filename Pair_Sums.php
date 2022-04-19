<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here

 
function numberOfWays($arr, $k){
  // Write your code here
  $new_arr = $arr;
  $i = 0;
  foreach($new_arr as $key=>$value) {
    $remain = (($value>$k)?($value-$k):($k-$value));
    $keys[$key] = array_keys($arr,$remain);
  }
  $keys = array_filter($keys);
  foreach($keys as $k1=>$v1) {
    foreach($v1 as $k2=>$v2) {
      if($k1 != $v2) {
        $new_arr_2 = array($k1,$v2);
        sort($new_arr_2);
        $new_arr_1[] = implode(',',$new_arr_2); 
      }
    }
  }
  $new_arr_1 = array_unique($new_arr_1);
  //print_r($new_arr_1);
  return count($new_arr_1);
}  
 
// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.

function printInteger($n){
  echo  "[ ". $n . " ]";
}

$test_case_number = 1;

function check($expected, $output){
    global $test_case_number;
    $result = false;
    if($expected == $output){
        $result = true;
    }
    $rightTick = '\u2713';
  $wrongTick = '\u2717';
  if($result){
    echo json_decode('"'.$rightTick.'"');
      echo " Test #".$test_case_number ;
      echo "\n";
  }
  else{
    echo json_decode('"'.$wrongTick.'"');
      echo " Test #".$test_case_number. ": Expected ";
      printInteger($expected);
      echo " Your Output : ";
      printInteger($output);
      echo "\n";
  }
  $test_case_number += 1;
}

$k_1 = 6;
$arr_1 = array(1, 2, 3, 4, 3);
$expected_1 = 2;
$output_1 = numberOfWays($arr_1, $k_1);
check($expected_1, $output_1);

$k_2 =6;
$arr_2 = array(1, 5, 3, 3, 3);
$expected_2 = 4;
$output_2 = numberOfWays($arr_2, $k_2);
check($expected_2, $output_2);

// Add your own test cases here

   
?>