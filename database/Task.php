<?php 
require_once ('Connect.php');

class Task extends Connect {
    protected $sql;
    protected $result;

    public function InsertTask($classId, $taskName, $taskDesc, $startDate, $dueDate, $attachment) {
        $this->sql = "INSERT INTO tasks (ClassId, TaskName, TaskDesc, StartDate, DueDate, Attachment) 
        VALUES ('$classId','$taskName','$taskDesc','$startDate','$dueDate','$attachment')";
        return $this-> getResult();
    }

    public function ShowTask($classId) {
        $this->sql = "SELECT * FROM tasks WHERE ClassId = '$classId'";
        return $this-> getResult();
    }

    public function EditTask($taskId, $classId, $taskName, $taskDesc, $startDate, $dueDate, $attachment) {
        $this->sql = "UPDATE tasks SET TaskName='$taskName', TaskDesc='$taskDesc', 
        StartDate='$startDate', DueDate='$dueDate', Attachment='$attachment' WHERE TaskId=$taskId";
        return $this->getResult();
    }

    public function DeleteTask($taskId) {
        $this->sql = "DELETE FROM tasks WHERE TaskId=$taskId";
        return $this->getResult();
    }

    public function ShowTaskSubmit($taskId) {
        $this->sql = "SELECT users.Username, task_submits.Answers, task_submits.Status
        FROM task_submits
        INNER JOIN users ON task_submits.UserId = users.UserId
        WHERE task_submits.TaskId = '$taskId'";
        return $this->getResult();
    }

    public function getResult() {
        $this->result = $this->dbConn()->query($this->sql);
        return $this;
    }

    public function FetchArray() {
        $row = $this->result->fetch_array();
        return $row;
    }
}
?>