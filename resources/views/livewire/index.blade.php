@section('title', 'Home')
<div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
            </a>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carousel-1.svg" class="d-block w-100" alt="jordan">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel-2.svg" class="d-block w-100" alt="offwhite">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel-3.svg" class="d-block w-100" alt="stussy">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Card Special Offers Line 1 -->
    <section class="specialoffers" id="special">
        <h1 align="center">Special Offers &#128293;</h1>
        <div class="content">
            <div class="section">
                @foreach ($special1 as $items)
                    <div class="box">
                        <img src="{{ url('foto_produk/' . $items->photo) }}" alt="{{ $items->namaproduk }}"
                            height="50">
                        <h3>{{ $items->namaproduk }}</h3>
                        <h5>IDR {{ number_format($items->harga, 0, ',', ',') }}</h5>
                        <a href="#detailproduct" data-target="#detailproduct{{ $items->id }}">Lihat</a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Card Special Offers Line 2 -->
        <div class="content">
            <div class="section">
                @foreach ($special2 as $items)
                    <!-- Perbaikan: Ubah variabel menjadi $items -->
                    <div class="box">
                        <img src="{{ url('foto_produk/' . $items->photo) }}" alt="{{ $items->namaproduk }}"
                            height="50">
                        <h3>{{ $items->namaproduk }}</h3>
                        <h5>IDR {{ number_format($items->harga, 0, ',', ',') }}</h5>
                        <a href="#detailproduct" data-target="#detailproduct{{ $items->id }}">Lihat</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Konten New Product Arrival -->
    <div class="flex-container">
        <div>
            <h1 class="font-effect-fire-animation" align="center"> New Product Arrival </h1>
            <p align="center">ARTLANDTOKYO offer an array of premium products, ranging from their own in-house label to
                a
                curated selection of multi-brand furniture and collectibles.</p>
            <a href="#" align="center">Shop Now <i class="fa-solid fa-gift"></i></i></a>
        </div>
        <div>
            <img class="gambar-content" src="img/content-1.png" alt="kaws">
        </div>
    </div>

    <!-- Pop up Special 1 -->
    @foreach ($special1 as $item)
        <div class="popup" id="detailproduct{{ $item->id }}">
            <div class="popup-content">
                <button class="close">&times;</button>
                <h3 class="namaproduct_popup">{{ $item->namaproduk }}</h3>
                <img src="{{ url('foto_produk/' . $item->photo) }}" alt="{{ $item->namaproduk }}"
                    class="productimage_popup">
                <p class="hargaproduct_popup">IDR {{ number_format($item->harga, 0, ',', ',') }}</p>
                <p class="size">Size : {{ $item->size }}</p>
                <p class="stock">Stock : {{ $item->stock }} </p>
                <button class="buynow_popup add-to-cart" wire:click="beli({{ $item->id }})"><i
                        class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
            </div>
        </div>
    @endforeach

    <!-- Pop up Special 2 -->
    @foreach ($special2 as $item)
        <!-- Perbaikan: Ubah variabel menjadi $items -->
        <div class="popup" id="detailproduct{{ $item->id }}">
            <div class="popup-content">
                <button class="close">&times;</button>
                <h3 class="namaproduct_popup">{{ $item->namaproduk }}</h3>
                <img src="{{ url('foto_produk/' . $item->photo) }}" alt="{{ $item->namaproduk }}"
                    class="productimage_popup">
                <p class="hargaproduct_popup">IDR {{ number_format($item->harga, 0, ',', ',') }}</p>
                <p class="size">Size : {{ $item->size }}</p>
                <p class="stock">Stock : {{ $item->stock }} </p>
                <button class="buynow_popup add-to-cart" wire:click="beli({{ $item->id }})"><i
                        class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
            </div>
        </div>
    @endforeach
    <script>
        var links = document.querySelectorAll('[data-target]');
        links.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                var target = this.getAttribute('data-target');
                var popup = document.querySelector(target);
                popup.style.display = "block";
            });
        });

        // Script untuk menutup pop-up ketika tombol close atau area di luar pop-up diklik
        var closeButtons = document.querySelectorAll('.popup .close, .popup');
        closeButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                var popup = this.closest('.popup');
                popup.style.display = "none";
            });
        });
    </script>
</div>
