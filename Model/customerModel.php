<?php
  require_once "dataBase.php";
  
  class customerModel extends dataBase {

    // recupere tous les utilisateurs
    public function getCustomers() {
      $response=$this->db->query("SELECT * FROM customer");
      $result = $response->fetchAll(PDO :: FETCH_ASSOC);
      foreach($result as $key=>$customer){
        $result[$key] = new Customer($customer);
      }
      return $result;
    }

    // recupere tous les utilisateurs par id
    public function getCustomerById(int $id) {
      $query=$this->db->prepare("SELECT * FROM customer WHERE id=:id");
      $query->execute([
        "id"=>$id
      ]);
      $result=$query->fetch(PDO::FETCH_ASSOC);
      $result= new Customer($result);
      return $result;
    }

    // recupere tous les utilisateurs par numero personnel
    public function getCustomer() {

    }
  }

?>
