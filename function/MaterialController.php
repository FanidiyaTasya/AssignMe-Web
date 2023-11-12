<?php
require_once __DIR__ . ('/../database/Materials.php');

class MaterialController extends Materials {
    protected $message;

    public function createMateri($classId, $materialName, $materialDesc, $uploadDate, $attachment) {
        $result = $this->InsertMateri($classId, $materialName, $materialDesc, $uploadDate, $attachment);

        if ($result) {
            echo "Success";
        } else {
            echo "Failed";
        }
    }

    public function getMateri($classId) { 
        $task = $this->ShowMateri($classId);
        return $task;
    }

    public function getMessage() {
        return $this->message;
    }
}