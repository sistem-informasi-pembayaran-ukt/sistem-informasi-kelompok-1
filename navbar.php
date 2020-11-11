<nav class="navbar navbar-expand-lg navbar-light  fixed-top" id="mainNav">
        <div class="container">
            <img src="img/logo.png">
            <a class="navbar-brand text-white" href="index.html">UNIVERSITAS HASANUDDIN</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                   <!-- Shown Navbar if user has logged in -->
                <?php
                require_once "database/pdo.php";
                if (isset($_SESSION['nim'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger text-white" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger text-white" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger text-white" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger text-white" href="logout.php">Logout</a>
                    </li>
            </ul>
            <!-- Shown Navbar if user hasn't logged in -->
        <?php
        } else if (!isset($_SESSION['username'])) {
        ?>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger text-white" href="login.php">Login <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger text-white" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger text-white" href="contact.php">Contact</a>
            </li>
        </ul>
        <?php
        }
        ?>
            </div>
        </div>
    </nav>