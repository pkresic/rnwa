<?php
  class AddressController {
    public function index() {
      // we store all the posts in a variable
      $addresses = Address::all();
      require_once('views/address/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $address = Address::find($_GET['id']);
      require_once('views/address/show.php');
    }
	public function deleteaddress() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $address = Address::deleteaddress($_GET['id']);
      require_once('views/address/delete.php');
    }
  }
?>