<?php
require_once __DIR__ . ('/../database/Users.php');

class ProfileController extends Users {
    protected $message;

    public function getProfile($userId) {
        $result = $this->ShowProfile($userId);
        if ($result) {
            $row = $result->FetchArray();
            $profilePicture = $row['Profile'];

            if (empty($profilePicture)) {
                return '../upload/profile/user-picture.jpg';
            } else {
                return $profilePicture;
            }
        } else {
            return '../upload/profile/user-picture.jpg';
        }
    }

    public function getDataUser($userId) {
        $result = $this->ShowDataUser($userId);
        if ($result) {
            $row = $result->FetchArray();
        } else {
            return null;
        }
    }
    
    public function changeProfile() {

    }

    public function getMessage() {
        return $this->message;
    }
}
?>
