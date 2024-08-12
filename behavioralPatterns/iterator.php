<?php 
// Step 1: Implement a simple iterator class
class MyIterator implements Iterator {
    private $position = 0;
    private $array = ['one', 'two', 'three'];

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->array[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->array[$this->position]);
    }
}

// Step 2: Use the iterator
$iterator = new MyIterator();

while ($iterator->valid()) {
    echo "Value: " . $iterator->current() . "\n";
    $iterator->next();
}
