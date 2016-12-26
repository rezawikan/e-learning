<?php

namespace Emall\User;
use PDO;
use Emall\Database\Database;

class Seller
{

  private $conn;

  public function __construct()
  {
    $this->conn = Database::getInstance();
	}


  public function viewDataSeller()
  {
    try {
        $user = $this->conn;
        $user->setTable('seller');
        $result = $user->select()->all();

        return $result;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function viewDataSellerDetails($sellerID)
  {
    try {
        $user = $this->conn;
        $user->setTable('seller');
        $result = $user->select('sellerID, firstName, lastName, username, email, address, telpNumber, city, districts, status,update_at, create_at')->where('sellerID','=', $sellerID)->first();

        return $result;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function ViewDataStatus($sellerID)
  {
    try {
        $user = $this->conn;
        $user->setTable('seller');
        $result = $user->select()->where('sellerID','=', $sellerID)->first();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function UpdateDataStatus($sellerID, $status)
  {
    try {
        $user = $this->conn;
        $user->setTable('seller');
        $result = $user->where('sellerID','=', $sellerID)->update([
          'status' => $status
        ]);

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

}
 ?>
