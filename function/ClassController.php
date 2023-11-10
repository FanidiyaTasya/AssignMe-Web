<?php
require_once __DIR__ . ('/../database/Classes.php');

class ClassController extends Classes {
    protected $message;

    public function createClass($className, $subject, $desc, $userId) {
        $classCode = $this->ClassCode(6);
        $result = $this->InsertClass($className, $subject, $desc, $classCode, $userId);
    
        if ($result) {
            $classId = $this->getClassId($className, $subject, $userId);
    
            if ($classId) {
                $role = 'Guru';
                $this->InsertUserClasses($userId, $classId, $role);
                // echo "Class created successfully.";
                // header('Location: Dashboard.php');
            } else {
                echo "Error getting classId.";
            }
        } else {
            echo "Error creating class.";
        }
    }

    public function editClass() {
        $result = $this->UpdateClass($classId, $className, $subject, $desc);
        if ($result) {
            header('Location: Dashboard.php');
            exit();
        } else {
            echo 'Gagal edit kelas.';
        }
    }
    
    public function ClassCode($length = 6) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $classCode = '';
        $max = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $randomChar = $characters[rand(0, $max)];
            $classCode .= $randomChar;
        }
        return $classCode;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getClasses() { // dashboard
        $classes = $this->ShowClass();
        return $classes;
    }

    public function detailClasses($classId) { // class
        $this->sql = "SELECT * FROM classes WHERE ClassId = $classId"; 
        $result = $this->getResult();

        if ($result) {
            $row = $result->FetchArray();
            return $row;
        }
    }  

    public function getClassId($className, $subject, $userId) { // userclasses
        $this->sql = "SELECT ClassId FROM classes WHERE ClassName = '$className' AND SubjectName = '$subject' AND UserId = '$userId'";
        $result = $this->getResult();
    
        if ($result) {
            $row = $result->FetchArray();
            return $row['ClassId'];
        } else {
            return null;
        }
    }   

}

?>