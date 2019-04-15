<?php
$usernameError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = removeHTML($_POST['username']);
    $email = removeHTML($_POST['email']);
    $password = removeHTML($_POST['password']);

    // Use parameter binding to defend from SQL Injection
    $dataBinding = [
        ':username' => $username,
        ':email' => $email,
    ];

    $uniqueUser = runQuery("SELECT * FROM users WHERE username=:username OR email=:email", $dataBinding);

    // Check if username or email available or not
    if ($uniqueUser && $uniqueUser->rowCount() < 1) {
        $dataBinding[':password'] = password_hash($password, PASSWORD_DEFAULT);
        $params = implode(",", array_keys($dataBinding));

        $insert = runQuery("INSERT INTO users (username, email, password) VALUES ($params)", $dataBinding);

        if ($insert) {
            $_SESSION['user_id'] = $connection->lastInsertId();
            $_SESSION['username'] = $username;
        }

    } else {
        $usernameError = true;
    }
}

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
?>
<title>Register | FundMyProject</title>
<style>
    #register {
        margin-top: 85px;
        margin-left: auto;
        margin-right: auto;
        width: 635px;
    }
    #register .title {
        font-size: 2em;
        font-weight: 200;
        margin-bottom: 55px;
    }
    #register .form {
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
        #register {
            width: 100%;
        }
        #register .title {
            font-size: 1.4em;
            margin-bottom: 35px;
        }
        #register .form {
            padding: 35px 15px;
            margin-top: 35px;
        }
    }
</style>
<div id="register">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?page=register" method="POST" class="form" enctype="multipart/form-data">
        <h1 class="title">
            Register
        </h1>
        <?php if ($usernameError): ?>
            <div class="error-message">
                Username or Email has been taken.
            </div>
        <?php endif; ?>
        <div class="field">
            <label for="">Username</label>
            <input type="text" placeholder="" name="username" required>
        </div>

        <div class="field">
            <label for="">Email</label>
            <input type="email" placeholder="" name="email" required>
        </div>

        <div class="field">
            <label for="">Password</label>
            <input type="password" placeholder="" name="password" required>
        </div>

        <div class="center margin-large-top">
            <button class="button green" type="submit">Submit</button>
        </div>

        <div class="message">
            Already have an account? <a href="?page=sign-in">Sign In Now!</a>
        </div>
    </form>
</div>