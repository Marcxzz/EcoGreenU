<?php include_once '../php/projects/edit-project.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script type="text/javascript" src="../js/darkmode.js" defer></script>
    <link rel="icon" href="../assets/logo/favicon-light.svg" sizes="any" type="image/svg+xml" media="(prefers-color-scheme: light)">
    <link rel="icon" href="../assets/logo/favicon-dark.svg" sizes="any" type="image/svg+xml" media="(prefers-color-scheme: dark)">
    <title>Edit <?=$project['title'] ?> | EcoGreenU</title>
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

        <div class="container-fluid p-3 m-0" id="main">
            <div class="d-flex flex-column justify-content-center align-items-center vh-100">
                <?php if(!isset($project["img"])): ?>
                    <img src="../assets/images/proj-thumbnail-default.jpg" class="edit-project-thumb-preview mb-2" alt="<?=$p["title"]?>">
                <?php else: ?>
                    <img src="../assets/images/projects/<?=$project['img']?>" alt="<?=$project['title']?>" class="edit-project-thumb-preview mb-2">
                <?php endif; ?>
                <form action="edit-project.php?id=<?=$projectId?>" method="post" enctype="multipart/form-data">
                    <input type="file" class="form-control rounded-0 focus-ring focus-ring-success mb-3" name="thumbnail" accept=".jpg,.png,.jpeg">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-0 focus-ring focus-ring-success" name="title" id="floatingTitle" placeholder="My new green project" minlenght="5" maxlength="30" required value="<?=$project['title']?>">
                        <label for="floatingTitle">Project title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control rounded-0 focus-ring focus-ring-success" name="description" placeholder="Write your project's description" id="floatingDescription" style="height:150px; max-height:300px;" minlength="50" maxlength="250" required><?=$project['description']?></textarea>
                        <label for="floatingTexfloatingDescriptiontarea">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control rounded-0 focus-ring focus-ring-success" name="targetAmount" id="floatingTargetAmount" value="10000" min="1000" max="999999999" step="1000" required value="<?=$project['targetAmount']?>">
                        <label for="floatingTargetAmount">Target amount</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="datetime-local" class="form-control rounded-0 focus-ring focus-ring-success" name="deadline" id="floatingDeadline" required value="<?=$project['deadline']?>">
                        <label for="floatingDeadline">Deadline</label>
                    </div>
                    <button type="submit" class="btn btn-success w-100 rounded-0" name="editProject">Edit project</button>
                    <button type="button" class="btn text-danger rounded-0 w-100 mt-3" data-bs-toggle="modal" data-bs-target="#deleteProjectModal">Delete profile</button>
                    <p class="text-danger text-center my-3 w-100"><?=$errorMsg?></p>
                    <p class="text-success text-center my-3 w-100"><?=$infoMsg?></p>
                </form>
            </div>
        </div>

        
        <div class="modal fade" tabindex="-1" id="deleteProjectModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm action</h5>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to <span class="fst-italic text-danger">permanently</span> delete this project? This action is not reversible. If you continue, those who donated to this project will receive a refund.</p>
                    </div>
                    <div class="modal-footer">
                        <form action="edit-project.php?id=<?=$project['idProject']?>" method="post">
                            <button type="button" class="btn btn-success rounded-0" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-outline-danger rounded-0" data-bs-dismiss="modal" name="deleteProject">I'm sure</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>