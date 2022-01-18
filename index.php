
<?php include('restartCookie.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Ilia Kipshidze" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/alk-life.min.css">
    <title>ილია ყიფშიძე - spaceX</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        var windowsize = $(window).width();
        $(".open_menu").click(function(){
            $(".menu_list").toggle("slow");
        });
        if(windowsize > 840){
            $('.menu_list').css('display', 'block');
        }
        else{
            $('menu_list').css('display', 'none');
        }
    });
    $(window).resize(function(){
        var windowsize = $(window).width();
        if(windowsize > 840){
            $('.menu_list').css('display', 'block');
        }
        else{
            $('menu_list').css('display', 'none');
        }
    });
    </script>

</head>
<body id="mtavari" onload="setActiveMenuListColor()">
    <video autoplay muted loop id="myVideo">
        <source src="images/vid.mp4" type="video/mp4">
    </video>
    <div class="main_page">
        <header>
            <img class="open_menu" src="images/icons8_menu_96px_1.png" alt="">
            <div class="logo">
                <h1><a href="index.php">space</a></h1>
            </div>
            <div class="menu">
                <ul class="menu_list">
                    <li><a id="mtavari" href="index.php">მთავარი</a></li>
                    <li><a id="planetebi" href="planets.php">პლანეტები</a></li>
                    <li><a id="chvenShesaxeb" href="about.php">ჩვენ შესახებ</a></li>
                    <li><a href="contact.php">კონტაქტი</a></li>
                </ul>
            </div>
        </header>
        <div class="user_profile">
            <?php include('profile.php') ?>
        </div>
        <main class="index_main">
            <div class="social_media">
                <a href=""><img src="images/icons8_Facebook_96px.png" alt=""></a>
                <a href=""><img src="images/icons8_instagram_old_96px.png" alt=""></a>
                <a href=""><img src="images/icons8_old_twitter_logo_96px.png" alt=""></a>
                <a href=""><img src="images/icons8_youtube_logo_96px.png" alt=""></a>
            </div>
            <div class="center_news">
                <div class="prev"><img src="images/icons8_prev_200px.png" alt=""></div>
                <div class="main_news">
                    <a class="main_news_image_a" href=""><img src="images/cosmos.jpg" alt=""></a>
                    <h2><a href="">მეცნიერებმა პირველი კოსმოსური კალენდარი შექმნეს</a></h2>
                    <h4>დაიხრჩო გაკვეთილად მრეწველობა გამოვუცხადე აირჩიო, დასკუპდა თვალი. 
                        გაძრწუნებს დაჰხეთქოდა მიხედვის თვალი გაიშხლართნენ მრეწველობა. 
                        კავშირს გაუბზარა აირჩიო გაიშხლართნენ გადაუხადეს გასართობი წასაყვანად დაჰხეთქოდა.
                    </h4>
                    <time datetime="2008-02-14 20:00">2008-02-14 20:00</time>
                    <button class="show_more">ვრცლად</button>
                </div>
                <div class="next"><img src="images/icons8_next_200px.png" alt=""></div>
            </div>
            
            <div class="popular_news">
                <h2>პოპულარული</h2>
                <div>
                    <h3>
                        <a href="">ჩინეთში "ხელოვნურ მთვარეს" ქმნიან, რომელსაც მცირე გრავიტაციის სიმულირება შეუძლია</a>
                    </h3>
                    <div class="seen line1"></div>
                    <h5>21897 ნახვა</h5>
                </div>
                <div>
                    <h3>
                       <a href="">შესაძლოა, კოსმოსი ობოლი პლანეტებით იყოს სავსე, რომელთა დანახვასაც მალე შევძლებთ</a>
                    </h4>
                    <div class="seen line2"></div>
                    <h5>20906 ნახვა</h5>
                </div>
                <div>
                    <h3>
                      <a href="">NASA გეტყვით, რა გადაიღო თქვენი დაბადების დღეს ჰაბლის ტელესკოპმა კოსმოსში</a>
                    </h3>
                    <div class="seen line3"></div>
                    <h5>18897 ნახვა</h5>
                </div>
                <div>
                    <h3>
                        <a href="">კოსმოსური ტურიზმი რეალური ხდება — მილიარდერი რიჩარდ ბრენსონი კოსმოსში პირველად გაფრინდა</a>
                    </h3>
                    <div class="seen line4"></div>
                    <h5>15887 ნახვა</h5>
                </div>
                <div>
                    <h3>
                        <a href="">ილონ მასკი კოსმოსურ ხომალდ Starship-ის გიგანტურ ტელესკოპად გადაკეთებაზე საუბრობს</a>
                    </h3>
                    <div class="seen line5"></div>
                    <h5>12763 ნახვა</h5>
                </div>
                <div>
                    <h3>
                        <a href="">როგორ წარმოედგინათ კოსმოსი საბჭოთა სამეცნიერო ჟურნალებს — ფოტოები</a>
                    </h3>
                    <div class="seen line6"></div>
                    <h5>10763 ნახვა</h5>
                </div>
                <div>
                    <h3>
                        <a href="">მსოფლიოში პირველად, CRISPR-ის ტექნოლოგია კოსმოსში გამოიყენეს</a>
                    </h3>
                    <div class="seen line7"></div>
                    <h5>8789 ნახვა</h5>
                </div>
            </div>
        </main>
    </div>
    <script src="index.js"></script>
</body>
</html>