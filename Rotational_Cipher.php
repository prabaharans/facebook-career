<?php

// Add any extra import statements you may need here

// Add any helper functions you may need here

 
function rotationalCipher($input, $rotation_factor) {
  // Write your code here
  $caps = range('A','Z');
  $small = range('a','z');
  $num = range('0','9');
  $arr_input = str_split($input);
  $str = '';
  //print_r($arr_input);
  //print_r($num);
  //echo '$input => '.$input."\n";
  //echo '$rotation_factor => '.$rotation_factor."\n";
  foreach($arr_input as $k=>$v) {
    if(ctype_upper($v)) {
      $cap_key = array_search($v, $caps);
      if(count($caps)-$cap_key >= $rotation_factor) {
        $str .= $caps[$cap_key+$rotation_factor];
      } else if(count($caps) < $rotation_factor) {
        $caps_index = (($rotation_factor - (floor($rotation_factor/count($caps))*count($caps)))+$cap_key);
        $caps_index = (($caps_index > count($caps))?($caps_index-count($caps)):$caps_index);
        $str .= $caps[$caps_index];
      } else {
        $str .= $caps[$rotation_factor-(count($caps)-$cap_key)];
      }
      /*if((count($caps)-1) == $cap_key) {
        $cap_key = 0 + $rotation_factor-1;
        $str .= $caps[$cap_key];
      } else {
        $str .= $caps[$cap_key+$rotation_factor];  
      }*/
    } else if(ctype_lower($v)) {
      $small_key = array_search($v, $small);
      /*if((count($small)-1) == $small_key) {
        $small_key = 0 + $rotation_factor-1;
        $str .= $small[$small_key];
      } else {
        $str .= $small[$small_key+$rotation_factor];  
      }*/
      //echo '$small_key => '.$small_key."\n";
      //echo '$v => '.$v."\n";
      if(count($small)-$small_key >= $rotation_factor) {
        $str .= $small[$small_key+$rotation_factor];
      } else if(count($small) < $rotation_factor) {
        $small_index = (($rotation_factor - (floor($rotation_factor/count($small))*count($small)))+$small_key);
        $small_index = (($small_index > count($small))?($small_index-count($small)):$small_index);
        $str .= $small[$small_index];
      } else {
        $str .= $small[$rotation_factor-(count($small)-$small_key)];
      }
    } else if(ctype_digit($v)) {
      $num_key = array_search($v, $num);
      /*if((count($num)-1) == $num_key) {
        $num_key = 0 + $rotation_factor-1;
        $str .= $num[$num_key];
      } else {
        $str .= $num[$num_key+$rotation_factor];  
      }*/
      if(count($num)-$num_key >= $rotation_factor) {
        $str .= $num[$num_key+$rotation_factor];
      } else if(count($num) < $rotation_factor) {
        $num_index = (($rotation_factor - (floor($rotation_factor/count($num))*count($num)))+$num_key);
        $num_index = (($num_index > count($num))?($num_index-count($num)):$num_index);
        $str .= $num[$num_index];
      } else {
        $str .= $num[$rotation_factor-(count($num)-$num_key)];
      }
    } else {
      $str .= $v;
    }
  }
  return $str;
}  

// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.

function printString($str) {
  echo "[\"". $str . "\"]";
}

$test_case_number = 1;

function check($expected, $output) {
  global $test_case_number;
  $result = true;
  if ($expected != $output) {
    $result = false;
  }
  $rightTick = '\u2713';
  $wrongTick = '\u2717';
  if ($result) {
    echo json_decode('"'.$rightTick.'"');
    echo " Test # ".$test_case_number ;
    echo "\n";
  }
  else {
    echo json_decode('"'.$wrongTick.'"');
    echo " Test # ".$test_case_number. ": Expected ";
    printString($expected);
    echo " Your Output : ";
    printString($output);
    echo "\n";
  }
  $test_case_number += 1;
}

$input_1 = "All-convoYs-9-be:Alert1.";
$rotation_factor_1 = 4;
$expected_1 = "Epp-gsrzsCw-3-fi:Epivx5.";
$output_1 = rotationalCipher($input_1, $rotation_factor_1);
check($expected_1, $output_1);

$input_2 = "abcdZXYzxy-999.@";
$rotation_factor_2 = 200;
$expected_2 = "stuvRPQrpq-999.@";
$output_2 = rotationalCipher($input_2, $rotation_factor_2);
check($expected_2, $output_2);
    
// Add your own test cases here

   
?>