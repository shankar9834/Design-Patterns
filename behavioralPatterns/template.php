<?php

abstract class PaymentFlow {

    public abstract function validateRequest(); 
    public abstract function calculateFees();
    public abstract function debitAmount();
    public abstract function creditAmount();

    public final function sendMoney(){
        $this->validateRequest();
        $this->debitAmount();
        $this->calculateFees();
        $this->creditAmount();
    }

}

class payToFriend extends PaymentFlow {

    public function validateRequest(){
        echo "validated payment to friend\n";
    }
    public function calculateFees(){
        echo "calculated fees for payment to friend\n";
    }
    public function debitAmount(){

        echo "amount debited\n";
    }
    public function creditAmount(){
        echo "amount credited\n";
        echo "\n";
    }
}

class payToMerchant extends PaymentFlow {

    public function validateRequest(){
        echo "validated payment to merchent\n";
    }
    public function calculateFees(){
        echo "fees calculated\n";
    }
    public function debitAmount(){
        echo "debited amount\n";
    }
    public function creditAmount(){
        echo "amount credited\n";
    }
}

$payToFriend = new payToFriend();
$payToFriend->sendMoney();

$payToMerchent = new payToMerchant();
$payToMerchent->sendMoney();
