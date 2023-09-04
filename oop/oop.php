<?php
// logika

class BankAccount {
    
    private $pin;

    function __construct($first_name, $second_name, $pin){
        $this -> first_name = $first_name;
        $this -> second_name = $second_name;
        $this -> pin = $pin;
        $this -> income = 0;
        $this -> expense = 0;
        $this -> movements = [];
    }

    function pin_checker($user_pin) {
        if($user_pin !== $this -> pin){
            header("Location: http://localhost/databaza_fresh/oop/wrongpin.php");
            exit();
        }
    }

    function create_income ($amount) {
        // $this-> income = $this -> income + $amount;
        $this -> income += $amount;
        $this -> add_movement($amount);
        
    }

    function create_expense ($amount) {
        $this -> expense = $this-> expense + $amount;
        $this -> add_movement($amount);
    }

    private function add_movement($money) {
        $this -> movements[] = ($money);
    }
}

//použitie

// $account1 = new BankAccount("David", "Inglody", 0000);

// // $account1 -> pin_checker(0000);

// $account1 -> create_income(500);
// $account1 -> create_income(-70);
// $account1 -> create_expense(400);
// var_dump ($account1-> movements);