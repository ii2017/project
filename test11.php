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

    $sql = 'SELECT shoes_id, img1, img2, img3, img4, img5,
            shoes_num, price, color,size
            FROM total_table WHERE status = 1 ORDER BY shoes_id DESC LIMIT 12';

    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {

        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {

            $data[$i]['shoes_id'] = htmlspecialchars($row['shoes_id'], ENT_QUOTES, 'UTF-8');
            $data[$i]['img1'] = htmlspecialchars($row['img1'], ENT_QUOTES, 'UTF-8');
            $data[$i]['img2'] = htmlspecialchars($row['img2'], ENT_QUOTES, 'UTF-8');
            $data[$i]['img3'] = htmlspecialchars($row['img3'], ENT_QUOTES, 'UTF-8');
            $data[$i]['img4'] = htmlspecialchars($row['img4'], ENT_QUOTES, 'UTF-8');
            $data[$i]['img5'] = htmlspecialchars($row['img5'], ENT_QUOTES, 'UTF-8');
            $data[$i]['shoes_num'] = htmlspecialchars($row['shoes_num'], ENT_QUOTES, 'UTF-8');
            $data[$i]['price'] = htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8');
            $data[$i]['color'] = htmlspecialchars($row['color'], ENT_QUOTES, 'UTF-8');
            $data[$i]['size'] = htmlspecialchars($row['size'], ENT_QUOTES, 'UTF-8');


            $i++;
        }

    } else {
        $err_msg[] = 'error【CODE:2】';
    }
    $query ='SELECT pics FROM top_pics_table';
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {

        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $pics_data[$i]['pics'] = htmlspecialchars($row['pics'], ENT_QUOTES, 'UTF-8');
            $i++;
        }
    
    } else {
        $err_msg[] = 'error【CODE:3】';
    }
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
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <a href="test11.php"><img class="title" src="img/sitetitle.jpg"></a>
                </div>
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
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
<article>
<div class="row">
    <div class="col-lg-5 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 hidden-xs">
        <div class="top-img">
            <div id="slide" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#slide" data-slide-to="0" class="active"></li>
                    <li data-target="#slide" data-slide-to="1"></li>
                    <li data-target="#slide" data-slide-to="2"></li>
                </ol>
        
                <div class="carousel-inner">
                    <?php $index=0;?>
                    <?php foreach ($pics_data as $value1)  { ?> 
                    <div class="item<?php if ($index==0){ print ' active';} ?>"><img class="top-pics" src="<?php print $img_dir . $value1['pics']; ?>"></div>
                    <?php $index++; ?>
                    <?php } ?>
                    
                </div>
            </div>
        </div> 
    </div>    
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 ">
        <div class="fb">
            <div class="fb-page" data-href="https://www.facebook.com/esperanzahongkong/?fref=ts" 
            data-tabs="timeline" data-width="250px" data-height="280px" data-small-header="true" 
            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
            <div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/esperanzahongkong/?fref=ts">
            <a href="https://www.facebook.com/esperanzahongkong/?fref=ts">Esperanza Japan - HK Branch</a></blockquote></div></div>
        </div>
            
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
        <div class="news">
            <a href="news.php">
            <p class="news_top"> News</p>
            <?php foreach ($news_data as $value4) { ?>
            <ul>
            <li><?php print $value4['news_comment']; ?>
            <?php print $value4['date']; ?></li>
            </ul><?php } ?>
            </a>
        </div>
        <div class="JP_ESP">
            <a href="http://www.esp-shoe.com/ec/cmShopTopPage1.html"><img class="JP_ESP_pics" src="<?php print $img_dir . 'JP_ESP.png' ?>"></a>
        </div>
    </div>
</div>
    <div class="row row-0">
    
    <?php foreach ($data as $value2)  { ?>
                
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="new_img">
                <a href="test5.php?id=<?php print $value2['shoes_id']; ?>">
                    <img class="pics" src="<?php print $img_dir . $value2['img1']; ?>"><br/></span>
                    

                </a>
                </div>
                </div>
        
            <?php } ?>
            
    </div>
        
        <?php foreach ($err_msg as $value3) { ?>
        <p><?php print $value3; ?></p>
        <?php } ?>
<!--<p id="back-top">-->
<!--    <a href="#top"><span><img src="img/arrow_top.png" alt="↑" width="22" height="29" /></span></a></p>-->

    <script>
        $(document).ready(function() {
        $('.new_img')
          .hover(function() {
        $(this).stop(true, true).animate({ bottom: 10 }, 150);
          }, function() {
        $(this).stop(true, true).animate({ bottom: 0 }, 150);
          });
        $('.fb')
          .hover(function() {
        $(this).stop(true, true).animate({ bottom: 10 }, 150);
          }, function() {
        $(this).stop(true, true).animate({ bottom: 0 }, 150);
          });
        $('.news')
          .hover(function() {
        $(this).stop(true, true).animate({ bottom: 10 }, 150);
          }, function() {
        $(this).stop(true, true).animate({ bottom: 0 }, 150);
          });
         $('.JP_ESP')
          .hover(function() {
        $(this).stop(true, true).animate({ bottom: 10 }, 150);
          }, function() {
        $(this).stop(true, true).animate({ bottom: 0 }, 150);
          });
        $('header ul li')
          .hover(function() {
        $(this).stop(true, true).animate({ top: 5 }, 150);
          }, function() {
        $(this).stop(true, true).animate({ top: 0 }, 150);
          });
        $('.title')
          .hover(function() {
        $(this).stop(true, true).animate({ top: 5 }, 150);
          }, function() {
        $(this).stop(true, true).animate({ top: 0 }, 150);
          });
        });
        $(document).ready(function(){
    $("#back-top").hide();
        $(function () {
        $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#back-top').fadeIn();
            } else {
            $('#back-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-top a').click(function () {
            $('body,html').animate({
            scrollTop: 0
            }, 800);
            return false;
        });
    });
    $(function() {
	$(window).scroll(function(){
		if ($(window).scrollTop() > 100) {　/* 100ライン越えると表示 */
			$("#page-top").show();
		} else {
			$("#page-top").hide();
		}
	});
	$("#page-top").click(function () {
		$("html,body").animate({scrollTop:0}, 200);　/* スクロールの実行とスクロールする時間 */
	});
});
});

    </script>
</article>
<footer>
    <p><small>COPYRIGHT KOBE LEATHER(H.K.)LTD ALL RIGHT RESERVED.</small></p>
</footer>
    </div>
   
    </body>
    </html>