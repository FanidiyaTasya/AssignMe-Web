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

    public function ShowMateri($materialId, $classId) {
        $this->sql = "SELECT * FROM materials 
        JOIN classes ON materials.ClassId = classes.ClassId
        WHERE materials.ClassId = '$classId' OR materials.MaterialId = '$materialId'";
        return $this-> getResult();
    }

    public function UpdateMateri($materialId, $classId, $materialName, $materialDesc, $attachment) {
        $this->sql = "UPDATE materials SET MaterialName='$taskName', MaterialDesc='$taskDesc', Attachment='$attachment' 
        WHERE MaterialId=$materialId";
        return $this->getResult();
    }

    public function DeleteMateri($materialId) {
        $this->sql = "DELETE FROM materials WHERE MaterialId = '$materialId'";
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