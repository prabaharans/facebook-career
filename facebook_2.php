<?php

getMaxAdditionalDinersCount(10, 1, 2, [2, 6]);
echo "<br><br><br>";
getMaxAdditionalDinersCount(15, 2, 3, [11, 6, 14]);

function getMaxAdditionalDinersCount(int $N, int $K, int $M, array $S): int {
    sort($S);
    $start = 1;
    $res = 0;
    array_push($S, $N+$K+1);
    // echo '<pre>';
    // print_r($S);
    // echo '</pre>';
    foreach ($S as $s) {
        $delta = $s-$K-$start;
        // echo '$delta => '.$delta."<br>";
        if($delta > 0) 
            $res += ceil($delta / ($K+1));
        // echo '$res => '.$res."<br>";
        $start = $s+$K+1;
        // echo '$start => '.$start."<br>";
    }
    echo $res;
    return $res;
}