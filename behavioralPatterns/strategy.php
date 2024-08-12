<?php
// PaymentStrategy.php
interface PaymentStrategy
{
    public function pay(int $amount);
}

// PayPalStrategy.php
class PayPalStrategy implements PaymentStrategy
{
    private $email;
    private $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function pay(int $amount)
    {
        echo "Paying $amount using PayPal.\n";
        // PayPal payment logic
    }
}

// CreditCardStrategy.php
class CreditCardStrategy implements PaymentStrategy
{
    private $name;
    private $cardNumber;
    private $cvv;
    private $expiryDate;

    public function __construct(string $name, string $cardNumber, string $cvv, string $expiryDate)
    {
        $this->name = $name;
        $this->cardNumber = $cardNumber;
        $this->cvv = $cvv;
        $this->expiryDate = $expiryDate;
    }

    public function pay(int $amount)
    {
        echo "Paying $amount using Credit Card.\n";
        // Credit Card payment logic
    }
}

// BankTransferStrategy.php
class BankTransferStrategy implements PaymentStrategy
{
    private $accountNumber;
    private $bankCode;

    public function __construct(string $accountNumber, string $bankCode)
    {
        $this->accountNumber = $accountNumber;
        $this->bankCode = $bankCode;
    }

    public function pay(int $amount)
    {
        echo "Paying $amount using Bank Transfer.\n";
        // Bank transfer payment logic
    }
}

// PaymentContext.php
class PaymentContext
{
    private $strategy;

    public function setStrategy(PaymentStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function executeStrategy(int $amount)
    {
        $this->strategy->pay($amount);
    }
}

// Client code
$paymentContext = new PaymentContext();

// Pay using PayPal
$paymentContext->setStrategy(new PayPalStrategy("user@example.com", "password123"));
$paymentContext->executeStrategy(150);

// Pay using Credit Card
$paymentContext->setStrategy(new CreditCardStrategy("John Doe", "1234567890123456", "123", "12/23"));
$paymentContext->executeStrategy(200);

// Pay using Bank Transfer
$paymentContext->setStrategy(new BankTransferStrategy("9876543210", "1101"));
$paymentContext->executeStrategy(300);
