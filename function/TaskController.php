<?php
require_once __DIR__ . ('/../database/Task.php');

class TaskController extends Task {
    protected $message;

    public function createTask($classId, $taskName, $taskDesc, $startDate, $dueDate, $attachment) {
        if (!$this->validateFile($attachment['name'], $attachment['size'], $attachment['type'])) {
            return;
        }
        $uploadDir = '../upload/file/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $uniqueName = uniqid() . '_' . basename($_FILES['attachment']['name']);
        $uploadedFile = $uploadDir . $uniqueName;
            if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadedFile)) {
                $result = $this->InsertTask($classId, $taskName, $taskDesc, $startDate, $dueDate, $uniqueName);

                if ($result) {
                    $_SESSION['message'] = 'Successfully created the assignment.';
                    $_SESSION['message_type'] = 'success';
                } else {
                    $_SESSION['message'] = 'Failed to save data to the database.';
                    $_SESSION['message_type'] = 'error';
                }
            } else {
                $_SESSION['message'] = 'Failed upload file: ' . error_get_last()['message'];
                $_SESSION['message_type'] = 'error';
            }
        }

    public function editTask() {

    }

    public function validateFile($fileName, $fileSize, $fileType) {
        $maxFileSize = 5242880; // 5 mb max
        $allowedFileTypes = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'jpg', 'jpeg', 'png'];

        if ($fileSize > $maxFileSize) {
            $_SESSION['message'] = 'The selected file exceeds the maximum allowed size of 5MB. Please choose a smaller file.';
            $_SESSION['message_type'] = 'info';
            return false;
        }

        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        if (!in_array(strtolower($fileExtension), $allowedFileTypes)) {
            $_SESSION['message'] = 'The selected file type is not allowed. Please choose a valid file type.';
            $_SESSION['message_type'] = 'info';
            return false;
        }
        return true; 
    }

    public function getTask($taskId, $classId) { // untuk task view
        $result = $this->ShowTask($taskId, $classId);
        return $result;
    }

    public function getAllTask() { 
        $result = $this->ShowAllTask();
        return $result;
    }

    public function saveGrade($taskId, $userId, $grade) {
        $checkData = $this->CekData($taskId, $userId);
    
        if ($checkData) {
            $this->UpdateGrade($grade, $taskId, $userId);
            $_SESSION['message'] = 'Successfully updated.';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Failed to update.';
            $_SESSION['message_type'] = 'error';
        }
    }    

    public function getTaskSubmit($taskId) {
        $result = $this->showTaskSubmit($taskId);
        return $result->getResult();
    }

    public function detailTask($taskId) { // untuk preview task
        $this->sql = "SELECT * FROM task WHERE TaskId = $taskId"; 
        $result = $this->getResult();

        if ($result) {
            $row = $result->FetchArray();
            return $row;
        }
    }  

    public function getMessage() {
        return $this->message;
    }
}