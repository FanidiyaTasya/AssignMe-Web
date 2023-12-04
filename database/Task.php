<?php 
require_once ('Connect.php');
require_once ('Users.php');

class Task extends Connect {
    protected $sql;
    protected $result;

    public function InsertTask($classId, $taskName, $taskDesc, $startDate, $dueDate, $attachment) {
        $this->sql = "INSERT INTO tasks (ClassId, TaskName, TaskDesc, StartDate, DueDate, Attachment) 
        VALUES ('$classId','$taskName','$taskDesc','$startDate','$dueDate','$attachment')";
        return $this-> getResult();
        // $this-> getResult();
        // return $this->dbConn()->insert_id;
    }

    public function InsertToDo($taskId, $userId) {
        $this->sql = "INSERT INTO task_submits (TaskId, UserId, Status) VALUES ('$taskId', '$userId', 'To-Do')";
        $this->getResult();
    }

    public function GetSiswa($classId) { 
        $users = new Users();
        return $users->ShowStudent($classId);
        var_dump($users->ShowStudent);
    }

    // public function InsertToDo($taskId, $userId) {
    //     $users = new Users();
    //     $userIds = $users->ShowStudent($classId);
    
    //     foreach ($userIds as $userId) {
    //         $this->sql = "INSERT INTO task_submits (TaskId, UserId, Status) VALUES ('$taskId', '$userId', 'To-Do')";
    //         $this->getResult();
    //     }
    // }

    public function UpdateTask($taskId, $taskName, $taskDesc, $dueDate, $attachment) {
        $this->sql = "UPDATE tasks SET TaskName='$taskName', TaskDesc='$taskDesc', 
        DueDate='$dueDate', Attachment='$attachment' WHERE TaskId=$taskId";
        return $this->getResult();
    }

    public function DeleteTask($taskId) {
        $this->sql = "DELETE FROM tasks WHERE TaskId = '$taskId'";
        return $this->getResult();
    }   

    public function ShowTask($taskId, $classId) {
        $this->sql = "SELECT * 
        FROM tasks 
        JOIN classes ON tasks.ClassId = classes.ClassId
        WHERE tasks.ClassId = '$classId' OR tasks.TaskId = '$taskId'";
        return $this-> getResult();
    }

    public function ShowTaskSubmit($taskId) { // tabel nilai
        $this->sql = "SELECT users.UserId, users.Username, task_submits.Answers, task_submits.SubmitDate, task_submits.Status, task_submits.Grade
        FROM task_submits
        INNER JOIN users ON task_submits.UserId = users.UserId
        WHERE task_submits.TaskId = $taskId 
        ORDER BY task_submits.SubmitDate ASC";
        return $this->getResult();
    }

    public function CekData($taskId, $userId) {
        $this->sql = "SELECT * FROM task_submits WHERE TaskId = $taskId AND UserId = $userId";
        $result = $this->getResult();
        return $result;
    }    

    public function UpdateGrade($grade, $taskId, $userId) {
        $this->sql = "UPDATE task_submits SET Grade='$grade' WHERE TaskId=$taskId AND UserId=$userId";
        return $this->getResult();
    }
    
    public function ShowReview($userId) { 
        $this->sql = "SELECT tasks.*, classes.ClassName
        FROM tasks
        JOIN classes ON tasks.ClassId = classes.ClassId
        JOIN task_submits ON tasks.TaskId = task_submits.TaskId
        JOIN user_classes ON task_submits.UserId = user_classes.UserId
        JOIN users ON user_classes.UserId = users.UserId
        WHERE task_submits.Grade IS NULL AND users.Role = 'Siswa' OR user_classes.UserId = $userId
        GROUP BY tasks.TaskId, classes.ClassId
        ORDER BY tasks.DueDate ASC";
        return $this->getResult();
    }

    public function ShowDone($userId) {
        $this->sql = "SELECT tasks.*, classes.ClassName
        FROM tasks
        JOIN classes ON tasks.ClassId = classes.ClassId
        JOIN task_submits ON tasks.TaskId = task_submits.TaskId
        JOIN user_classes ON task_submits.UserId = user_classes.UserId
        JOIN users ON user_classes.UserId = users.UserId
        WHERE task_submits.Grade IS NOT NULL AND users.Role = 'Siswa' OR user_classes.UserId = $userId
        GROUP BY tasks.TaskId, classes.ClassId
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