
<?php include('restartCookie.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Ilia Kipshidze" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/alk-life.min.css">
    <title>ჩვენ შესახებ</title>
    
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
    $(document).ready(function(){
        $(".aboutCompany").click(function(){
            $(".aboutCompanyUl").toggle("slow");
        });
    });
    $(document).ready(function(){
        $(".employees").click(function(){
            $(".allEmployee").toggle("slow");
        });
    });
    $(document).ready(function(){
        $(".shortHistory").click(function(){
            $(".shortHistoryP").toggle("slow");
        });
    });
    $(document).ready(function(){
        $(".interests").click(function(){
            $(".interestsP").toggle("slow");
        });
    });
    $(document).ready(function(){
        $(".plans").click(function(){
            $(".plansP").toggle("slow");
        });
    });
    $(document).ready(function(){
        $(".otherEmployees").click(function(){
            $(".employeed").toggle("slow");
        });
    });
    $(document).ready(function(){
        $(".directors").click(function(){
            $(".director").toggle("slow");
        });
    });
    </script>

</head>
<body id="chvenShesaxeb" onload="setActiveMenuListColor()">
    <video autoplay muted loop id="myVideo">
        <source src="images/vid.mp4" type="video/mp4">
    </video>
    <div class="main_page">
        <header>
            <img class="open_menu" src="images/icons8_menu_96px_1.png" alt="">
            <!-- <img class="close_menu" src="images/icons8_delete_80px.png" alt=""> -->
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
        <main class="about_main">
            <ul>
                <li>
                    <h2 class="aboutCompany">კომპანიის დაფუძნების ისტორია და მიზნები</h2>
                    <ul class="aboutCompanyUl">
                        <li>
                            <h3 class="shortHistory">მოკლე ისტორია; როდის და რატომ გაჩნდა space</h3>
                            <p class="shortHistoryP">
                                მოკალათებულ სისტემისთვის ლაკანის ბერულავა დინ ისურვა ბინდი გამოვლილი პუბლიცისტიკის, 
                                ვასო პეტრიაშვილისგან მაიმუნს მარტის. შემავსებელი ქვეყნისა ოფლმა გამოვლილი მიარტყამდე გადაიბერტყე 
                                ლაკანის, ცოცხზედა ელინებს ბინდი ცხენზედ. ოფლმა სუნთქვაზე გადაიბერტყე ჰარპერისა შეშლილობა 
                                დადიანის სისტემისთვის გახდის შეგუებიან სამსახური ეჩვენა, 
                                მოიშორა ცხენზედ ადღეგრძელოს თანახმანი. ანტიქრისტე სუნთქვაზე ღილი დინ ლაკანის მარტის.
                            </p>
                        </li>
                        <li>
                            <h3 class="interests">ინტერესის სფეროები</h3>
                            <p class="interestsP">
                                მოკალათებულ სისტემისთვის ლაკანის ბერულავა დინ ისურვა ბინდი გამოვლილი პუბლიცისტიკის, 
                                ვასო პეტრიაშვილისგან მაიმუნს მარტის. შემავსებელი ქვეყნისა ოფლმა გამოვლილი მიარტყამდე გადაიბერტყე 
                                ლაკანის, ცოცხზედა ელინებს ბინდი ცხენზედ. ოფლმა სუნთქვაზე გადაიბერტყე ჰარპერისა შეშლილობა 
                                დადიანის სისტემისთვის გახდის შეგუებიან სამსახური ეჩვენა, 
                                მოიშორა ცხენზედ ადღეგრძელოს თანახმანი. ანტიქრისტე სუნთქვაზე ღილი დინ ლაკანის მარტის.
                            </p>

                        </li>
                        <li>
                            <h3 class="plans">მიზნები და ამოცანები</h3>
                            <p class="plansP">
                                მოკალათებულ სისტემისთვის ლაკანის ბერულავა დინ ისურვა ბინდი გამოვლილი პუბლიცისტიკის, 
                                ვასო პეტრიაშვილისგან მაიმუნს მარტის. შემავსებელი ქვეყნისა ოფლმა გამოვლილი მიარტყამდე გადაიბერტყე 
                                ლაკანის, ცოცხზედა ელინებს ბინდი ცხენზედ. ოფლმა სუნთქვაზე გადაიბერტყე ჰარპერისა შეშლილობა 
                                დადიანის სისტემისთვის გახდის შეგუებიან სამსახური ეჩვენა, 
                                მოიშორა ცხენზედ ადღეგრძელოს თანახმანი. ანტიქრისტე სუნთქვაზე ღილი დინ ლაკანის მარტის.
                            </p>
                        </li>
                    </ul>
                </li>
                <li>
                    <h2 class="employees">დამფუძნებლები და თანამშრომლები</h2>
                    <div class="allEmployee">
                        <h2 class="directors">დამფუძნებლები</h2>
                        <div class="directorsDiv">
                            <div class="director">
                                <img src="images/cc.jpg" alt="">
                                <h3>ილია ყიფშიძე</h3>
                            </div>
                            <div class="director">
                                <img src="images/cc.jpg" alt="">
                                <h3>ლევან გაგუა</h3>
                            </div>
                            <div class="director">
                                <img src="images/cc.jpg" alt="">
                                <h3>ვახტანგ ბიძიშვილი</h3>
                            </div>
                        </div>
                        <h2 class="otherEmployees">თანამშრომლები</h2>
                        <div class="otherEmployeesDiv">
                            <div class="employeed">
                                <img src="images/cc.jpg" alt="">
                                <h3>ნოდარ ხვედელიძე</h3>
                            </div>
                            <div class="employeed">
                                <img src="images/cc.jpg" alt="">
                                <h3>ნანა ჯავახია</h3>
                            </div>
                            <div class="employeed">
                                <img src="images/cc.jpg" alt="">
                                <h3>მურმან გეგუჩაძე</h3>
                            </div>
                            <div class="employeed">
                                <img src="images/cc.jpg" alt="">
                                <h3>თეონა წიკლაური</h3>
                            </div>
                            <div class="employeed">
                                <img src="images/cc.jpg" alt="">
                                <h3>გუგა ჩარკვიანი</h3>
                            </div>
                            <div class="employeed">
                                <img src="images/cc.jpg" alt="">
                                <h3>დავით საჯაია</h3>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </main>
    </div>
    <script src="index.js"></script>
</body>
</html>