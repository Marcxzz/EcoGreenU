<?php include_once '../php/projects/donate.php' ?>

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
    <link rel="icon" href="../assets/logo/favicon-light.svg" sizes="any" type="image/svg+xml" media="(prefers-color-scheme: light)">
    <link rel="icon" href="../assets/logo/favicon-dark.svg" sizes="any" type="image/svg+xml" media="(prefers-color-scheme: dark)">
    <title>Donate | EcoGreenU</title>
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
                            <a class="nav-link text-white active" href="projects.php">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="about-us.php">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="profile.php">Profile</a>
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
            <form action="donate.php?id=<?=$projectId?>" method="POST">
                <h3 class="mb-4">Donate to the project</h3>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control rounded-0 focus-ring focus-ring-success" name="amount" id="floatingAmount" placeholder="" min="0" required>
                    <label for="floatingAmount">Amount</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control rounded-0 focus-ring focus-ring-success" name="description" id="floatingDescription" style="height:100px; max-height:150px;" placeholder="" maxlength="150"></textarea>
                    <label for="floatingDescription">Description</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select rounded-0 focus-ring focus-ring-success" name="paymentMethod" id="floatingPaymentMethod" required>
                        <option selected disabled>Select the payment method</option>
                        <option value="1">Bank transfer</option>
                        <option value="2">VISA</option>
                        <option value="3">MasterCard</option>
                        <option value="4">Debit card</option>
                    </select>
                    <label for="floatingPaymentMethod">Payment method</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input text-success rounded-0 focus-ring focus-ring-success" type="checkbox" name="public" id="checkPublic">
                    <label class="form-check-label" for="checkPublic">
                        Show this donation as public
                    </label>
                </div>
                <button type="submit" class="btn btn-success w-100 rounded-0 mt-5" name="donate">Confirm donation</button>
                <a class="btn text-secondary rounded-0 w-100 mt-3" href="project-details.php?id=1">Cancel</a>
                <p class="text-danger text-center my-3"><?=$errorMsg?></p>
                <p class="text-success text-center my-3"><?=$infoMsg?></p>
            </form>
        </div>


        <!-- <div class="modal fade" tabindex="-1" id="confirmDonationModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title">Proceed with the payment?</h5>
                    </div>
                    <div class="modal-body">
                        <p>Do you confirm that you want to finalize payment for this project??</p>
                    </div>
                    <div class="modal-footer">
                        <form action="edit-profile.php" method="post">
                            <button type="button" class="btn btn-success rounded-0" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger rounded-0" data-bs-dismiss="modal" name="donate">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="modal fade" tabindex="-1" id="confirmCancelModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm save changes</h5>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to edit your profile information?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success rounded-0" data-bs-dismiss="modal">No</button>
                        <a href="project-details.php?id=1" class="btn btn-danger rounded-0" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
</body>