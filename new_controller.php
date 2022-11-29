<?php

function checkPost($data)
{
    if(!empty($data) && $data['credit'] != "" && $data['interest'] != "" && $data['time']){
        return true;
    }
}

function calculateLoan($data)
{
    if (checkPost($data)) {
        $interestAmount = ($data['credit'] * $data['interest']) / 100;
        $amountForPay   = $interestAmount + $data['credit'];
        $calculateData = [
            'interestAmount' => $interestAmount,
            'amountForPay'   => $amountForPay,
            'monthlyPay'     => $amountForPay / $data['time'],
        ];
        return $calculateData;
    }
}
