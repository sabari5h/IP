<?php

class BankAccount {
    private $balance;

    public function __construct($initialBalance = 0) {
        $this->balance = $initialBalance;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            return true;
        } else {
            return false; // Deposit amount must be positive
        }
    }

    public function withdraw($amount) {
        if ($amount > 0 && $this->balance >= $amount) {
            $this->balance -= $amount;
            return true;
        } else {
            return false; // Insufficient balance or invalid withdrawal amount
        }
    }

    public function getBalance() {
        return $this->balance;
    }
}

class Customer {
    private $name;
    private $account;

    public function __construct($name, $initialBalance = 0) {
        $this->name = $name;
        $this->account = new BankAccount($initialBalance);
    }

    public function getName() {
        return $this->name;
    }

    public function deposit($amount) {
        return $this->account->deposit($amount);
    }

    public function withdraw($amount) {
        return $this->account->withdraw($amount);
    }

    public function checkBalance() {
        return $this->account->getBalance();
    }
}

// Example usage:
$customer = new Customer("John Doe", 1000);
echo "Customer: " . $customer->getName() . "<br>";
echo "Initial Balance: $" . $customer->checkBalance() . "<br>";

$customer->deposit(500);
echo "After depositing $500, Balance: $" . $customer->checkBalance() . "<br>";

$customer->withdraw(200);
echo "After withdrawing $200, Balance: $" . $customer->checkBalance() . "<br>";

$customer->withdraw(2000); // This will fail due to insufficient balance
echo "After attempting to withdraw $2000, Balance: $" . $customer->checkBalance() . "<br>";
?>
