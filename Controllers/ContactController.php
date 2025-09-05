<?php
session_start();
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Contact.php';

class ContactController {
    private $db;
    private $contact;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->contact = new Contact($this->db);
    }

    public function create($user_id, $name, $email, $phone, $notes) {
        $this->contact->user_id = $user_id;
        $this->contact->name = $name;
        $this->contact->email = $email;
        $this->contact->phone = $phone;
        $this->contact->notes = $notes;
        return $this->contact->create();
    }

    public function getAll($user_id) {
        return $this->contact->readAll($user_id);
    }

    public function getOne($id) {
        $this->contact->id = $id;
        return $this->contact->readOne();
    }

    public function update($id, $name, $email, $phone, $notes) {
        $this->contact->id = $id;
        $this->contact->name = $name;
        $this->contact->email = $email;
        $this->contact->phone = $phone;
        $this->contact->notes = $notes;
        return $this->contact->update();
    }

    public function delete($id) {
        $this->contact->id = $id;
        return $this->contact->delete();
    }
}
