<?php
$id = isset($_GET['project_id']) ? $_GET['project_id'] : null;
$detail = null;
$success = false;

if ($id != null || $id == '') {
    $detail = runQuery(
        "SELECT projects.*, users.username, (SELECT SUM(donation) FROM backers WHERE project_id=projects.id) donation,
        (SELECT COUNT(*) FROM backers WHERE project_id=projects.id GROUP BY backers.user_id) backers
        FROM projects INNER JOIN users ON projects.user_id=users.id
        WHERE projects.id={$id}"
    , [])->fetchObject();
} else {
    $notFound = true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php?page=sign-in');
    }

    $input = [
        ':user_id' => $_SESSION['user_id'],
        ':project_id' => $detail->id,
        ':donation' => $_POST['donation']
    ];

    $values = implode(",", array_keys($input));

    $insert = runQuery("INSERT INTO backers (user_id,project_id,donation) VALUES($values)", $input);

    if ($insert) {
        $success = true;
    }
}

?>

<?php if ($detail != null): ?>
<title><?= $detail->title; ?> | FundMyProject</title>
<style>
    #detail {
        margin-top: 55px;
    }
    #detail .title {
        width: 723px;
        margin: 0 auto;
    }
    #detail .title > .main-title {
        font-weight: 200;
        font-size: 3em;
        display: block;
    }
    #detail .title > .author {
        font-size: 1.1em;
        margin-top: 15px;
    }
    #detail .image {
        width: 65%;
        border-radius: 2px;
        overflow: hidden;
        height: 420px;
    }
    #detail .image img {
        width: 100%;
    }
    #detail .detail-content {
        display: flex;
        align-items: flex-start;
    }
    #detail .detail-content .text {
        margin-left: 35px;
    }
    #detail .detail-content .item {
        margin-bottom: 25px;
    }
    #detail .detail-content .item h2 {
        font-size: 1.7em;
        color: #43A02F;
        margin-bottom: 8px;
    }
    #detail .detail-content .item .sub {
        color: #7A7A7A;
        font-size: 1.125em;
    }
    #detail .button.green.big {
        font-size: 1.5em;
    }
    #detail .description {
        font-size: 1.3em;
        white-space: pre-line;
    }

    @media only screen and (max-width: 768px) {
        #detail .title {
            width: auto;
            padding: 0 1rem;
        }
        #detail .title .main-title {
            font-size: 1.8em;
        }
        #detail .detail-content {
            flex-wrap: wrap;
        }
        #detail .detail-content .image {
            width: 100%;
            max-height: 230px;
        }
        #detail .detail-content .text {
            margin-left: 0;
            margin-top : 35px;
        }
        #detail .detail-content .description {
            font-size: 1.1em;
        }
        #detail .success-message {
            text-align: center;
            color: #47B631;
        }
    }
</style>

<div id="detail">
    <?php if ($success): ?>
        <div class="success-message">
        Success to donate to this project.
        </div>
    <?php endif; ?>
    <div class="title">
        <div class="main-title">
            <?= $detail->title; ?>
        </div>
        <div class="author">
            By <?= $detail->username; ?>
        </div>
    </div>
    <div class="container margin-large-top">
        <div class="detail-content">
            <div class="image">
                <img src="uploads/<?= $detail->image; ?>" alt="">
            </div>
            <div class="text">
                <div class="item">
                    <h2>Rp <?= number_format($detail->donation, 0, ',', '.') ?></h2>
                    <div class="sub">
                    pledged of Rp <?= number_format($detail->goal, 0, ',', '.') ?> goal
                    </div>
                </div>
                <div class="item">
                    <h2><?= ($detail->backers == null) ? 0 : $detail->backers; ?></h2>
                    <div class="sub">
                        backers
                    </div>
                </div>
                <div class="item">
                    <h2><?= $detail->deadline; ?></h2>
                    <div class="sub">
                        hours to go
                    </div>
                </div>
                <div class="item">
                    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>?page=project-detail&project_id=<?= $detail->id; ?>" class="form">
                        <div class="field">
                            <label for="">Backs (Rp)</label>
                            <input type="number" placeholder="10000" name="donation" required>
                        </div>
                        <button type="submit" class="button green big">Back This Project</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="description">
            <?= $detail->description; ?>
        </div>
    </div>
    
</div>

<?php endif; ?>