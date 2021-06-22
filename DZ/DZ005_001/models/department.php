<?php
  class Department {
    // we define 3 attributes
    // they are public so that we can access them using $department->author directly
    public $department_id;
    public $name;
    public $group_name;

    public function __construct($department_id, $name, $group_name) {
      $this->department_id = $department_id;
      $this->name  = $name;
      $this->group_name = $group_name;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM department');

      // we create a list of department objects from the database results
      foreach($req->fetchAll() as $department) {
        $list[] = new Department($department['DepartmentID'], $department['Name'], $department['GroupName']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM department WHERE DepartmentID = :id');
      // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
      $department = $req->fetch();

      return new Department($department['DepartmentID'], $department['Name'], $department['GroupName']);
    }
  }
?>