<?php

class Bankaccount {
    private $pin;
    private $balance;   
    const MAX_PRICE = 1500;    

    function __construct($first_name,$second_name,$pin,$price){
        $this -> first_name = $first_name;
        $this -> second_name = $second_name;
        $this -> setPin($pin);
        $this -> balance = 500;
        $this -> setMaxPrice($price);
    }

    function setPin($user_pin){
        if(strlen(strval($user_pin)) === 4) {
            $this -> pin = $user_pin;
        }else {
            throw new Exception("Neplatný pin");
        }
    }

    public function setMaxPrice($user_price) {

        // define("MAX_PRICE", 1500);
        if ($user_price <= self::MAX_PRICE) {
            $this-> price = $user_price;
        }
    }

    function getBalance(){
        return $this -> balance;
    }

}
//     public function setPin($user_pin){

//         if(strlen(strval($user_pin))) {
//             $this -> pin = $user_pin;
//         } else {
//             throw new Exception("Neplatný pin");
//         }
//     }

//     function getBalance() {
//         return $this -> balance;
//     }

// }

$acc1 = new Bankaccount ("Dávid", "Inglody",1234, 500);
echo $acc1 -> getBalance();