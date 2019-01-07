<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?=$title?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="description" content="<?=$meta_desc?>"/>
    <meta name="keywords" content="<?=$meta_keywords?>"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>

<div id="content">
    <div class="navbar navbar-dark bg-dark">
        <div class="container d-flex justify-content-between">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <h3><strong><span class="badge badge-secondary">T</span>estWork</strong></h3>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <? if(isset($message_error)) { ?>
            <div class="col-12 my-4">
                <div class="alert alert-warning" role="alert">
                    <?=$message_error?>
                </div>
            </div>
            <? } ?>
            <? if(isset($message_success)) { ?>
            <div class="col-12 my-4">
                <div class="alert alert-success" role="alert">
                    <?=$message_success?>
                </div>
            </div>
            <? } ?>
            <?=$content?>
        </div>
    </div>
</div>
<br>

<script src="/js/main.js"></script>
</body>
</html>