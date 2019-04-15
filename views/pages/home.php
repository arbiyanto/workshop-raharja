<?php
$data = runQuery(
    "SELECT projects.*, (SELECT SUM(donation) FROM backers WHERE project_id=projects.id) donation FROM projects"
, [])->fetchAll(PDO::FETCH_CLASS);
?>
<title>Homepage</title>
<style>
    #navigation {
        position: absolute;
        z-index: 99;
    }
    #navigation .item {
        color: #fff;
    }
    #navigation .item:not(.logo):hover {
        border-color: #fff;
    }
    #hero-header {
        height: 500px;
        background-image: url('assets/images/bg-workshop.png');
        background-size: cover;
    }
    #hero-header {
        position: relative;
        overflow: hidden;
        color: #fff;
    }
    #hero-header .content {
        position: relative;
        z-index: 2;
        margin-top: 120px;
    }
    #hero-header .content .title {
        font-size: 3em;
    }
    #hero-header .content .sub-title {
        font-size: 1.75em;
        font-weight: 300;
        margin-top: 15px;
        opacity: 0.8;
        margin-bottom: 55px;
    }

    .background-cover {
        position: absolute;
        background: rgb(0,0,0);
        background: linear-gradient(90deg, rgba(0,0,0,0.65) 0%, rgba(0,0,0,0.07) 100%, rgba(0,0,0,0.31) 100%);
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        z-index: 1;
    }

    #latest-project {
        margin-top: 35px;
    }
    #latest-project .items {
        display: flex;
        align-items: flex-start;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 25px;
    }
    #latest-project .items > .item {
        width: 30%;
        box-shadow: 0 1px 2px 2px #C4C4C4;
        font-size: 1.125em;
        border-radius: 12px;
        margin-bottom: 35px;
        text-decoration: none;
        color: #3A3A3A;
        cursor: pointer;
    }
    #latest-project .items > .item .image {
        width: 100%;
        height: 177px;
        overflow: hidden;
    }
    #latest-project .items > .item .image img {
        width: 100%;
    }
    #latest-project .items > .item .content {
        padding: 15px;
    }
    #latest-project .items > .item .title, .goal-title {
        font-weight: bold;
        color: #43A02F;
        line-height: 180%;
    }
    #latest-project .items > .item .description {
        margin-top: 5px;
        color: #969696;
    }
    #latest-project .items > .item .goal {
        margin-top: 15px;
    }
    @media only screen and (max-width: 768px) {
        #hero-header {
            height: 450px;
        }
        #hero-header .content .title {
            font-size: 2em;
        }
        #hero-header .content .sub-title {
            font-size: 1.35em;
        }

        #latest-project .items > .item{
            width: 100%;
        }
    }
</style>

<div id="hero-header">
    <div class="background-cover"></div>
    <div class="content">
        <div class="container">
            <h1 class="title">
                Don’t say later.<br>
                Start your creativity now.
            </h1>
            <div class="sub-title">
                Get Started Today.
            </div>
            <a href="<?= (!isset($_SESSION['user_id']))? '?page=sign-in' : '?page=start-project' ?>" class="button green big">
                Start a Project
            </a>
        </div>
    </div>
</div>

<div id="latest-project">
    <div class="container">
        <h2>Latest Project Here</h2>
        <div class="items">
            <?php foreach ($data as $d): ?>
            <a href="?page=project-detail&project_id=<?= $d->id; ?>" class="item">
                <div class="image">
                    <img src="uploads/<?= $d->image ?>" alt="">
                </div>
                <div class="content">
                    <div class="title">
                        <?= (strlen($d->title) > 30 ) ? substr($d->title, 0, 30). '...' : $d->title; ?>
                    </div>
                    <div class="description">
                        <?= (strlen($d->description) > 70 ) ? substr($d->description, 0, 70). '...' : $d->description; ?>
                    </div>
                    <div class="goal">
                        <div class="goal-title">Goal</div>
                        <div class="goal-description">
                            <b>Rp <?= number_format($d->donation, 0, ',', '.') ?></b> of Rp. <?= number_format($d->goal, 0, ',', '.') ?>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>