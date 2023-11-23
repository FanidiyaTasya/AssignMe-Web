<?php
require_once __DIR__ . ('/../database/Task.php');

class TaskController extends Task {
    protected $message;

    public function createTask($classId, $taskName, $taskDesc, $startDate, $dueDate, $attachment) {
        $uploadDir = 'C:\xampp\htdocs\AssignMe\upload\file';
        $uploadedFile = $uploadDir . '\\' . basename($attachment['name']);
    
        if (move_uploaded_file($attachment['tmp_name'], $uploadedFile)) {
            $result = $this->InsertTask($classId, $taskName, $taskDesc, $startDate, $dueDate, $attachment['name']);
    
            if ($result) {
                echo "Success";
            } else {
                echo "Failed";
            }
        } else {
            echo "Gagal mengunggah file. Pesan kesalahan: " . error_get_last()['message'];
            return "Gagal mengunggah file.";
        }
    }

    public function validateFile($fileName, $fileSize, $fileType) {
        $maxFileSize = 5242880; // 5 mb max
        $allowedFileTypes = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'jpg', 'jpeg', 'png'];

        if ($fileSize > $maxFileSize) {
            echo "Ukuran file melebihi batas maksimal (5 MB). ";
            return false;
        }

        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        if (!in_array(strtolower($fileExtension), $allowedFileTypes)) {
            echo "Jenis file tidak diizinkan. ";
            return false;
        }
        return true; 
    }

    public function getTask($classId) { 
        $result = $this->ShowTask($classId);
        return $result;
    }

    public function showTaskSubmit($taskId) {
        $result = $this->showTaskSubmit($taskId);
        return $result;
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