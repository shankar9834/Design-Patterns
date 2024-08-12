<?php
interface Prototype
{
    public function __clone();
}

class BookPrototype implements Prototype
{
    public $title;
    public $author;

    public function __construct(string $title, string $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    public function __clone()
    {
        // Clone the object properties (handle complex objects if needed)
        return new BookPrototype($this->title, $this->author);
    }
}

$book1 = new BookPrototype("The Lord of the Rings", "J.R.R. Tolkien");

$book2 = clone $book1; // Create a copy of book1
$book2->title = "The Hobbit"; // Modify the copy

echo "Book 1: " . $book1->title . " by " . $book1->author . PHP_EOL;
echo "Book 2: " . $book2->title . " by " . $book2->author . PHP_EOL;
