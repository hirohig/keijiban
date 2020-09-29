<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>4eachblog 掲示板</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>
        
        <?php
        
        mb_internal_encoding("utf8");
        
        require "DB.php";
        $dbconnect = new DB();
        $pdo = $dbconnect->connect();
        
        $stmt = $pdo->prepare($dbconnect->select());
        $stmt->execute();
        
        ?>
        
        <header>
            <a href="#">
                <img src="4eachblog_logo.jpg" class="logo">
            </a>
            <ul class="menu">
                <li><a href="#">トップ</a></li>
                <li><a href="#">プロフィール</a></li>
                <li><a href="#">4eachについて</a></li>
                <li><a href="#">登録フォーム</a></li>
                <li><a href="#">問い合わせ</a></li>
                <li><a href="#">その他</a></li>
            </ul>
        </header>
        
        <main>
            <div class="main-container">
                <div class="left">
                    <div class="title">プログラミングに役立つ掲示板</div>
                    <br>

                    <form method="post" action="insert.php">
                        <div class="subtitle">入力フォーム</div>
                        <div class="input">
                            <div class="label">ハンドルネーム</div>
                            <input type="text" class="text" size="35" name="handlename">
                        </div>

                        <div class="input">
                            <div class="label">タイトル</div>
                            <input type="text" class="text" size="35" name="title">
                        </div>

                        <div class="input">
                            <div class="label">コメント</div>
                            <textarea cols="60" rows="7" name="comments"></textarea>
                        </div>

                        <div>
                            <input type="submit" class="submit" value="送信する">
                        </div>
                    </form>
                    
                    <?php
                    
                    while ($row = $stmt->fetch()) {
                        echo "<div class='article'>";
                        echo "<div class='subtitle'>".$row['title']."</div>";
                        echo "<div class='contents'>";
                        echo $row['comments'];
                        echo "</div>";
                        echo "<div class='handlename'>posted by".$row['handlename']."</div>";
                        echo "</div>";
                    }
                    
                    ?>

                </div>
            
                <div class="right">
                    <div class="side-box">
                        <div class="side-content">
                            <div class="subtitle">人気の記事</div>
                            <p><a href="#">PHPオススメ本</a></p>
                            <p><a href="#">PHP MyAdminの使い方</a></p>
                            <p><a href="#">今人気のエディタ Top5</a></p>
                            <p><a href="#">HTMLの基礎</a></p>
                        </div>
                        <div class="side-content">
                            <div class="subtitle">オススメリンク</div>
                            <p><a href="#">インターノウス株式会社</a></p>
                            <p><a href="#">XAMPPのダウンロード</a></p>
                            <p><a href="#">Eclipseのダウンロード</a></p>
                            <p><a href="#">Bracketsのダウンロード</a></p>
                        </div>
                        <div class="side-content">
                            <div class="subtitle">カテゴリ</div>
                            <p><a href="#">HTML</a></p>
                            <p><a href="#">PHP</a></p>
                            <p><a href="#">MySQL</a></p>
                            <p><a href="#">JavaScript</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <footer>
            copyright ©️ internous | 4each blog the which provides A to Z about programming.
        </footer>

    </body>

</html>