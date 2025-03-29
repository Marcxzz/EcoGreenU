<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script type="text/javascript" src="../js/darkmode.js" defer></script>
    <title>Sign up | EcoGreenU</title>
    <?php
        $formMsg = '';
        $db = new mysqli("localhost", "root", "", "dbecogreenu");
        if ($db->connect_error) {
            exit("error during db connection");
        }

        if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST["email"]) && isset($_POST["password"])) {
            // Prendi email e password dalla form
            $email = $_POST['email'];
            $password = $_POST['password'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];

            if (strlen($password) > 8) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
            
                $result = $db->query("INSERT INTO tblusers (firstName, lastName, email, passwordHash) VALUES ('$firstName', '$lastName', '$email', '$password_hash')");
                
                if ($result) {
                    header('location: profile.php');
                } else {
                    echo "Error";
                }
            } else {
                $formMsg = 'Password must be at least 8 characters long.';
            }
        }
    ?>
</head>
<body>
    <div class="container-fluid p-0 m-0">
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

        <div class="container-fluid p-3 m-0 vh-100 d-flex justify-content-center align-items-center" id="main">
            <form action="signup.php" method="POST">
                <img src="../assets/logo/logo-light.svg" id="logo" alt="EcoGreenU logo" class="w-100 mb-5">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control rounded-0 focus-ring focus-ring-success" name="firstName" id="floatingFirstName" placeholder="John">
                    <label for="floatingFirstName">First name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control rounded-0 focus-ring focus-ring-success" name="lastName" id="floatingLastName" placeholder="Doe">
                    <label for="floatingLastName">Last name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control rounded-0 focus-ring focus-ring-success" name="email" id="floatingEmail" placeholder="name@example.com">
                    <label for="floatingEmail">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-0 focus-ring focus-ring-success" name="password" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" class="btn btn-success w-100 rounded-0" id="signupBtn">Sign up</button>
                <?=$formMsg?>
                <p class="mb-0 text-center" style="margin-top: 50px;">Already registered? <a class="text-success" href="../pages/login.php">Log in</a></p>
            </form>
        </div>
    </div>
</body>