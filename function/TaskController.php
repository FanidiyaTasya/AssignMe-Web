<?php
require_once __DIR__ . ('/../database/Task.php');

class TaskController extends Task {
    protected $message;

    public function createTask($classId, $taskName, $taskDesc, $startDate, $dueDate, $attachment) {
        $result = $this->insertTask($classId, $taskName, $taskDesc, $startDate, $dueDate, $attachment);

        if ($result) {
            echo "Success";
        } else {
            echo "Failed";
        }
    }

    public function getTask($classId) { 
        $task = $this->ShowTask($classId);
        return $task;
    }

    public function detailTask($taskId) { 
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