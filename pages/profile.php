<?php include_once '../php/user/profile.php' ?>

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
    <title>Profile | EcoGreenU</title>
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

        <div class="container-fluid p-0 m-0 row g-5" id="main">
            <div class="col-12 col-md-auto px-5">
                <div class="d-flex flex-column flex-sm-row flex-md-column align-items-center gap-4">
                    <img src="../assets/images/pfp-default.jpg" width="200" class="rounded-circle" alt="User profile picture">
                    <div class="flex-column justify-content-center align-items-md-center">
                        <h5 class="text-center text-sm-start text-md-center"><?php echo $user['firstName'].' '.$user['lastName']; ?></h5>
                        <p class="text-center text-sm-start text-md-center m-0 text-muted"><?php echo $user['email']; ?></p>
                        <?php if(isset($user['phoneNumber'])): ?>
                            <p class="text-center text-sm-start text-md-center m-0 text-muted"><?php echo $user['phoneNumber']; ?></p>
                        <?php endif; ?>
                        <form action="profile.php" method="POST" class="mt-3">
                            <a class="btn btn-success rounded-0 w-100" href="edit-profile.php">Edit profile</a>
                            <button type="submit" name="logout" value="true" class="btn text-danger rounded-0 w-100 mt-2">Log out</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <h3 class="mb-4">Your projects</h3>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-4 g-3">
                    <?php if(count($projects) > 0): ?>
                        <?php foreach($projects as $p): ?>
                            <div class="col">
                                <div class="card rounded-0">
                                    <img src="../assets/images/projects/proj-<?=$p["idProject"]?>.jpg" class="card-img-top" alt="<?=$p["title"]?>">
                                    <div class="card-body h-100">
                                        <h5 class="card-title"><?=$p["title"]?></h5>
                                        <p class="card-text"><?=$p["description"]?></p>
                                        <hr>
                                        <div class="d-flex">
                                            <p class="text-secondary">
                                                Deadline: <?=formatDate($p['deadline'], 'd/m/Y H:i:s')?>
                                                <br>
                                                Target: <?=number_format($p["targetAmount"], 2) ?>$
                                            </p>
                                        </div>
                                        <a href="project-details.php?project-id=<?=$p['idProject']?>&edit=true" class="btn btn-outline-success rounded-0 w-100">Edit</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="col">
                            <form action="create-project.php" method="post" class="w-100 h-100">
                                <div class="card border-2 rounded-0 h-100" style="border-style: dashed !important">
                                    <div class="card-body h-100 p-0">
                                        <button type="submit" class="btn text-success fs-1 rounded-0 border-0 ms-auto w-100 h-100" title="Create a new project">+</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php else: ?>
                        <div class="col">
                            <div class="card border border-2 rounded-0 h-auto" style="border-style: dashed !important">
                                <div class="card-body">
                                    <h5 class="card-title">Create a project</h5>
                                    <p class="card-text">Create a new crowdfunding project and let people contribute to a good cause!</p>
                                    <form action="create-project.php" method="post" class="d-flex">
                                        <button type="submit" class="btn btn-success rounded-0 ms-auto">Create project</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                
                <h3 class="mb-4 mt-5">Your contributions</h3>
                <?php if(count($projects) > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped w-100">
                            <thead>
                                <tr>
                                    <th scope="col">Project</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contibutions as $c): ?>
                                    <tr>
                                        <td>
                                            <a href="project-details.php?project-id=<?=$c['projectId']?>" class="text-success"><?=$c["title"]?></a>
                                            <?php if($c['public'] == 1): ?>
                                                <span class="badge rounded-pill text-bg-success ms-2">Private</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?=$c["description"]?></td>
                                        <td><?=$c["amount"]?>$</td>
                                        <td>
                                            <?=formatDate($c["date"], 'd/m/Y H:i:s')?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="w-100">You have not yet contributed to any projects. Start now by <a href="projects.php" class="text-success">exploring some projects</a>.</p>
                <?php endif; ?>
            </div>
        </div>

        <?php // include '../shared/footer.php' ?>
    </div>
</body>