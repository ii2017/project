<?php
$host = 'localhost';
$username = 'root';
$passwd = '';
$dbname = 'staff';

$img_dir    = './img/';

$sql_kind   = '';
$result_msg = '';
$data       = array();
$err_msg    = array();

if (isset($_POST['sql_kind']) === TRUE) {
    $sql_kind = $_POST['sql_kind'];
}
if ($sql_kind === 'insert') {

    $shoes_num   = '';
    $price  = '';
    $color = '';
    $size = '';
    $status = '';
    $img1 = '';
    $img2 = '';
    $img3 = '';
    $img4 = '';
    $img5 = '';
    

    if (isset($_POST['shoes_num']) === TRUE) {
        $shoes_num = preg_replace('/\A[　\s]*|[　\s]*\z/u', '', $_POST['shoes_num']);
    }

    if (isset($_POST['price']) === TRUE) {
        $price = preg_replace('/\A[　\s]*|[　\s]*\z/u', '', $_POST['price']);
    }

    if (isset($_POST['status']) === TRUE) {
        $status = $_POST['status'];
    }
    if (isset($_POST['color']) === TRUE) {
        $color = preg_replace('/\A[　\s]*|[　\s]*\z/u', '', $_POST['color']);
    }
    if (isset($_POST['size']) === TRUE) {
        $size = preg_replace('/\A[　\s]*|[　\s]*\z/u', '', $_POST['size']);
    }

    if (isset($_POST['img1']) === TRUE) {
        $status = $_POST['img1'];
    }
    if (isset($_POST['img2']) === TRUE) {
        $status = $_POST['img2'];
    }
    if (isset($_POST['img3']) === TRUE) {
        $status = $_POST['img3'];
    }
    if (isset($_POST['img4']) === TRUE) {
        $status = $_POST['img4'];
    }
    if (isset($_POST['img5']) === TRUE) {
        $status = $_POST['img5'];
    }

    if ($shoes_num === '') {
        $err_msg[] = '名前を入力してください。';
    }else if (preg_match('/^[0-9]{4}-[0-9]{4}$/', $shoes_num)!== 1) {
        $err_msg[] = '正しく入力してください';
    }

    if ($price === '') {
        $err_msg[] = '値段を入力してください。';
    } else if (preg_match('/\A\d+\z/', $price) !== 1 ) {
        $err_msg[] = '値段は半角数字を入力してください';
    } 
    if ($color === '') {
        $err_msg[] = '色を入力してください。';
    } else if (preg_match('/[a-zA-Z]/', $color) !== 1 ) {
        $err_msg[] = '色を正しく入力してください';
    } 
    // if ($size === '') {
    //     $err_msg[] = 'サイズを入力してください。';
    // } else if (preg_match('/\A\d+\z/', $size) !== 1 ) {
    //     $err_msg[] = 'サイズは半角数字を入力してください';
    // } 

    if (preg_match('/\A[01]\z/', $status) !== 1 ) {
        $err_msg[] = '不正な処理です';
    }
    if (is_uploaded_file($_FILES['img1']['tmp_name']) === TRUE) {
        $img1 = $_FILES['img1']['name'];
        $extension = pathinfo($img1, PATHINFO_EXTENSION);
        if ($extension === 'jpg' || $extension == 'jpeg' || $extension == 'png') {
            $img1 = md5(uniqid(mt_rand(), true)) . '.' . $extension;
            if (is_file($img_dir . $img1) !== TRUE) {
                if (move_uploaded_file($_FILES['img1']['tmp_name'], $img_dir . $img1) !== TRUE) {
                    $err_msg[] = 'ファイルアップロードに失敗しました';
                }
            } else {
                $err_msg[] = 'ファイルアップロードに失敗しました。再度お試しください。';
            }

        } else {
            $err_msg[] = 'ファイル形式が異なります。画像ファイルはJPEG又はPNGのみ利用可能です。';
        }

    } else {
        $img1 = '';
    }
    if (is_uploaded_file($_FILES['img2']['tmp_name']) === TRUE) {
        $img2 = $_FILES['img2']['name'];
        $extension = pathinfo($img2, PATHINFO_EXTENSION);
        if ($extension === 'jpg' || $extension == 'jpeg' || $extension == 'png') {
            $img2 = md5(uniqid(mt_rand(), true)) . '.' . $extension;
            if (is_file($img_dir . $img2) !== TRUE) {
                if (move_uploaded_file($_FILES['img2']['tmp_name'], $img_dir . $img2) !== TRUE) {
                    $err_msg[] = 'ファイルアップロードに失敗しました';
                }
            } else {
                $err_msg[] = 'ファイルアップロードに失敗しました。再度お試しください。';
            }

        } else {
            $err_msg[] = 'ファイル形式が異なります。画像ファイルはJPEG又はPNGのみ利用可能です。';
        }

    } else {
        $img2 = '';
    }
    if (is_uploaded_file($_FILES['img3']['tmp_name']) === TRUE) {
        $img3 = $_FILES['img3']['name'];
        $extension = pathinfo($img3, PATHINFO_EXTENSION);
        if ($extension === 'jpg' || $extension == 'jpeg' || $extension == 'png') {
            $img3 = md5(uniqid(mt_rand(), true)) . '.' . $extension;
            if (is_file($img_dir . $img3) !== TRUE) {
                if (move_uploaded_file($_FILES['img3']['tmp_name'], $img_dir . $img3) !== TRUE) {
                    $err_msg[] = 'ファイルアップロードに失敗しました';
                }
            } else {
                $err_msg[] = 'ファイルアップロードに失敗しました。再度お試しください。';
            }

        } else {
            $err_msg[] = 'ファイル形式が異なります。画像ファイルはJPEG又はPNGのみ利用可能です。';
        }

    } else {
        $img3 = '';
    }
    if (is_uploaded_file($_FILES['img4']['tmp_name']) === TRUE) {
        $img4 = $_FILES['img4']['name'];
        $extension = pathinfo($img4, PATHINFO_EXTENSION);
        if ($extension === 'jpg' || $extension == 'jpeg' || $extension == 'png') {
            $img4 = md5(uniqid(mt_rand(), true)) . '.' . $extension;
            if (is_file($img_dir . $img4) !== TRUE) {
                if (move_uploaded_file($_FILES['img4']['tmp_name'], $img_dir . $img4) !== TRUE) {
                    $err_msg[] = 'ファイルアップロードに失敗しました';
                }
            } else {
                $err_msg[] = 'ファイルアップロードに失敗しました。再度お試しください。';
            }

        } else {
            $err_msg[] = 'ファイル形式が異なります。画像ファイルはJPEG又はPNGのみ利用可能です。';
        }

    } else {
        $img4 == '';
    }
    if (is_uploaded_file($_FILES['img5']['tmp_name']) === TRUE) {
        $img5 = $_FILES['img5']['name'];
        $extension = pathinfo($img5, PATHINFO_EXTENSION);
        if ($extension === 'jpg' || $extension == 'jpeg' || $extension == 'png') {
            $img5 = md5(uniqid(mt_rand(), true)) . '.' . $extension;
            if (is_file($img_dir . $img5) !== TRUE) {
                if (move_uploaded_file($_FILES['img5']['tmp_name'], $img_dir . $img5) !== TRUE) {
                    $err_msg[] = 'ファイルアップロードに失敗しました';
                }
            } else {
                $err_msg[] = 'ファイルアップロードに失敗しました。再度お試しください。';
            }

        } else {
            $err_msg[] = 'ファイル形式が異なります。画像ファイルはJPEG又はPNGのみ利用可能です。';
        }

    } else {
        $img5 == '';
    }
    
    
} else if ($sql_kind === 'change') {

    $status = '';
    $shoes_id      = '';

    if (isset($_POST['status']) === TRUE) {
        $status = $_POST['status'];
    }

    if (isset($_POST['shoes_id']) === TRUE) {
        $shoes_id = $_POST['shoes_id'];
    }

    if (preg_match('/\A[01]\z/', $status) !== 1 ) {
        $err_msg[] = '不正な処理です';
    }

    if (preg_match('/\A\d+\z/', $shoes_id) !== 1 ) {
        $err_msg[] = '不正な処理です';
    }

}
$link = mysqli_connect($host, $username, $passwd, $dbname);

mysqli_set_charset($link, 'utf8');
//確認！
if ($link) {

    if (count($err_msg) === 0 && $_SERVER['REQUEST_METHOD'] === 'POST') {

        if ($sql_kind === 'insert') {
            $sql = 'INSERT INTO total_table (img1, img2, img3, img4, img5, shoes_num, price, color, size, status) 
                    VALUES ("' . $img1 . '","' . $img2 . '","' . $img3 . '","' . $img4 . '","' . $img5 . '", "' . $shoes_num . '", "' . $price . '","' . $color . '","' . $size . '", ' . $status . ')';


            if (mysqli_query($link, $sql) === TRUE) {
                 $result_msg =  '追加成功';
                } else {
                    $err_msg[] = '追加失敗';
                }
            
        } else if ($sql_kind === 'change') {

            $sql = 'UPDATE total_table SET status = ' . $status . ' WHERE shoes_id = ' . $shoes_id . ' LIMIT 1 ';

            if (mysqli_query($link, $sql) === TRUE) {
                $result_msg = 'ステータス変更成功';
            } else {
                $err_msg[] = 'ステータス変更失敗';
            }
        }
    }
    $sql = 'SELECT shoes_id, img1, img2, img3, img4, img5, shoes_num,
             price, color, size, status
            FROM total_table ORDER BY shoes_id DESC';

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
            $data[$i]['status'] = htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8');
            
            $i++;
        }

    } else {
        $err_msg[] = '予期せぬエラーが発生しました。管理者へお問い合わせください。【CODE:1】';

    }

    mysqli_free_result($result);
    mysqli_close($link);
    
   
} else {
    $err_msg[] = '予期せぬエラーが発生しました。管理者へお問い合わせください。【CODE:2】';
}
    

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ESPERANZA</title>
</head>
<body>
<?php if (empty($result_msg) !== TRUE) { ?>
    <p><?php print $result_msg; ?></p>
<?php } ?>
<?php foreach ($err_msg as $value) { ?>
    <p><?php print $value; ?></p>
<?php } ?>
    <style>
        section {
            margin-bottom: 20px;
            border-top: solid 1px;
        }

        table {
            width: 770px;
            border-collapse: collapse;
        }

        table, tr, th, td {
            border: solid 1px;
            padding: 10px;
            text-align: center;
        }

        caption {
            text-align: left;
        }

        .text_align_right {
            text-align: right;
        }

        .shoes_name_width {
            width: 100px;
        }

        .input_text_width {
            width: 60px;
        }

        .status_false {
            background-color: #A9A9A9;
        }
        .goods_pics{
            width:100px;
            height:150px;
        }
        
    </style>
    
<h1>商品写真UPツール</h1>
    <section>
        <h2>商品写真</h2>
        <form method="post" enctype="multipart/form-data">
            <div><label>名前: <input type="text" name="shoes_num" placeholder="0000-0000" value=""></label></div>
            <div><label>値段: <input type="text" name="price" value=""></label></div>
            <div><label>色：<input type="text" name="color" value=""></label></div>
            <div><label>サイズ：<input type="text" name="size" value=""></label></div>
            
            <div><input type="file" name="img1"></div>
            <div><input type="file" name="img2"></div>
            <div><input type="file" name="img3"></div>
            <div><input type="file" name="img4"></div>
            <div><input type="file" name="img5"></div>
            
            <div>
                <select name="status">
                    <option value="0">非公開</option>
                    <option value="1">公開</option>
                </select>
            </div>
            
            <input type="hidden" name="sql_kind" value="insert">
            <div><input type="submit" value="■□■□■写真追加■□■□■"></div>
        </form>
    </section>
    <section>
        <h2>商品情報変更</h2>
        <table>
            <caption>商品一覧</caption>
            <tr>
                <th>商品画像1</th>
                <th>商品画像2</th>
                <th>商品画像3</th>
                <th>商品画像4</th>
                <th>商品画像5</th>
                <th>商品名</th>
                <th>価格</th>
                <th>色</th>
                <th>サイズ</th>
                <th>ステータス</th>
            </tr>
        <?php foreach ($data as $value)  { ?>
            <?php if ($value['status'] === '1') { ?>
            <tr>
            <?php } else { ?>
                <tr class="status_false">
<?php } ?>
            <form method="post">
                <td><img class="goods_pics" src="<?php print $img_dir . $value['img1']; ?>"></td>
                <td><img class="goods_pics" src="<?php print $img_dir . $value['img2']; ?>"></td>
                <td><img class="goods_pics" src="<?php print $img_dir . $value['img3']; ?>"></td>
                <td><img class="goods_pics" src="<?php print $img_dir . $value['img4']; ?>"></td>
                <td><img class="goods_pics" src="<?php print $img_dir . $value['img5']; ?>"></td>

                <td class="shoes_name_width"><?php print $value['shoes_num']; ?></td>
                <td class="text_align_right"><?php print $value['price']; ?>HKD</td>
                <td class="shoes_name_width"><?php print $value['color']; ?></td>
                <td class="shoes_name_width"><?php print $value['size']; ?>cm</td>
                    <input type="hidden" name="shoes_id" value="<?php print $value['shoes_id']; ?>">
                    <input type="hidden" name="sql_kind" value="update">
                </form>
                <form method="post">
<?php if ($value['status'] === '1') { ?>
                    <td><input type="submit" value="公開 → 非公開"></td>
                    <input type="hidden" name="status" value="0">
<?php } else { ?>
                    <td><input type="submit" value="非公開 → 公開"></td>
                    <input type="hidden" name="status" value="1">
<?php } ?>
                    <input type="hidden" name="shoes_id" value="<?php print $value['shoes_id']; ?>">
                    <input type="hidden" name="sql_kind" value="change">
                </form>
            <tr>
<?php } ?>
        </table>
    </section>
</body>
</html>