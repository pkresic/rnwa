<p>Here is a list of all CONTACTs:</p>

<?php foreach($contacts as $contact) { ?>
  <p>
    <?php echo $contact->first_name ." ".$contact->last_name  ?>
    <a href='?controller=contact&action=show&id=<?php echo $contact->contact_id; ?>'>Details</a>
  </p>
<?php } ?>