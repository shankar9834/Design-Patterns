<?php
interface Handler {
    public function handleRequest($request);
}

class AdminHandler implements Handler {
    public function handleRequest($request) {
        if ($request->getUserRole() == 'admin') {
            echo "Admin can handle this request.\n";
        } else {
            echo "Admin cannot handle this request. Passing to next handler...\n";
        }
    }
}

class DeveloperHandler implements Handler {
    public function handleRequest($request) {
        if ($request->getUserRole() == 'developer') {
            echo "Developer can handle this request.\n";
        } else {
            echo "Developer cannot handle this request. Passing to next handler...\n";
        }
    }
}

class UserHandler implements Handler {
    public function handleRequest($request) {
        if ($request->getUserRole() == 'user') {
            echo "User can handle this request.\n";
        } else {
            echo "No handler available for this request.\n";
        }
    }
}

class Request {
    private $userRole;

    public function __construct($userRole) {
        $this->userRole = $userRole;
    }

    public function getUserRole() {
        return $this->userRole;
    }
}


// Client code
$adminHandler = new AdminHandler();
$developerHandler = new DeveloperHandler();
$userHandler = new UserHandler();

// Set up the chain of responsibility
$adminHandler->handleRequest(new Request('admin'));
$developerHandler->handleRequest(new Request('developer'));
$userHandler->handleRequest(new Request('user'));
$userHandler->handleRequest(new Request('guest'));
