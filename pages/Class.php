<?php 
  session_start();
  if (!isset($_SESSION['Email'])) {
    header('Location: Login.php');
    exit();
}
    if (isset($_GET['classId'])) {
      $classId = $_GET['classId'];
    } else {
      header('Location: Dashboard.php');
      exit();
    }
    $_SESSION['ClassId'] = $classId;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AssignMe</title>

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/tab-layout-style.css">

</head>
<body class="g-sidenav-show bg-gray-100">
  <!-- Sidebar -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="Dashboard.php" target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">AssignMe</span>
      </a>
    </div>

    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto color-blue max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pages</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="Dashboard.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Classes</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link  " href="../pages/Review.html">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>customer-support</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(1.000000, 0.000000)">
                        <path class="color-background opacity-6" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                        <path class="color-background" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                        <path class="color-background" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">To Review</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Profile</h6>
        </li>
       
        <li class="nav-item">
          <a class="nav-link  " href="Profile.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>document</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(154.000000, 300.000000)">
                        <path class="color-background opacity-6" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path>
                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        
      </ul>
    </div>
  </aside>
  <!-- End Sidebar -->
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">

    <!-- Navbar -->
    <?php
    require_once __DIR__ . ('/../function/ClassController.php');

    $classController = new ClassController();
    $classDetail = $classController->detailClasses($classId);
      if ($classDetail) {
        $className = $classDetail['ClassName'];
        $subject = $classDetail['SubjectName'];
        $desc = $classDetail['Description'];
        $classCode = $classDetail['ClassCode'];
    }
    ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl my-3" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <h4 class="font-weight-bolder mb-0 text-white"><?php echo $className; ?></h4>
          </ol>
          <h5 class="font-weight-bolder mb-0 text-white"><?php echo $subject; ?></h5><br>
          <h5 class="font-weight-bolder mb-0 text-white">Class Code:</h5>
          <p class="font-weight-bolder mb-0 text-white"  class="copy-container" contenteditable="true" id="copyContainer" onclick="copyCode()" > <?php echo $classCode; ?></p>
        </nav>

        <!-- KOLOM SEARCH -->
        <!-- <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
        </div> -->

    </nav>
    <!-- End Navbar -->

    <!-- TAB LAYOUT -->

    <div id="tab-container">
        <div class="tab active" onclick="openTab('Classwork')"><a href="#" class="text-decoration-none">Classwork</a></div>
        <div class="tab" onclick="openTab('People')"><a href="#" class="text-decoration-none">People</a></div>
        <div class="tab" onclick="openTab('Review')"><a href="#" class="text-decoration-none">Review</a></div>
    </div>

    <div id="ClassworkTabContent" class="tab-content">
    <div class="row">
        <div class="col-sm-6">
          <h5>Task</h5>
          <div class="container my-4">
            <div class="row">
              <div class="col-md-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#buatTugasModal">+ Task</button>
              </div>
            </div>
          </div>

        <!-- BUAT TUGAS -->
        <?php 
        require_once __DIR__ . ('\..\function\TaskController.php');

        $taskController = new TaskController();
        if (isset($_POST['action']) && $_POST['action'] == 'create') {
            $classId = $_SESSION['ClassId'];
            $taskName = $_POST['taskname'];
            $taskDesc = $_POST['taskdesc'];
            $startDate = date('Y-m-d H:i:s');
            $dueDate = date('Y-m-d H:i:s', strtotime($_POST['deadline']));
            $attachment = $_FILES['attachment'];

            if (!$taskController->validateFile($attachment['name'], $attachment['size'], $attachment['type'])) {
              echo "Error: File tidak valid.";
              return;
          }
            $message = $taskController->createTask($classId, $taskName, $taskDesc, $startDate, $dueDate, $attachment);
        }
        ?>  
          <div class="modal fade" id="buatTugasModal" tabindex="-1" role="dialog" aria-labelledby="buattugasModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title">Create Task</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="taskname">Task Name</label>
                      <input type="text" class="form-control" name="taskname" id="taskname" placeholder="Enter Class Name" required>
                    </div>

                    <div class="form-group">
                      <label for="taskdesc">Description (Optional)</label>
                      <textarea class="form-control" name="taskdesc" id="taskdesc" placeholder="Enter Description"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="deadline">Due Date</label>
                      <input type="datetime-local" class="form-control" name="deadline" id="deadline" required>
                    </div>

                    <div class="form-group">
                      <label for="attachment">Attachment</label>
                      <input type="file" class="form-control" name="attachment" id="attachment" accept=".pdf, .doc, .docx, .ppt, .pptx, .jpg, .jpeg, .png">
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="action" value="create">Save</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>

          <!-- EDIT TUGAS -->
          <?php
              if (isset($_POST['action']) && $_POST['action'] == 'edit') {
                  $classId = $_POST['classId'];
                  $className = $_POST['classname'];
                  $subject = $_POST['subject'];
                  $desc = $_POST['description'];

                  if (!$taskController->validateFile($attachment['name'], $attachment['size'], $attachment['type'])) {
                    echo "Error: File tidak valid.";
                    return;
                }
                  $classController->editClass($classId, $className, $subject, $desc);
              }
          ?>
          <div class="modal fade" id="editKelasModal" tabindex="-1" role="dialog" aria-labelledby="editKelasModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="editKelasModalLabel">Edit Task</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <form method="POST" id="formEditClass">
                      <input type="hidden" id="classId" name="classId" >

                    <div class="form-group">
                      <label for="classname">Class Name</label>
                      <input type="text" class="form-control" id="classname" name="classname">
                    </div>

                    <div class="form-group">
                      <label for="subject">Subject Name</label>
                      <input type="text" class="form-control" id="subject" name="subject">
                    </div>

                    <div class="form-group">
                      <label for="description">Description (Optional)</label>
                      <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" name="action" value="edit" class="btn btn-primary">Save</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>

    <!-- HAPUS TUGAS -->
    <div class="modal fade" id="hapusTugasModal" tabindex="-1" role="dialog" aria-labelledby="hapusTugasModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="hapusTugasModalLabel">Konfirmasi Hapus Tugas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">Apakah Anda yakin ingin menghapus tugas ini?</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="#" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
    </div>

          <!-- TAMPIL TUGAS -->
          <?php
          require_once __DIR__ . ('\..\function\TaskController.php');

          $taskController = new TaskController();
          $message = $taskController->getMessage();
          if (!empty($message)) {
              echo $message;
          }
          $result = $taskController->getTask($classId);
          while ($row = $result->FetchArray()) {
          ?>
        <div class="card mb-3">
          <div class="card-body">

              <div class="dropdown float-end">
                  <i class="fas text-muted dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                      <li><a href="#" data-toggle="modal" data-target="#editTugasModal" class="dropdown-item text-left text-dark">Edit</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#hapusTugasModal" class="dropdown-item text-left text-dark">Delete</a></li>
                  </ul>
                
              </div>
                  <h5 class="card-title" ><?= $row['TaskName']; ?></h5>
                  <p class="card-text"><?= $row['TaskDesc']; ?></p>
                  <a href="/AssignMe/file/<?= $row['Attachment']; ?>" download><?= $row['Attachment']; ?></a><br><br>
                  <a href="ViewTask.php?taskId=<?= $row['TaskId'] ?>" class="btn btn-primary">View Assignment</a>
              </div>
          </div>
          <?php } ?>
          
        </div>  
        <!--BUAT MATERI-->
        <div class="col-sm-6">
          <h5>Materials</h5>
          <div class="container my-4">
            <div class="row">
              <div class="col-md-6">
                <button class="btn btn-primary" data-toggle="modal" data-target="#buatKelasModal">+ Materials</button>
              </div>
            </div>
          </div>

          <?php 
          require_once __DIR__ . ('\..\function\MaterialController.php');

          $materialController = new MaterialController();
          if (isset($_POST['action']) && $_POST['action'] == 'upload') {
            $classId = $_SESSION['ClassId'];
            $materialName = $_POST['materiname'];
            $materialDesc = $_POST['desc'];
            $uploadDate = date('Y-m-d H:i:s');
            $attachment = $_FILES['attachment'];

            if (!$materialController->validateFile($attachment['name'], $attachment['size'], $attachment['type'])) {
              echo "Error: File tidak valid.";
              return;
          }
          $message = $materialController->createMateri($classId, $materialName, $materialDesc, $uploadDate, $attachment);
          }

          ?>
          <div class="modal fade" id="buatKelasModal" tabindex="-1" role="dialog" aria-labelledby="buatKelasModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title">Create Material</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="materiname">Material Name</label>
                      <input type="text" class="form-control" name="materiname" id="materiname" placeholder="Enter Material Name" required>
                    </div>

                    <div class="form-group">
                      <label for="desc">Description (Optional)</label>
                      <textarea class="form-control" name="desc" id="desc" placeholder="Enter Description"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="attachment">Attachment </label>
                      <input type="file" class="form-control" name="attachment" id="attachment" accept=".pdf, .doc, .docx, .pptx, .ppt" required>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="action" value="upload">Upload</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>

          <!-- TAMPIL MATERI -->
          <?php
          require_once __DIR__ . ('\..\function\MaterialController.php');

          $materialController = new MaterialController();
          $message = $materialController->getMessage();
          if (!empty($message)) {
              echo $message;
          }
          $materi = $materialController->getMateri($classId);
          while ($row = $materi->FetchArray()) {
          ?>
          <div class="card mb-3">
            <div class="card-body">

              <div class="dropdown float-end">
                <i class="fas text-muted dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a href="#" data-toggle="modal" data-target="#editMateriModal" class="dropdown-item text-left text-dark">Edit</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#hapusMateriModal" class="dropdown-item text-left text-dark">Delete</a></li>
                </ul>

              </div>
                <h5 class="card-title"><?= $row['MaterialName']; ?></h5>
                <p class="card-text"><?= $row['MaterialDesc']; ?></p>
                <a href="/AssignMe/file/<?= $row['Attachment']; ?>" download><?= $row['Attachment']; ?></a><br><br>
                <a href="#" class="btn btn-primary">View Material</a>
            </div>
          </div>
          <?php } ?>

        </div>
      </div>
    </div>

    <div id="PeopleTabContent" class="tab-content">
    <?php
        require_once __DIR__ . ('/../database/Users.php'); 

        $users = new Users();
        $classId = $_GET['classId'];       
      ?>
      <div class="container">
        <h4 class="mt-4">Teachers</h4>
        <div class="row">
          <div class="col-md-8">
            <ul class="list-group">
              <?php
              $teacherResult = $users->ShowTeacher($classId);
              while ($teacher = $teacherResult->FetchArray()) {
                echo '<li class="list-group-item">' . $teacher['Username'] . '</li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </div>

      <div class="container">
        <h4 class="mt-4">Classmates</h4>
        <div class="row">
          <div class="col-md-8">
            <ul class="list-group">
            <?php
            $studentResult = $users->ShowStudent($classId);
            while ($student = $studentResult->FetchArray()) {
                echo '<li class="list-group-item">' . $student['Username'] . '</li>';
            }
            ?>
            </ul>
          </div>
        </div>
      </div>

    </div>

    <div id="ReviewTabContent" class="tab-content">
      <div class="container mt-5">

      <!-- DROPDOWN TUGAS -->
      <?php 
      require_once __DIR__ . ('\..\function\TaskController.php');
      $taskController = new TaskController();
        $message = $taskController->getMessage();
          if (!empty($message)) {
              echo $message;
          }
          $result = $taskController->getTask($classId);
      ?>
      <div class="col-md-5"> 
        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" style="width: 200px">
          <option value="" disabled selected>Select Assigment</option>
          <?php 
            while ($row = $result->FetchArray()) {
            $taskName = $row['TaskName']; ?>
          <option value="<?= $taskId; ?>"><?= $taskName; ?></option>
          <?php } ?>
        </select>
      </div><br>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Answer</th>
              <th scope="col">Status</th>
              <th scope="col">Grade</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tasya</td>
              <td>Jawab</td>
              <td>Done</td>
              <td><input type="number" class="form-control" placeholder="0-100"></td>
              <td><button class="btn btn-primary">Save</button></td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
    <!-- END TAB LAYOUT -->
    </main>

    <script>
        function copyCode() {
            var copyContainer = document.getElementById('copyContainer');
            var range = document.createRange();
            range.selectNode(copyContainer);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
            alert('Code copied to clipboard!');
        }
    </script>

    <!--  JS Files   -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script src="../assets/js/popup.js"></script>
    <!-- <script src="../assets/js/skrip.js"></script> -->
    <script src="../assets/js/tab-layout.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js"></script>
</body>
</html>