<?php include_once '../php/projects/projects.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/searchbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script type="text/javascript" src="../js/darkmode.js" defer></script>
    <script type="text/javascript" src="../js/search-projects.js"></script>
    <link rel="icon" href="../assets/logo/favicon-light.svg" sizes="any" type="image/svg+xml" media="(prefers-color-scheme: light)">
    <link rel="icon" href="../assets/logo/favicon-dark.svg" sizes="any" type="image/svg+xml" media="(prefers-color-scheme: dark)">
    <title>Projects | EcoGreenU</title>
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

        <div class="container-fluid p-0 m-0" id="main">
            
            <div class="container-fluid p-3">
                <div class="row mb-4">
                    <div class="col">
                        <h3 class="m-0">Explore projects</h3>
                    </div>
                    <div class="col-12 col-sm-5 col-md-6 col-lg-4 col-xl-3">
                        <div class="searchbar">
                            <input type="text" class="form-control focus-ring focus-ring-success rounded-0" placeholder="Search for projects..." id="query">
                            <div id="results"></div>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-3">
                    <?php foreach ($projects as $p): ?>
                        <div class="col">
                            <div class="card rounded-0">
                                    <?php if(!isset($p["img"])): ?>
                                        <img src="../assets/images/proj-thumbnail-default.jpg" class="card-img-top" alt="<?=$p["title"]?>">
                                    <?php else: ?>
                                        <img src="../assets/images/projects/<?=$p["img"]?>" class="card-img-top" alt="<?=$p["title"]?>">
                                    <?php endif; ?>
                                <div class="card-body h-100">
                                    <h5 class="card-title"><?=$p["title"]?></h5>
                                    <p class="card-text"><?=$p["description"]?></p>
                                    <?php if($p['status'] == 1): ?>
                                        <span class="badge badge-outlined rounded-pill text-success">Under review</span>
                                    <?php elseif($p['status'] == 2): ?>
                                        <span class="badge rounded-pill text-bg-danger">Closed</span>
                                    <?php endif; ?>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Raised: <span class="text-success fw-bold">
                                        <?=number_format($p["raisedAmount"], 2)?></span>/<?=number_format($p["targetAmount"], 2)?>$
                                    </li>
                                </ul>
                                <div class="card-body d-flex">
                                    <!-- <?=print_r($_SESSION)?> -->
                                    <?php if($p['status'] == 0 && isset($_SESSION['user_id'])): ?>
                                        <a href="project.php?id=<?=$p['idProject'] ?>" class="btn btn-success rounded-0 ms-auto">Donate</a>
                                    <?php else: ?>
                                        <a href="project.php?id=<?=$p['idProject'] ?>" class="btn btn-outline-success rounded-0 ms-auto">View</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <?php include_once "../shared/footer.php" ?>
    </div>
</body>
</html>