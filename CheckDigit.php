<?php
class CheckDigit{
    public static $array_number = [];
    public static $even_number_sum = 0;
    public static $odd_number_sum = 0;

    public static function main($val_number="")
    {
        $checkdigit_number =null;
        self::$array_number = self::number($val_number);
        $sum = self::sum(true) + self::sum(false);
        $checkdigit_number = self::checkdigit_number($sum);
        return $checkdigit_number;
    }

    public static function number($number=""){
        $number = (string)$number;
        $response_number = [];
        for($i=0;$i<strlen($number);$i++){
            $response_number[$i] = mb_substr($number,$i,1,"utf-8");
        }
        array_push($response_number,"");
        return  array_reverse($response_number);
    }

    public static function sum($flg=true){
        //$flg true=偶数 false=奇数
        foreach(self::$array_number as $key=>$val){
            if($flg===true){
                if(($key +1)%2===0 && (int)$key!==0){
                    self::$even_number_sum+=(int)$val;
                }
            }
            if($flg===false){
                if(($key +1)%2>0 && (int)$key!==0){
                    self::$odd_number_sum+=(int)$val;
                }
            }
        }

        return $flg===true ? (self::$even_number_sum * 3):self::$odd_number_sum;
    }

    public static function checkdigit_number($number=""){
        $number = (string)$number;
        return (int)mb_substr($number,(strlen($number) -1),1,"utf-8")===0?0:10 - (int)mb_substr($number,(strlen($number) -1),1,"utf-8");
    }
}

print "CheckDigit-Number=".CheckDigit::main((int)$argv[1]).PHP_EOL;
