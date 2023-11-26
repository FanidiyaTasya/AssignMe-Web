<?php
require_once __DIR__ . ('/../database/Task.php');

class TaskController extends Task {
    protected $message;

    public function createTask($classId, $taskName, $taskDesc, $startDate, $dueDate, $attachment) {
        // $uploadDir = 'C:\xampp\htdocs\AssignMe\upload\file';
        // $uploadedFile = $uploadDir . '\\' . basename($attachment['name']);
        $uploadDir = 'upload/file';
        $uploadedFile = $uploadDir . '/' . uniqid() .basename($attachment['name']);
    
        if (move_uploaded_file($attachment['tmp_name'], $uploadedFile)) {
            $result = $this->InsertTask($classId, $taskName, $taskDesc, $startDate, $dueDate, $attachment['name']);
    
            if ($result) {
                $_SESSION['message'] = 'Success.';
                $_SESSION['message_type'] = 'success';
            } else {
                $_SESSION['message'] = 'Failed.';
                $_SESSION['message_type'] = 'error';
            }
        } else {
            $_SESSION['message'] = 'Failed upload file: ' . error_get_last()['message'];
            $_SESSION['message_type'] = 'error';
        }
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

    public function getTask($classId) { 
        $result = $this->ShowTask($classId);
        return $result;
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