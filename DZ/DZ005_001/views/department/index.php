<p>Here is a list of all departments:</p>

<?php foreach($departments as $department) { ?>
  <p>
    <?php echo $department->department_id ." ".$department->name  ?>
    <a href='?controller=department&action=show&id=<?php echo $department->department_id; ?>'>See content</a>
  </p>
<?php } ?>