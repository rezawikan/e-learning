<?php

namespace Elearn\Quiz;
use PDO;
use DateTime;
use Elearn\Database\Database;

class Quiz
{

  private $conn;

  public function __construct()
  {
    $this->conn = Database::getInstance();
	}


  public function createDataQuestion($question, $answer_a, $answer_b, $answer_c, $answer_d, $answer, $courses_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('questions');
        $result = $user->create([
          'question'    => $question,
          'a'           => $answer_a,
          'b'           => $answer_b,
          'c'           => $answer_c,
          'd'           => $answer_d,
          'answer'      => $answer,
          'courses_id'  => $courses_id
        ]);

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function ViewDataQuiz($tutors_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->join('questions','courses.id','=','questions.courses_id')
        ->select()
        ->where('courses.tutors_id','=', $tutors_id)
        ->all();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }





}
 ?>
