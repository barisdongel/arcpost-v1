<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">İsim</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Makarnalar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Salatlar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">İçecekler</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="category">
            <h3 class="text-center">Makarnalar</h3>
            <div class="row">
                <div class="col-6 py-2 px-2">
                    <div class="card">
                        <img src="https://pyxis.nymag.com/v1/imgs/c76/ac6/aa0d915de22475be897d49c0847936766a-26-cacio-e-pepe.2x.h473.w710.jpg" class="card-img-top" alt="item">
                        <div class="card-body">
                            <h5 class="card-title">Makarna</h5>
                            <p class="card-text">Soslu Makarna</p>
                            <a href="#" class="btn btn-primary">Fiyat: 95₺</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center text-muted">Bu site <a class="text-dark fw-bold text-decoration-none" href="https://inoception.com">Inoception Yazılım</a> tarafından yapıldı.</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>