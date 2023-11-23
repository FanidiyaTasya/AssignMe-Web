<?php
require_once __DIR__ . ('/../database/Classes.php');

class ClassController extends Classes {
    protected $message;

    public function createClass($className, $subject, $desc, $userId) {
        try {
            if ($this->isClassExists($className, $subject)) {
                echo "Kelas ini sudah tersedia.";
                return;
            }
    
            $classCode = $this->ClassCode(6);
            $result = $this->InsertClass($className, $subject, $desc, $classCode);
    
            if ($result) {
                $classId = $this->getClassId($className, $subject);
    
                if ($classId) {
                    $this->InsertUserClasses($userId, $classId);
                    echo "Class created successfully.";
                } else {
                    throw new Exception("Error getting classId.");
                }
            } else {
                throw new Exception("Error creating class.");
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function editClass($classId, $className, $subject, $desc) {
        try {
            if ($this->isClassExists($className, $subject)) {
                echo "Kelas ini sudah tersedia.";
                return;
            }
            $result = $this->UpdateClass($classId, $className, $subject, $desc);
            if ($result) {
                echo 'Berhasil edit kelas';
            } else {
                echo 'Gagal edit kelas.';
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
    }
    
    public function hapusClass($classId, $userId) {
        if (empty($classId) || empty($userId)) {
            echo 'Missing userId or classId.';
            return;
        }
        $result = $this->DeleteClass($classId, $userId);
        if ($result) {
            echo 'Berhasil hapus kelas';
        } else {
            echo 'Gagal hapus kelas.';
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

    public function getClasses($userId) { // dashboard
        $classes = $this->ShowClass($userId);
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

    public function getClassId($className, $subject) { // getClassId -> userclasses
        $this->sql = "SELECT ClassId FROM classes WHERE ClassName = '$className' AND SubjectName = '$subject'";
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