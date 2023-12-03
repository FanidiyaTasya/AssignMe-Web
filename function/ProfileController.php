<?php
require_once __DIR__ . ('/../database/Users.php');

class ProfileController extends Users {
    protected $message;

    public function getProfile($userId) {
        $result = $this->ShowProfileData($userId);
    
        if ($result) {
            $row = $result->FetchArray();
            $defaultProfile = 'user-picture.jpg';
            $profileData = array(
                'username' => $row['Username'],
                'email' => $row['Email'],
                'gender' => $row['Gender'],
                'profile' => $row['Profile'] ? $row['Profile'] : $defaultProfile
            );
    
            return $profileData;
        } else {
            throw new Exception("Gagal mendapatkan data profil untuk pengguna dengan ID: $userId");
        }
    }
    
    public function changeProfile($userId, $profile) {
        try {
            $showData = $this->ShowProfileData($userId);
            if ($showData) {
                $row = $showData->FetchArray();
                $oldProfile = $row['Profile'];

                // if (!empty($oldProfile) && $oldProfile !== '../upload/profile/user-picture.jpg' && file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $oldProfile)) {
                //     unlink($_SERVER['DOCUMENT_ROOT'] . '/' . $oldProfile);
                // }
    
                if (!empty($oldProfile) && $oldProfile !== '../upload/profile/user-picture.jpg' && file_exists("../upload/file/" . $oldProfile)) {
                    unlink("../upload/file/" . $oldProfile);
                }
    
                $uploadDir = '../upload/profile/';
                $uniqueName = uniqid() . '_' . basename($_FILES['profile']['name']);
                $uploadFile = $uploadDir . $uniqueName; 
    
                move_uploaded_file($_FILES['profile']['tmp_name'], $uploadFile);
                $result = $this->updateProfile($userId, $uniqueName);
                if ($result) {
                    $_SESSION['message'] = 'Profile updated successfully.';
                    $_SESSION['message_type'] = 'success';
                    return $uniqueName;
                } else {
                    $_SESSION['message'] = 'Failed to update profile.';
                    $_SESSION['message_type'] = 'error';
                    return $oldProfile;
                }
            }
        } catch (Exception $e) {
            $_SESSION['message'] = 'An error occurred.';
            $_SESSION['message_type'] = 'error';
            return null;
        }
    }
    
    public function editData($userId, $newUsername, $newEmail, $newGender) {
        $result = $this->UpdateData($userId, $newUsername, $newEmail, $newGender);
    
        if ($result) {
            $_SESSION['message'] = 'Profile updated successfully.';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Failed to update profile.';
            $_SESSION['message_type'] = 'error';
        }
    }
    

    public function getMessage() {
        return $this->message;
    }
}
?>
