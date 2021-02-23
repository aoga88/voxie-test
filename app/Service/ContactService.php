<?php
namespace App\Service;

use App\Contact;

class ContactService {

    public function findContacts() {
        return Contact::query()->orderBy('id')->get();
    }

    public function create($name, $email) {
        $contact = new Contact();
        $contact->name = $name;
        $contact->email = $email;
        $contact->save();

        return $contact;
    }

    public function remove($id) {
        Contact::query()->where('id', $id)->delete();
    }

}
