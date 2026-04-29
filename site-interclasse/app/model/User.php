<?php

class User {
    private int $id;
    private string $name;
    private string $email;
    private string $password;

    public function __construct(string $name, string $email, string $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    // TODO: implement these
    public function create() {

    }

    public function delete() {

    }

    public function update() {
        
    }

    public function list_all() {

    }

    public function get(int $id) {

    }
}