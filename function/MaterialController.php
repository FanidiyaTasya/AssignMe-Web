<?php
require_once __DIR__ . ('/../database/Materials.php');

class MaterialController extends Materials {
    protected $message;

    public function createMateri($classId, $materialName, $materialDesc, $uploadDate, $attachment) {
        $uploadDir = 'C:\xampp\htdocs\AssignMe\upload\file';
        $uploadedFile = $uploadDir . '\\' . basename($attachment['name']);

        if (move_uploaded_file($attachment['tmp_name'], $uploadedFile)) {
            $result = $this->InsertMateri($classId, $materialName, $materialDesc, $uploadDate, $attachment['name']);
            
            if ($result) {
                echo "Success";
            } else {
                echo "Failed";
            }
        } else {
            echo "Gagal upload file.";
        }
    }

    public function validateFile($fileName, $fileSize, $fileType) {
        $maxFileSize = 5242880; // 5 mb max
        $allowedFileTypes = ['pdf', 'doc', 'docx', 'ppt', 'pptx'];

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

    public function getMateri($classId) { 
        $task = $this->ShowMateri($classId);
        return $task;
    }

    public function getMessage() {
        return $this->message;
    }
}