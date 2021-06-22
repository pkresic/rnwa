<?php
  class PagesController {
    public function home() {
      $first_name = 'Petra';
      $last_name  = 'Krešić';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>