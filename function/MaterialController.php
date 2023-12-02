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
    
    public function editMateri($materialId, $materialName, $materialDesc, $attachment) {
        try {
            $result = $this->UpdateMateri($materialId, $materialName, $materialDesc, $attachment);
            
            if ($result) {
                $_SESSION['message'] = 'Material updated successfully!';
                $_SESSION['message_type'] = 'success';
            } else {
                $_SESSION['message'] = 'Failed to update material.';
                $_SESSION['message_type'] = 'error';
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function hapusMateri($materialId) {
        try {
            $showMateri = $this->ShowMateri($materialId, null); 
            if ($showMateri) {
                $row = $showMateri->FetchArray(); 
                $materialId = $row['MaterialId'];
                $attachment = $row['Attachment']; 
    
                $uploadDir = '../upload/file/';
                $uploadedFile = $uploadDir . $attachment;
                if (!empty($attachment) && file_exists($uploadedFile)) {
                    unlink($uploadedFile); 
                }
                $result = $this->DeleteMateri($materialId);
    
                if ($result) {
                    $_SESSION['message'] = 'Successfully deleted this material.';
                    $_SESSION['message_type'] = 'success';
                } else {
                    $_SESSION['message'] = 'Failed to delete this material from the database.';
                    $_SESSION['message_type'] = 'error';
                }
            } else {
                $_SESSION['message'] = 'Material not found.';
                $_SESSION['message_type'] = 'info';
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getMateri($materialId, $classId) { 
        $result = $this->ShowMateri($materialId, $classId);
        return $result;
    }

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

    function getFileIcon($fileExtension) {
        $iconPath = '../assets/img/file-type/';
        
        switch ($fileExtension) {
            case 'pdf':
                return $iconPath . 'pdf.png';
            case 'doc':
            case 'docx':
                return $iconPath . 'doc.png';
            case 'ppt':
            case 'pptx':
                return $iconPath . 'ppt.png';
            case 'jpg':
                return $iconPath . 'jpg.png';
            case 'jpeg':
                return $iconPath . 'jpeg.png';
            case 'png':
                return $iconPath . 'png.png';
            
            default:
                return $iconPath . 'default-file.png';
        }
    }

    public function getMessage() {
        return $this->message;
    }
}