<?php

class Contact
{
    // we define 3 attributes
    // they are public so that we can access them using $contact->author directly
    public $contact_id;
    public $first_name;
    public $last_name;
    public $middle_name;
    public $email;
    public $title;
    public $phone;

    public function __construct($contact_id, $first_name, $last_name, $middle_name, $email, $title, $phone)
    {
        $this->contact_id = $contact_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->middle_name = $middle_name;
        $this->email = $email;
        $this->title = $title;
        $this->phone = $phone;
    }

    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM contact');


        // we create a list of Contact objects from the database results
        foreach ($req->fetchAll() as $contact) {
            $list[] = new Contact(
                $contact['ContactID'],
                $contact['FirstName'],
                $contact['LastName'],
                $contact['MiddleName'],
                $contact['EmailAddress'],
                $contact['Title'],
                $contact['Phone']
            );
        }

        return $list;
    }

    public static function find($id)
    {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM contact WHERE ContactID = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $contact = $req->fetch();

        return new Contact(
            $contact['ContactID'],
            $contact['FirstName'],
            $contact['LastName'],
            $contact['MiddleName'],
            $contact['EmailAddress'],
            $contact['Title'],
            $contact['Phone']
        );;
    }
}

?>