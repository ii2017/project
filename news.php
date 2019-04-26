<?php 
// MySQL接続情報

$host = 'localhost';
$username = 'root';
$passwd = '';
$dbname = 'staff';

$sql     = '';
$img_dir = './img/';
$data    = array();
$err_msg = array();
$pics_data = array();
$news_data = array();

$link = mysqli_connect($host, $username, $passwd, $dbname);

if ($link) {

    mysqli_set_charset($link, 'utf8');

    $sql='SELECT news_comment, date FROM news_table ORDER BY news_id DESC';
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {

        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $news_data[$i]['news_comment'] = htmlspecialchars($row['news_comment'], ENT_QUOTES, 'UTF-8');
            $news_data[$i]['date'] = htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8');
            $i++;
        }
    
    } else {
        $err_msg[] = 'error【CODE:4】';
    }

    mysqli_free_result($result);
    mysqli_close($link);

} else {
    $err_msg[] = 'error【CODE:1】';
}
?>
<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ESPERANZA</title>
    <link rel="stylesheet" href="final5.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container">
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.6";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        
    </script>
<header>
    <div class="top">
        <!--<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-xs-12">-->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <a href="test11.php"><img class="title" src="img/sitetitle.jpg"></a>
                </div>
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-9 col-xs-12">
                    <ul>
                        <li><a href="concept.php">concept</a></li>
                        <li><a href="item.php">company</a></li>
                        <li><a href="shop.php">shop list</a></li>
                    </ul>
                </div>
                
            </div>
        </div>
        
    </div>
</header>
<body>
<div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
<div class="news-detail">
    <p class="news_top"> News</p>
                <?php foreach ($news_data as $value4) { ?>
                <ul>
                <li><?php print $value4['news_comment']; ?>
                <?php print $value4['date']; ?></li>
                </ul><?php } ?>
    
</div>
</div>
    
</body>