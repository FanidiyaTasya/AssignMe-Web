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

    public function ShowTask($taskId, $classId) {
        $this->sql = "SELECT * 
        FROM tasks 
        JOIN classes ON tasks.ClassId = classes.ClassId
        WHERE tasks.ClassId = '$classId'  OR tasks.TaskId = '$taskId'";
        return $this-> getResult();
    }

    public function UpdateTask($taskId, $classId, $taskName, $taskDesc, $startDate, $dueDate, $attachment) {
        $this->sql = "UPDATE tasks SET TaskName='$taskName', TaskDesc='$taskDesc', 
        StartDate='$startDate', DueDate='$dueDate', Attachment='$attachment' WHERE TaskId=$taskId";
        return $this->getResult();
    }

    public function DeleteTask($taskId) {
        $this->sql = "DELETE FROM tasks WHERE TaskId=$taskId";
        return $this->getResult();
    }

    public function ShowTaskSubmit($taskId) {
        $this->sql = "SELECT users.Username, task_submits.Answers, task_submits.Status, task_submits.Grade
        FROM task_submits
        INNER JOIN users ON task_submits.UserId = users.UserId
        WHERE task_submits.TaskId = $taskId
        ORDER BY task_submits.SubmitDate ASC";
        return $this->getResult();
    }

    public function ShowAllTask() {
        $this->sql = "SELECT tasks.*, classes.ClassName
        FROM tasks
        JOIN classes ON tasks.ClassId = classes.ClassId
        WHERE tasks.DueDate IS NOT NULL
        ORDER BY tasks.DueDate ASC";
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