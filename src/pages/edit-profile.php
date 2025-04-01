<?php include_once '../php/user/edit-profile.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script type="text/javascript" src="../js/darkmode.js" defer></script>
    <title>Edit profile | EcoGreenU</title>
</head>
<body>
    <div class="container-fluid p-0 m-0 position-absolute">
        <nav class="navbar sticky-top navbar-expand-lg bg-success">
            <div class="container-fluid d-flex">
                <a class="navbar-brand p-0 m-0" href="../index.php">
                    <img src="../assets/logo/logo-navbar.svg" alt="EcoGreenU logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto me-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="projects.php">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="about-us.php">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white active" href="profile.php">Profile</a>
                        </li>
                    </ul>
                    <button id="theme-switch" class="btn btn-success text-white p-2">
                        <i class="bi bi-moon-fill"></i>
                        <i class="bi bi-brightness-low-fill fs-4"></i>
                    </button>
                </div>
            </div>
        </nav>

        <div class="container-fluid p-3 m-0 vh-100 w-100 d-flex flex-column justify-content-center align-items-center" id="main">
            <img src="../assets/images/pfp-default.jpg" width="200" class="rounded-circle mb-4" alt="User profile picture">
            <form action="edit-profile.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control rounded-0 focus-ring focus-ring-success" name="firstName" id="floatingFirstName" placeholder="John" value="<?=$user['firstName']?>">
                    <label for="floatingFirstName">First name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control rounded-0 focus-ring focus-ring-success" name="lastName" id="floatingLastName" placeholder="Doe" value="<?=$user['lastName']?>">
                    <label for="floatingLastName">Last name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control rounded-0 focus-ring focus-ring-success" name="email" id="floatingEmail" placeholder="name@example.com" value="<?=$user['email']?>">
                    <label for="floatingEmail">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="tel" class="form-control rounded-0 focus-ring focus-ring-success" name="phoneNumber" id="floatingPhoneNumber" placeholder="name@example.com" value="<?=$user['phoneNumber']?>">
                    <label for="floatingPhoneNumber">Phone number</label>
                </div>
                <!-- <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-0 focus-ring focus-ring-success" name="password" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div> -->
                <button type="button" class="btn text-secondary w-100 rounded-0" name="editProfile" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Edit password</button>
                <button type="submit" class="btn btn-success w-100 rounded-0 mt-5" id="loginBtn" name="editProfile">Save changes</button>
                <p class="text-danger text-center my-3"><?=$form_error_msg?></p>
                <p class="text-success text-center my-3"><?=$changesAppliedMsg?></p>
                <!-- <button type="button" class="btn btn-success w-100 rounded-0" id="loginBtn" data-bs-toggle="modal" data-bs-target="#saveChangesModal">Save changes</button> -->
                <!-- <button type="submit" class="btn text-danger rounded-0 w-100 mt-3" name="deleteUser">Delete profile</button> -->
                <button type="button" class="btn text-danger rounded-0 w-100 mt-3" data-bs-toggle="modal" data-bs-target="#deleteProfileModal">Delete profile</button>
            </form>
        </div>


        <div class="modal fade" tabindex="-1" id="changePasswordModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title">Change password</h5>
                    </div>
                    <form action="edit-profile.php" method="post">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-0 focus-ring focus-ring-success" name="oldPassword" id="floatingOldPassword" placeholder="Old password" required>
                                <label for="floatingOldPassword">Old password</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control rounded-0 focus-ring focus-ring-success" name="newPassword" id="floatingNewPassword" placeholder="New password" required>
                                <label for="floatingNewPassword">New password</label>
                            </div>
                            <?=$pwFormMsg?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary rounded-0" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success rounded-0" data-bs-dismiss="modal" name="changePassword">Change password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" id="saveChangesModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm save changes</h5>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to edit your profile information?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="edit-profile.php" method="post">
                            <button type="button" class="btn btn-success rounded-0" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger rounded-0" data-bs-dismiss="modal" name="editProfile">I'm sure</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" id="deleteProfileModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title">Are you sure?</h5>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to <span class="fst-italic text-danger">permanently</span> delete your profile? This action is not reversible.</p>
                    </div>
                    <div class="modal-footer">
                        <form action="edit-profile.php" method="post">
                            <button type="button" class="btn btn-success rounded-0" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-outline-danger rounded-0" data-bs-dismiss="modal" name="deleteUser">I'm sure</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
</body>