<?php
if (!isset($_SESSION['user_id'])) header("Location: index.php?page=sign-in");

$formSuccess = false;
// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES) {
        $filename = basename($_FILES['image']['name']);
        $filetype = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        $generateName = strtotime('NOW') . rand(1, 10000) . '.'. $filetype;

        if (move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$generateName)) {
            // echo 'upload success';
        } else {
            // echo 'upload fail';
        }
    }
    
    // Use parameter binding to defend from SQL Injection
    $dataBinding = [
        ':user_id' => $_SESSION['user_id'],
        ':title' => $_POST['title'],
        ':goal' => $_POST['goal'],
        ':deadline' => $_POST['deadline'],
        ':description' => $_POST['description'],
        ':image' => isset($generateName) ? $generateName : '',
    ];

    $keys = implode(",", array_keys($dataBinding));

    try {
        $query = runQuery("INSERT INTO projects (user_id, title, goal, deadline, description, image) VALUES ($keys)", $dataBinding);
        $formSuccess = true;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<title>Start a Project | FundMyProject</title>
<style>
    #start-project {
        margin-top: 85px;
        margin-left: auto;
        margin-right: auto;
        width: 635px;
    }
    #start-project .title {
        color: #43A02F;
        font-size: 3em;
        font-weight: 200;
        text-align: center;
    }
    #start-project .form {
        margin-top: 55px;
        border-radius: 3px;
        box-shadow: 0px 2px 4px 2px #E1E1E1;
        min-height: 300px;
        padding: 45px;
    }
    #filename {
        margin-top: 10px;
    }
    .success-message {
        text-align: center;
        color: #47B631;
    }
    @media only screen and (max-width: 768px) {
        #start-project {
            width: 100%;
        }
        #start-project .title {
            font-size: 1.8em;
        }
        #start-project .form {
            padding: 35px 15px;
            margin-top: 35px;
        }
    }
</style>
<div id="start-project">
    <h1 class="title">
        Start a Project
    </h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?page=start-project" method="POST" class="form" enctype="multipart/form-data">
        <?php if ($formSuccess): ?>
            <div class="success-message">
                Project Published.
            </div>
        <?php endif; ?>
        <div class="field">
            <label for="">Project Title</label>
            <input type="text" placeholder="Project Title" name="title" required>
        </div>
        <div class="field">
            <label for="">Goal (Rp)</label>
            <input type="number" placeholder="0" name="goal" required>
        </div>
        <div class="field">
            <label for="">Deadline (Hour)</label>
            <input type="number" placeholder="4 hour" name="deadline">
        </div>
        <div class="field">
            <label for="">Description</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>
        <button class="button secondary" type="button">
            Select Image
            <input type="file" accept="image/*" class="filedrop" id="fileinput" onchange="showFilename()" name="image">
        </button>
        <div id="filename"></div>

        <div class="center margin-large-top">
            <button class="button green" type="submit">Publish</button>
        </div>
    </form>
</div>
<script>
function showFilename() {
    var file = document.getElementById("fileinput");

    if ('files' in file) {
        var files = file.files; // file array
        document.getElementById('filename').innerHTML = files[0].name;
    }
}
</script>