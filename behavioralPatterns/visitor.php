<?php
interface Visitor {
    public function visitBook(Book $book);
    public function visitDVD(DVD $dvd);
}

class PriceVisitor implements Visitor {
    private $totalPrice = 0;

    public function visitBook(Book $book) {
        $this->totalPrice += $book->getPrice();
    }

    public function visitDVD(DVD $dvd) {
        $this->totalPrice += $dvd->getPrice();
    }

    public function getTotalPrice() {
        return $this->totalPrice;
    }
}

interface Element {
    public function accept(Visitor $visitor);
}

class Book implements Element {
    private $price;

    public function __construct($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function accept(Visitor $visitor) {
        $visitor->visitBook($this);
    }
}

class DVD implements Element {
    private $price;

    public function __construct($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function accept(Visitor $visitor) {
        $visitor->visitDVD($this);
    }
}

$elements = [
    new Book(10),
    new DVD(20),
    new Book(15),
    new DVD(25)
];

$visitor = new PriceVisitor();

foreach ($elements as $element) {
    $element->accept($visitor);
}

echo "Total Price: " . $visitor->getTotalPrice(). "\n";
