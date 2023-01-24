
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <div class="logo">
                <a href="#" id="logo"><img src="/assets/img/pestan_logo.svg.png" alt="logo" width="70px" height="40"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BURL.'Home/index' ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BURL.'admin/dash' ?>">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BURL.'admin/reservA' ?>">Reservation</a>
                    </li>
                    <!-- <li class="nav-item" style="background-color: rgb(133, 88, 88)">
                        
                    </li> -->
                </ul>
                <a class="btn btn-primary" style="background-color: rgb(133, 88, 88);" href="<?= BURL.'Login/logout' ?>">Logout</a>
            </div>
        </div>
    </nav>

