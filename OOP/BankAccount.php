<?php

// Visibilty and access modifiers
// Access modifiers control how properties and methods can be accesed

class BankAccount{
    // Private properties -nly accessible within the class
    private $accountNumber;
    private $balance;

    // protected property - accessible within this class and child classes
    protected $type;

    // Public - accessible from anywhere 
    public $ownerName;

    // Constructor
    public function __construct($ownerName, $accountNumber, $initialBalance){
        $this ->ownerName = $ownerName;
        $this ->accountNumber = $accountNumber;
        $this ->balance = $initialBalance;
        $this ->type = "Standard";
    }
    // Public method - can be called from anywhere
    // a method to deposit funds return true if amount is greater than zero otherwise false
    public function depositFunds($amount){
        if ($amount > 0){
            $this ->balance += $amount;
            return true;
        }
            return false;
        
    }

    public function withdraw($amount){
        if($amount > 0 && $this ->hasSufficientFunds($amount)){
            $this ->balance -=$amount;
            return true;
        }
        return false;

    }

    // private method - only accessible within this class
    private function hasSufficientFunds($amount){
        return $this ->balance >= $amount;
    }

    // Public method to acess private property
    public function getBalance(){
        return $this->balance;

    }

    // protected function - accessible in this class and child classes
    protected function changeType($newType){
        $this ->type =$newType;
    }

}

$account = new BankAccount("John Smith", "12345", 1000);


// This works _public property
echo $account->ownerName ."<br>";

// This would cause an error  -private function
// echo account->hasSufficientFunds

// This works _public property
echo $account->getBalance() . "<br>"; //Output 1000

$account->depositFunds(500);

echo $account->getBalance() ."<br>"; //Output 1500
// $account->hasSufficientFunds(100);

// $account ->withdraw(2000);

/**
 * Access modifiers explained:
 * -public Accessible from anywhere
 * -private accessible only within the class
 * -protected :Accessible within the class and a child class
 * 
 * This concept is known as encapsulation - hiding internal state
 * and requiring all interactions to be through public methods.
 */

// Next Inheritance(in a new file called ,Vehicle.php)




