<?php
$passwordError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $getUser = runQuery("SELECT * FROM users WHERE username=:username OR email=:username", [
        ':username' => $_POST['username']
    ]);

    if ($getUser && $getUser->rowCount() > 0) {
        $user = $getUser->fetchObject();
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;

        header("Location: index.php");
    } else {
        $passwordError = true;
    }
}

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
?>
<title>Sign In | FundMyProject</title>
<style>
    #sign-in {
        margin-top: 85px;
        margin-left: auto;
        margin-right: auto;
        width: 635px;
    }
    #sign-in .title {
        font-size: 2em;
        font-weight: 200;
        margin-bottom: 55px;
    }
    #sign-in .form {
        margin-top: 55px;
        border-radius: 3px;
        box-shadow: 0px 2px 4px 2px #E1E1E1;
        min-height: 300px;
        padding: 45px;
    }

    .message {
        text-align: center;
        margin-top: 45px;
    }

    .error-message {
        text-align: center;
        color: red;
        margin-bottom: 35px;
    }

    @media only screen and (max-width: 768px) {
        #sign-in {
            width: 100%;
        }
        #sign-in .title {
            font-size: 1.4em;
            margin-bottom: 35px;
        }
        #sign-in .form {
            padding: 35px 15px;
            margin-top: 35px;
        }
    }
</style>
<div id="sign-in">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?page=sign-in" method="POST" class="form" enctype="multipart/form-data">
        <h1 class="title">
            Sign In
        </h1>
        <?php if ($passwordError): ?>
            <div class="error-message">
                Username or Password is wrong.
            </div>
        <?php endif; ?>
        <div class="field">
            <label for="">Username Or Email</label>
            <input type="text" placeholder="" name="username" required>
        </div>

        <div class="field">
            <label for="">Password</label>
            <input type="password" placeholder="" name="password" required>
        </div>

        <div class="center margin-large-top">
            <button class="button green" type="submit">Sign In Now!</button>
        </div>

        <div class="message">
            Don't have an account? <a href="?page=register">Register Now!</a>
        </div>
    </form>
</div>