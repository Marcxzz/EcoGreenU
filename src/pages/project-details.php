<?php include_once '../php/projects/project-details.php' ?>

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
    <title><?=$project['title'] ?> | EcoGreenU</title>
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
            <?php if(isset($project)): ?>
                <?php
                    // print_r($donations);
                ?>
            
                <div class="d-flex flex-row align-items-center justify-content-start gap-4 mt-4 mb-3 w-75 mx-auto px-2">
                    <h2><?=$project['title']?></h2>
                    <?php if($project['status'] == 1): ?>
                        <span class="badge badge-outlined rounded-pill text-success fs-6">Under review</span>
                    <?php elseif($project['status'] == 2): ?>
                        <span class="badge rounded-pill text-bg-danger fs-6">Closed</span>
                    <?php endif; ?>
                </div>
                <div class="row g-3 w-75 mx-auto">
                    <div class="col-9">
                        <img class="w-100 project-img" src="../assets/images/projects/proj-<?=$project["idProject"]?>.jpg" />
                    </div>
                    <div class="col-3">
                        <div class="border rounded-0 p-3">
                            <h3 class="text-success">&lt;total raised&gt; $</h3>
                            <h5 class="mb-3">Goal: <?=number_format($project['targetAmount'], 2)?> $</h5>
                            <p class="m-0">Before: <?=formatDate($project['deadline'], 'd/m/Y H:i:s')?></p>
                            <p class="m-0"><?=count($donations)?> donations</p>
                            <!-- <hr>
                            <p class="m-0"><?=$project['description']?></p> -->
                            <?php if($project['status'] == 0): ?>
                                <?php if(isset($_SESSION['user_id'])): ?>
                                    <button type="button" class="btn btn-success w-100 rounded-0 mt-3">Donate</button>
                                <?php else: ?>
                                    <button class="btn btn-success w-100 rounded-0 mt-3" disabled>You must be logged in to donate</button>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if($owner): ?>
                                <button type="button" class="btn btn-outline-success w-100 rounded-0 mt-3">Edit project</button>
                            <?php endif; ?>
                        </div>
                        <div class="border rounded-0 p-3 mt-3">
                            <h4>Recent donations</h4>
                            <div class="d-flex flex-column gap-4 mt-3">
                                <?php foreach($donations as $d): ?>
                                    <div class="d-flex gap-3 align-items-center">
                                        <img src="../assets/images/pfp-default.jpg" width=32 height=32 alt="" class="rounded-circle">
                                        <div class="d-flex flex-column">
                                            <?php if ($d['public']): ?>
                                                <p class="m-0"><?=$d['firstName']?> <?=$d['lastName']?></p>
                                            <?php else: ?>
                                                <p class="m-0">Anonymous</p>
                                            <?php endif; ?>
                                            <p class="m-0 fw-bold"><?=$d['amount']?>$</p>
                                        </div>
                                        <p class="m-0 text-secondary ms-auto"><?=formatDate($d['date'], 'd/m/Y')?></p>
                                    </div>
                                    <!-- <hr> -->
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: echo 'no project found'; ?>
            <?php endif; ?>
        </div>

        <?php // include '../shared/footer.php' ?>
    </div>
</body>
</html>