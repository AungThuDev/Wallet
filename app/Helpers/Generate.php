<?php
namespace App\Helpers;
use App\Models\Wallet;
    class Generate
    {
        public static function accountNumber()
        {
            $min = 1000000000000000;
            $max = 9999999999999999;
            $number = mt_rand($min,$max);
            if(Wallet::where('account_number',$number)->exists())
            {
                self::accountNumber();   
            }
            return $number;
        }
    }
?>