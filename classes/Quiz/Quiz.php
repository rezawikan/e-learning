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


  public function ViewDataTutorsID($student_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->join('assignment','courses.id','=','assignment.id_courses')
        ->join('enrollments','courses.id','=','enrollments.courses_id')
        ->join('student_data','enrollments.student_data_id','=','student_data.id')
        ->where('student_data.quiz','=', 0)
        ->where('enrollments.student_id','=', $student_id)
        ->select('courses.subject_id, courses.id, enrollments.student_data_id','DISTINCT')
        ->all();

        echo json_encode($result);

    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function ViewDataQuiz($courses_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('questions');
        $result = $user->select()->where('courses_id','=', $courses_id)->all();

        return $result;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function AddQuizScore($student_data_id, $score)
  {
    try {
        $user = $this->conn;
        $user->setTable('student_data');
        $result = $user->where('id','=', $student_data_id)->update([
          'quiz' => $score
        ]);

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function getStudentDataID($student_id, $courses_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('enrollments');
        $result = $user->select()->where('student_id','=', $student_id)->where('courses_id','=', $courses_id)->first();
        return $result->student_data_id;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

}
 ?>
