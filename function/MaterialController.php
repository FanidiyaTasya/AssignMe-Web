<?php
require_once __DIR__ . ('/../database/Materials.php');

class MaterialController extends Materials {
    protected $message;

    public function createMateri($classId, $materialName, $materialDesc, $uploadDate, $attachment) {
        if (!$this->validateFile($attachment['name'], $attachment['size'], $attachment['type'])) {
            return;
        }
        $uploadDir = '../upload/file/';
        $uniqueName = uniqid() . '_' . basename($_FILES['attachment']['name']);
        $uploadedFile = $uploadDir . $uniqueName;
        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadedFile)) {
            $result = $this->InsertMateri($classId, $materialName, $materialDesc, $uploadDate, $uniqueName);
    
            if ($result) {
                $_SESSION['message'] = 'Successfully uploaded material.';
                $_SESSION['message_type'] = 'success';
            } else {
                $_SESSION['message'] = 'Failed to save data to the database.';
                $_SESSION['message_type'] = 'error';
            }
        } else {
            $_SESSION['message'] = 'Failed to upload file.';
            $_SESSION['message_type'] = 'error';
        }
    }
    
    // public function editMateri() {

    // }

    public function validateFile($fileName, $fileSize, $fileType) {
        $maxFileSize = 5242880; // 5 mb max
        $allowedFileTypes = ['pdf', 'doc', 'docx', 'ppt', 'pptx'];

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

    public function getMateri($classId) { 
        $task = $this->ShowMateri($classId);
        return $task;
    }

    public function getMessage() {
        return $this->message;
    }
}