<?php
require_once __DIR__ . ('/../database/Users.php');

class ProfileController extends Users {
    protected $message;

    public function getProfile($userId) {
        $result = $this->ShowProfileData($userId);
    
        if ($result) {
            $row = $result->FetchArray();
            $profileData = array(
                'username' => $row['Username'],
                'email' => $row['Email'],
                'gender' => $row['Gender'],
                'profile' => ($row['Profile'] !== null) ? $row['Profile'] : '../upload/profile/user-picture.jpg',
            );
    
            return $profileData;
        } else {
            throw new Exception("Gagal mendapatkan data profil untuk pengguna dengan ID: $userId");
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
    
    // public function changeProfile($userId, $profile) {
    //     if (!empty($profile['name'])) {
    //         $oldProfilePath = $this->getProfile($userId);
    //         if ($oldProfilePath !== '../upload/profile/user-picture.jpg') {
    //             unlink($oldProfilePath);
    //         }

    //         $newProfilePath = 'upload/profile/' . uniqid() . '.' . pathinfo($newProfile['name'], PATHINFO_EXTENSION);
    //         $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/' . $newProfilePath;
    //         move_uploaded_file($newProfile['tmp_name'], $uploadPath);

    //         $result = $this->UpdateProfile($userId, $newProfile);
    //         if ($result) {
    //             $_SESSION['message'] = 'Profile updated successfully.';
    //             $_SESSION['message_type'] = 'success';
    //             return $newProfilePath;
    //         } else {
    //             $_SESSION['message'] = 'Failed to update profile.';
    //             $_SESSION['message_type'] = 'error';
    //             return $oldProfilePath;
    //         }
    //         return $newProfilePath;
    //     }
    // }

    public function changeProfile() {
        
    }

    public function getMessage() {
        return $this->message;
    }
}
?>
