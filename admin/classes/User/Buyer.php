<?php

namespace Emall\User;
use PDO;
use Emall\Database\Database;

class Buyer
{

  private $conn;

  public function __construct()
  {
    $this->conn = Database::getInstance();
	}


  public function viewDataBuyer()
  {
    try {
        $user = $this->conn;
        $user->setTable('buyer');
        $result = $user->select()->all();

        return $result;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function viewDataBuyerDetails($buyerID)
  {
    try {
        $user = $this->conn;
        $user->setTable('buyer');
        $result = $user->select('buyerID, firstName, lastName, username, email, address, telpNumber, city, districts, status,update_at, create_at')->where('buyerID','=', $buyerID)->first();

        return $result;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function ViewDataStatus($buyerID)
  {
    try {
        $user = $this->conn;
        $user->setTable('buyer');
        $result = $user->select()->where('buyerID','=', $buyerID)->first();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function UpdateDataStatus($buyerID, $status)
  {
    try {
        $user = $this->conn;
        $user->setTable('buyer');
        $result = $user->where('buyerID','=', $buyerID)->update([
          'status' => $status
        ]);

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

}
 ?>
