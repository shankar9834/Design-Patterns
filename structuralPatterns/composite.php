<?php

abstract class FileSystemComponent {
    public abstract function display();
}

class File extends FileSystemComponent {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function display() {
        echo "File: " . $this->name . "\n";
    }
}

class DirectoryM extends FileSystemComponent {
    private $name;
    private $children = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function add(FileSystemComponent $component) {
        $this->children[] = $component;
    }

    public function remove(FileSystemComponent $component) {
        $this->children = array_filter($this->children, function($child) use ($component) {
            return $child !== $component;
        });
    }

    public function display() {
        echo "Directory: " . $this->name . "\n";
        foreach ($this->children as $child) {
            $child->display();
        }
    }
}

$file1 = new File("file1.txt");
$file2 = new File("file2.txt");

$directory = new DirectoryM("myDirectory");
$directory->add($file1);
$directory->add($file2);

$root = new DirectoryM("rootDirectory");
$root->add($directory);

$root->display();