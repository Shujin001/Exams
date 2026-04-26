<?php include("./header.php"); ?>
    <figure class="banner">
        <img src="./banner-img.jpg" alt="Nature">
        <figcaption>
            <h1 class="banner-title">User Management System</h1>
            <p class="banner-text">A simple user management system using PHP and MySQLi with CRUD operation.</p>
        </figcaption>

    </figure>
    <main class="minvh">
        <div class="container" id="container">

            <h1 class="page-title">User Management</h1>
            <div class="text-container">
                <p>With this system, you can manage user accounts.</p>
            </div>
            <section class="list-box">
                <h2 class="section-title">Features</h2>
                <ul>
                    <li>Create, read, update, and delete operation</li>
                    <li>Login status check with PHP Session</li>
                    <li>Listing all user data in a table</li>
                </ul>
            </section>
            <div class="btn-group">
                <a href="./login.php" class="btn" title="Login Now">Login Now</a>
                <a href="./register.php" class="btn" title="Register Now">Register Now</a>
                <a href="./list.php" class="text-link" title="View All Users">View All Users</a>
            </div>
        </div>
    </main>
<?php include("./footer.php"); ?>