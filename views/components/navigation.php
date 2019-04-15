<div id="navigation">
    <div class="container">
        <a class="item" href="index.php">Explore</a>

        <a class="logo item" href="index.php">
            FundMy<span>Project</span>
        </a>

        <div class="right-menu">
            <?php if(!isset($_SESSION['user_id'])): ?>
                <a href="?page=sign-in" class="item">Sign In</a>
            <?php else: ?>
                <a class="item"><?= $_SESSION['username']; ?></a>
                <a class="item" href="?page=logout">Logout</a>
            <?php endif; ?>

        </div>
    </div>
</div>