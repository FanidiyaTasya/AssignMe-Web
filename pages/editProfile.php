<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 50px;
  }

  .profile-image {
    width: 200px;
    height: 200px;
    object-fit: cover;
    border-radius: 50%;
  }

  input[type="file"] {
    display: none;
  }
  </style>
</head>
<body>

     <!-- EDIT PROFILE -->
     <div class="container mt-4">
      <div class="row">
        <!-- TAMPIL DATA -->
    <?php
    require_once __DIR__ . '/../function/ProfileController.php';

    $userId = 8; 
    $profileController = new ProfileController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $newUsername = $_POST['username'];
        $newEmail = $_POST['email'];
        $newGender = $_POST['gender'];
    
        $result = $profileController->editData($userId, $newUsername, $newEmail, $newGender);
    }
    
    $profileData = $profileController->getProfile($userId);
    if ($profileData) {
        $username = $profileData['username'];
        $email = $profileData['email'];
        $gender = $profileData['gender'];
        $profile = $profileData['profile'];
    } else {
        echo "Gagal mengambil data profil.";
        exit();
    }
    ?>

<!-- Container 1: Foto Profil -->
<div class="col-md-4">
    <div class="card">
        <div class="card-body text-center">
            <form method="POST" id="editProfileForm" enctype="multipart/form-data">
                <label for="profile">
                    <input type="hidden" id="userId" name="userId" value="<?= $userId; ?>">

                    <img src="../upload/profile/<?= $profile; ?>" class="profile-image" id="previewImage" alt="Profile Image">
                    <h5 class="card-title mt-3"><?= $username; ?></h5>
                    <input type="file" id="profile" name="profile" accept=".jpg, .jpeg, .png" onchange="changeProfilePicture(event)">
                </label>
            </form>
        </div>
    </div>
</div>
<!-- Container 2: Formulir Edit Profil -->
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <form class="common-form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="userId" value="<?php echo $userId; ?>">

                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= $username; ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= $email; ?>">
                </div>

                <div class="mb-3 row">
                    <label for="gender" class="form-label col-md-3">Gender</label>
                    <div class="col-md-9">
                        <select class="form-select" id="gender" name="gender" aria-label="Default select example">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Laki-Laki" <?php echo ($gender == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php echo ($gender == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary btn-block" type="submit" name="submit">Save</button>
            </form>
        </div>
    </div>
</div>


      </div>
    </div>

<!-- JavaScript untuk mengganti foto profil -->
<script>
function changeProfilePicture() {
    var input = document.getElementById("profile");
    // var previewImage = document.getElementById("previewImage");

    // if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function (e) {
    //             // previewImage.src = e.target.result;
    //             document.querySelector('.profile-image').setAttribute('src', e.target.result);
    //         };
    //         reader.readAsDataURL(input.files[0]);
    //     }
        document.getElementById("editProfileForm").submit();
    }
</script>
<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $profile = $_FILES['profile']['name'];
        $result = $profileController->changeProfile($userId, $profile);
        
    }
?>
    
</body>
</html>