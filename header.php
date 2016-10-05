<title>A Stack of Uapians</title>
<link rel="shortcut icon" href="images/tiittleimage.ico"/>

<meta name="title" content="Uapians.Net"/>
<meta name="description" content="An Exclusive Website only for Uapians..."/>
<link rel="image_src" href="http://www.uapians.net/images/tittleimage.png"/>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">

<!-- GOOGLE WEB Fonts END HERE -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine|Open+Sans|Josefin|Slab|Arvo|Lato|Vollkorn|Abril+Fetface|Ubuntu|Droid+Sans|Junction|Fertigo|Audimat|Fontin|Yatra+One|Exo&effect=fire-animation|neon|vintage|3d-float|3d">
<!-- GOOGLE WEB Fonts END HERE -->
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<link rel="stylesheet" type="text/css" href="engine1/style.css"/>
<script type="text/javascript" src="engine1/jquery.js"></script>

<meta charset='utf-8'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style_new.css">
<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="engine1/script.js"></script>

<!-- FACEBOOK LIKE PLUGIN JS CODE STARTS HERE -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=730817237009079";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- FACEBOOK LIKE PLUGIN JS CODE ENDS HERE -->

<!-- PHOTO GALLERY MODAL JS CODE STARTS HERE -->

<script>
    function openModal() {
        document.getElementById('myModal').style.display = "block";
    }

    function closeModal() {
        document.getElementById('myModal').style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>

<!-- PHOTO GALLERY MODAL JS CODE STARTS HERE -->
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>


