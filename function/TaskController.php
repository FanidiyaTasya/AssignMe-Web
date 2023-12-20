<?php
require_once __DIR__ . '/../database/Task.php';

class TaskController extends Task {
    protected $message;
    
    public function createTask($classId, $taskName, $taskDesc, $startDate, $dueDate, $attachment) {
        $uploadDir = '../upload/file/';
        $uniqueName = uniqid() . '_' . basename($attachment['name']);
        $uploadedFile = $uploadDir . $uniqueName;
    
        if (empty($attachment['name'])) {
            $result = $this->InsertTask($classId, $taskName, $taskDesc, $startDate, $dueDate, null);
        } else {
            if (!$this->validateFile($attachment['name'], $attachment['size'], $attachment['type'])) {
                return;
            }
            $result = $this->InsertTask($classId, $taskName, $taskDesc, $startDate, $dueDate, $uniqueName);
            if ($result) {
                move_uploaded_file($attachment['tmp_name'], $uploadedFile);

            }
        }
    
        if ($result) {
            $_SESSION['message'] = 'Successfully created the assignment.';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Failed to create the assignment.';
            $_SESSION['message_type'] = 'error';
    
            if (!empty($attachment['name']) && !move_uploaded_file($attachment['tmp_name'], $uploadedFile)) {
                echo "Error uploading file: " . error_get_last()['message'] . "\n";
                $_SESSION['message'] = 'Failed to upload file: ' . error_get_last()['message'];
            }
        }
    }

    public function GetTaskId() {
        $this->sql = "SELECT MAX(TaskId) FROM tasks";
        $result = $this->getResult();
        $taskId = $result->FetchArray()['MAX(TaskId)'];
        return $taskId;
    }    

    public function InsertToDo($taskId, $userId, $answer) {
        $this->sql = "INSERT INTO task_submits (TaskId, UserId, Answers, Status) VALUES ('$taskId', '$userId', '$answer', 'To-Do')";
        $result = $this->getResult();
    }

    public function GetSiswa($classId) { 
        $this->sql = "SELECT users.Username, user_classes.UserId
        FROM users
        JOIN user_classes ON users.UserId = user_classes.UserId
        WHERE user_classes.ClassId = $classId AND users.Role = 'Siswa'";
        $result = $this->getResult();
        if ($result) {
            $userIds = $result->FetchAll(MYSQLI_ASSOC);
            return $userIds;
        } else {
            return null;
        }
    }
  
    public function hapusFile($taskId) {
        try {
            $showTask = $this->ShowTask($taskId, null); 
            if ($showTask) {
                $row = $showTask->FetchArray(); 
                $attachment = $row['Attachment'];

                $uploadDir = '../upload/file/';
                $uploadedFile = $uploadDir . $attachment;

                if (file_exists($uploadedFile)) {
                    unlink($uploadedFile);
                    echo "Old file deleted successfully.";
                } else {
                    echo "Old file not found for TaskId: $taskId";
                }
            } else {
                echo "Task not found.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function editTask($taskId, $taskName, $taskDesc, $dueDate, $attachment) {
        try {
            $result = $this->UpdateTask($taskId, $taskName, $taskDesc, $dueDate, $attachment);
            
            if ($result) {
                $_SESSION['message'] = 'Task updated successfully!';
                $_SESSION['message_type'] = 'success';
            } else {
                $_SESSION['message'] = 'Failed to update task.';
                $_SESSION['message_type'] = 'error';
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
  
    public function hapusTugas($taskId) {
        try {
            $showTask = $this->ShowTask($taskId, null); 
            if ($showTask) {
                $row = $showTask->FetchArray(); 
                $taskId = $row['TaskId'];
                $attachment = $row['Attachment']; 
    
                $uploadDir = '../upload/file/';
                $uploadedFile = $uploadDir . $attachment;
                if (!empty($attachment) && file_exists($uploadedFile)) {
                    unlink($uploadedFile); 
                }
                $result = $this->DeleteTask($taskId);
    
                if ($result) {
                    $_SESSION['message'] = 'Successfully deleted this task.';
                    $_SESSION['message_type'] = 'success';
                } else {
                    $_SESSION['message'] = 'Failed to delete this task from the database.';
                    $_SESSION['message_type'] = 'error';
                }
            } else {
                $_SESSION['message'] = 'Task not found.';
                $_SESSION['message_type'] = 'info';
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    

    public function validateFile($fileName, $fileSize, $fileType) {
        if (empty($fileName)) {
            return true;
        }
    
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
    
    public function getTask($taskId, $classId) { // untuk tampil di classwork
        $result = $this->ShowTask($taskId, $classId);
        return $result;
    }

    public function getToReview($userId) { 
        $result = $this->ShowReview($userId);
        return $result;
    }

    public function getDone($userId) { 
        $result = $this->ShowDone($userId);
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
        $result = $this->ShowTaskSubmit($taskId);
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
                return '';
        }
    }

    public function getMessage() {
        return $this->message;
    }
}