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
        ->select('courses.subject_id, courses.name, questions.id, questions.question, questions.a, questions.b, questions.c, questions.d, questions.answer')
        ->where('courses.tutors_id','=', $tutors_id)
        ->all();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function EditDataQuiz($id)
  {
    try {
        $user = $this->conn;
        $user->setTable('questions');
        $result = $user->select()->where('id','=',$id)->first();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function UpdateDataQuestion($question, $answer_a, $answer_b, $answer_c, $answer_d, $answer, $id)
  {
    try {
        $user = $this->conn;
        $user->setTable('questions');
        $result = $user->where('id','=',$id)->update([
          'question'    => $question,
          'a'           => $answer_a,
          'b'           => $answer_b,
          'c'           => $answer_c,
          'd'           => $answer_d,
          'answer'      => $answer
        ]);

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function DeleteDataQuiz($id)
  {
    try {
        $user = $this->conn;
        $user->setTable('questions');
        $result = $user->where('id','=',$id)->delete();

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }



}
 ?>
