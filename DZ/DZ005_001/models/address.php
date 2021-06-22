<?php
  class Address  {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $address_id;
    public $address;
    public $city;
    public $postal_code;


    public function __construct($address_id, $address, $city, $postal_code) {
      $this->address_id = $address_id;
      $this->address  = $address;
      $this->city  = $city;
      $this->postal_code  = $postal_code;

    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM address');


      // we create a list of Address objects from the database results
      foreach($req->fetchAll() as $address) {
        $list[] = new Address($address['AddressID'], $address['AddressLine1'], $address['City'], $address['PostalCode']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM address WHERE AddressID = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $address = $req->fetch();

      return new Address($address['AddressID'], $address['AddressLine1'], $address['City'], $address['PostalCode']);
    }
	
	public static function deleteaddress($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      //$id = intval($id);
	  $sql="DELETE FROM address WHERE AddressID ='$id'";
	  //echo $sql;
	  
      //$req = $db->prepare($sql);
      // the query was prepared, now we replace :id with our actual $id value
      //if ($req->execute(array('id' => $id))){
		  //$req=$r->execute($sql);
	if ($db->query($sql) == TRUE){
	//if (1==2){
		  $rez="USPJESNO brisanje";
	  }
		  else {
			 $rez="NESPJESNO brisanje";;
		  }
		  return $rez;
	  
}
  }
?>