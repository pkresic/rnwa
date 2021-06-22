<p>This is detailed view of CONTACT:</p>

<p>ID: <b><?= $contact->contact_id; ?></b></p>
<p>
    Name: <?= $contact->title; ?> <?= $contact->first_name; ?><?= $contact->middle_name ? ' ' . $contact->middle_name : ''; ?> <?= $contact->last_name; ?></p>
<p>Email: <?= $contact->email ?></p>
<p>Phone: <?= $contact->phone ?></p>