<?php
//変数の初期化
$error = [];

$post = [
    'name'=>'',
    'email'=>'',
    'subject'=>'',
    'message'=>''
];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    /*nameのチェック*/
    $post['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES);
    /*nameが空白ならエラーを返す*/
    if($post['name'] === ''){
        $error['name'] = 'blank';
    }
    /*emaiのチェック*/
    $post['email'] = htmlspecialchars($_POST['email'], ENT_QUOTES);
    /*mailが空白・書式が違えばエラーを返す*/
    if($post['email'] === ''){
        $error['email'] = 'blank';
    }else if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'email';
    }
    /*subjectのチェック*/
    $post['subject'] = htmlspecialchars($_POST['subject'], ENT_QUOTES);
    /*messageのチェック*/
    $post['message'] = htmlspecialchars($_POST['message'], ENT_QUOTES);
    /*messsageが空白ならエラーを返す*/
    if($post['message'] === ''){
        $error['message'] = 'blank';
    }

    /*エラーがなければmailを送信*/
    if(count($error) === 0){
        $to = 'keiky003@gmail.com';
        $from = $post['email'];
        $subject = $post['subject'];
        $body = <<<EOT
        名前 : {$post['name']}
        メールアドレス : {$post['email']}
        内容 : {$post['message']}
        EOT;
        
        mb_send_mail($to, $subject, $body, "From: {$from}");
    }
    header('Location: thanks.html');
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--BootstrapCSSの読み込み-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="style.css" rel="stylesheet">
        <meta name="description" content="ポートフォリオサイトです。">
        <title>kei's&nbsp;Portfolio</title>
        </head>
    <body>
        <header>
            <!--navbar section-->
            <nav class="navbar fixed-top navbar-expand-lg navbarScroll py-1">
                <div class="container">
                        <a class="navbar-brand" href="#">
                            <h2 class="text-white pt-1">Portforio</h2>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#About">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#Learning">Learning</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#Portfolio">Portfolio</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#Contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                </div>
              </nav>
        </header>
        <main>
            <!--hero section-->
            <div class="hero vh-100 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 text-center w-auto">
                            <h4 class="display-4 text-white text-sm-start">Welcome!My,site</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!--About section-->
            <section id="About">
                <div class="container mt-4 pb-3 pt-4 border-bottom boder-dark">
                    <div class="row mt-4">
                        <h1 class="text-center">About me</h1>
                        <div class="col-lg-4">
                            <img src="images/neko2.png" class="imageAbout" alt="">
                        </div>
                        <div class="col-lg-8 text-dark">
                            <p>皆様、初めまして。現在IT系の職業訓練を受講をしています。その中で学んだことをまとめるサイトを作成しました。</p>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <ul class="Aboutme text-dark list-unstyled border-top border-bottom border-second">
                                        <li>Name:&nbsp;潟山&nbsp;恵</li>
                                        <li>Age:&nbsp;31歳</li>
                                        <li>From:&nbsp;宮崎県</li>
                                        <li>Hobby:&nbsp;映画/海外ドラマ・ゲーム</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row-mt3">
                                <p>宮崎県出身の31才です。前職は、24才から6年間ほど消防設備士として官公庁や一般の建物の消防設備点検・設置工事の設計、施工に従事してきました。<br>
                                   従事している時に、Chatworkなどのツールに触れIT業界に興味を持ち始めました。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Learning section-->
            <section id="Learning">
                <div class="container mt-4 pt-4 pb-5 border-bottom boder-dark">
                    <div class="row mt-4">
                        <div class="col-md-8 mx-auto text-center">
                            <h1 class="sectiontitle">Learning</h1>
                            <p class="text-dark">学んできたことをご紹介します。</p>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-4 col-sm-4">
                            <div class="learning card-effect w-auto h-100">
                                <h5 class="mt-4 mb-2"><img src="images/HTML_icon.png" class="imageHTML" ait="">
                                <img src="images/CSS_icon.png" class="imageCSS" ait="">HTML/CSS</h5>
                                <p class="text-dark">主にwebクリエイター能力認定試験の公式テキストを使いながらHTML/CSSの書き方、レスポンシブデザインについて学びました。</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="learning card-effect w-auto h-100">
                                <h5 class="mt-4 mb-2"><img src="images/PHP_icon.png" class="imagePHP" alr="">PHP</h5>
                                <p class="text-dark">環境構築の仕方、基本構文、フォーム入力データの使い方、データベースとの連携を学びました。</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="learning card-effect w-auto h-100">
                                <h5 class="mt-4 mb-2"><img src="images/Java_icon.png" class="imageJava" ait="">Java</h5>
                                <p class="text-dark">基本情報技術者試験の為自己学習をしながら基本構文、オブジェクト志向を学んでいます。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Portfolio section-->
            <section id="Portfolio">
                <div class="container mt-4 pt-4 pb-5 border-bottom boder-dark">
                    <div class="row mt-4">
                        <div class="col-md-8 mx-auto text-center mt-4">
                            <h1>Portforio</h1>
                            <p class="text-dark">学習のアウトプットとして本サイトと作成した物を掲載しています。</p>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-6 col-sm-6">
                            <div class="portfolio card-effect w-auto h-100">
                                <h5 class="mt-4 mb-2 border-bottom border-dark">Website</h5>
                                    <img src="images/website.jpg" class="imageWebsite img-fluid" alt="">
                                <p class="text-break mt-3 text-dark">HTML/CSS,BootStrapを使いデザインしました。<br>
                                Bootstrapを使用しレスポンシブデザインに対応させました。<br>また、お問い合わせのメール送信処理は、PHPを使用しています。</p>
                                <div class="text-center">
                                    <a href="https://github.com/kkeeyy73/introduce.git"><img src="images/github_icon.png" class="githubimage" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="portfolio card-effect w-auto h-100">
                                <h5 class="mt-4 mb-2 border-bottom border-dark">ひとこと掲示板</h5>
                                <img src="images/bbs.png" class="imageBbs img-fluid" alt="">
                                <p class="text-break mt-3 text-dark">PHP,HTML/CSS,BootStrapを使いひとこと掲示板を作成しました。
                                ログイン機能、禁止文字の指定、投稿内容の削除機能を実装しました。</p>
                                <div class="text-center">
                                    <a href="https://hitokoto-bbs.com" class="btn btn-success">Link</a>
                                    <a href="https://github.com/kkeeyy73/bbs-PHP-.git"><img src="images/github_icon.png" class="githubimage" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Contact section-->
            <section id="Contact">
                <div class="container mt-4 pt-4 mb-5">
                    <div class="row">
                        <div class="col-md-8 mx-auto text-center">
                            <h1 class="mb-5">Contact</h1>
                            <p class="text-dark">最後までご覧いただきありがとうございました。もし、本サイトや私についてコメントがありましたら下記フォームをご利用ください。</p>
                            <form action="" method="POST" class="row g-3 justify-content-center">
                                <div class="col-md-5">
                                    <input type="text" name="name" id="inputName" class="form-control" placeholder="Name" value="<?php echo htmlspecialchars($post['name']); ?>">
                                    <?php if(isset($error['name']) && $error['name'] === 'blank'): ?>
                                        <p class="error_msg text-danger">※お名前をご記入ください</p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-5">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo htmlspecialchars($post['email']); ?>">
                                    <?php if(isset($error['email']) && $error['email'] === 'blank'): ?>
                                        <p class="error_msg text-danger">※メールアドレスをご記入ください</p>
                                    <?php endif; ?>
                                    <?php if(isset($error['email']) && $error['email'] === 'email'): ?>
                                        <p class="error_msg text-danger">※正しくご記入ください</p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" value="<?php echo htmlspecialchars($post['subject']); ?>">
                                </div>
                                <div class="col-md-10">
                                    <textarea name="message" cols="30" rows="10" class="form-control" placeholder="Message" value="<?php echo htmlspecialchars($post['message']); ?>"></textarea>
                                    <?php if(isset($error['message']) && $error['message'] === 'blank'): ?>
                                        <p class="error_msg text-danger">※メッセージ内容をご記入ください</p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-success">Contact Me</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--footer-->
        <footer class="footer-top">
            <div class="container">
                 <div class="row g-3 mx-auto text-center mb-1">
                    <small>Copylight &copy; 2022</small>
                 </div>
            </div>
        </footer>
        <!--navbarScrollのjs-->
        <script>
            const header = document.querySelector('.navbar');

            window.onscroll = function() {
                var top = window.scrollY;
                if(top >= 500) {
                    header.classList.add('navbarDark');
                }else {
                    header.classList.remove('navbarDark');
                }
            }
        </script>
        <!--BootstrapJsの読み込み-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
