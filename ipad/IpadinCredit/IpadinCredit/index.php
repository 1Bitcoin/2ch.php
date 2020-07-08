<?php

define('PRICE', 39999);
define('PAY', 5000);

$rateHomecredit = 1.04;
$rateSoftbank = 1.03;
$rateStrawberrybank = 1.02;

$comissionSoftbank = 1000;
$singleComissionstrawberryBank = 7777;

function getMoneycredit($rate, $comission)
{
    $finalPayout = ($rate == 1.02) ? 7777 : 0;

    $currentCredit = PRICE;

    while ($currentCredit > PAY)
    {
        $currentCredit = $currentCredit * $rate + $comission;
        $currentCredit -= PAY;
        $finalPayout += PAY;
    }

    if ($currentCredit <= PAY)
    {
        $finalPayout += $currentCredit;
        $currentCredit = 0;
    }

    $finalPayout = round($finalPayout, 2);

    echo "{$finalPayout}\n";
}

getMoneycredit($rateHomecredit, 0);
getMoneycredit($rateSoftbank, $comissionSoftbank);
getMoneycredit($rateStrawberrybank, 0);

?>