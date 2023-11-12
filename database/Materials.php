<?php 
require_once ('Connect.php');

class Materials extends Connect {
    protected $sql;
    protected $result;

    public function InsertMateri($classId, $materialName, $materialDesc, $uploadDate, $attachment) {
        $this->sql = "INSERT INTO materials (ClassId, MaterialName, MaterialDesc, UploadDate, Attachment) 
        VALUES ('$classId','$materialName','$materialDesc','$uploadDate','$attachment')";
        return $this-> getResult();
    }

    public function ShowMateri($classId) {
        $this->sql = "SELECT * FROM materials WHERE ClassId = '$classId'";
        return $this-> getResult();
    }

    public function EditMateri($materialId, $classId, $materialName, $materialDesc, $attachment) {
        $this->sql = "UPDATE materials SET MaterialName='$taskName', MaterialDesc='$taskDesc', 
        UploadDate='$startDate', Attachment='$attachment' WHERE MaterialId=$materialId";
        return $this->getResult();
    }

    public function DeleteMateri($materialId) {
        $this->sql = "DELETE FROM materials WHERE MaterialId=$materialId";
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