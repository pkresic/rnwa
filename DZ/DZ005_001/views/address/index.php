<p>Here is a list of all ADDRESSes:</p>

<?php foreach($addresses as $address) { ?>
  <p>
    <?php echo $address->address_id ." ".$address->address  ?>
      <a href='?controller=address&action=show&id=<?php echo $address->address_id; ?>'>Details</a>
      <a href='?controller=address&action=deleteaddress&id=<?php echo $address->AddressID; ?>'>DELETE ADDRESS</a>
  </p>
<?php } ?>