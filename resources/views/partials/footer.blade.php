<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Footer</title>
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <footer class="footer">
        <div class="footer-left">
            <h3>Payment Method</h3>
            <div class="credit-cards">
                <img src="{{ asset('img/visa.png') }}" alt="">
                <img src="{{ asset('img/mastercard.png') }}" alt="">
                <img src="{{ asset('img/paypal.png') }}" alt="">
            </div>
            <p class="footer-copyright"><i class="fa-regular fa-copyright"></i> Milenialstuff</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Indonesia</span>Senayan, Jakarta Pusat</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>+62 077-777-77</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:milenial1229@gmail.com">milenialstuff@gmail.com</a></p>
            </div>
        </div>

        <div class="footer-right">
            <p class="footer-about">
                <span>About</span>
                Selamat datang di Milenialstuff, website terpercaya untuk memenuhi kebutuhan sneakers, apparel, dan accesories terkini. Kami menawarkan koleksi terbaru dan terbaik yang cocok untuk jiwa muda dan gaya hidup milenial.
            </p>

            <div class="footer-media">
                <a href="#"><i class="fa fa-youtube"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>

    </footer>
</body>
</html>
