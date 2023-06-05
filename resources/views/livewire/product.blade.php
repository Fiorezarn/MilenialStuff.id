@section('title', 'Product')
<div>
    <div class="banner-product">
        <img class="gambar-banner" src="img/product-content.webp" alt="banner-produk" href="#">
    </div>
    <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
        </a>
    
    <div class="trending" id="trending">
        <h2 class="container-fluid">Trending</h2>
        <div class="content">
            <div class="row">
                @foreach ($trending as $item)
                    <div class="col-md-2">
                        <div class="box">
                            <img src="{{ url('foto_produk/' . $item->photo) }}" class="card-img-top"
                                alt="{{ $item->namaproduk }}">
                            <div class="card-body">
                                <a href="#detailproduct" class="namaproduk"
                                    data-target="#detailproduct{{ $item->id }}">{{ $item->namaproduk }}</a>
                                <a href="#detailproduct" class="harga"
                                    data-target="#detailproduct{{ $item->id }}">IDR
                                    {{ number_format($item->harga, 0, ',', ',') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Pop-up -->
    @foreach ($trending as $item)
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



    <!-- Pembatas Product Apparel-->
    <div class="pembatas-apparel">
        <img class="gambar-pembatas" src="img/pembatas-produk.webp" alt="banner-produk" href="#">
    </div>
    <div class="apparel">
        <h2 class="container-fluid">Best of Apparel</h2>
        <!-- Product Slider Apparel -->
        <div class="slider-apparel">
            <div class="container">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($apparel->chunk(4) as $items)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}"
                                id="{{ 'slide' . $loop->iteration }}">
                                <div class="row">
                                    @foreach ($items as $hype)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img src="{{ url('foto_produk/' . $hype->photo) }}"
                                                    class="card-img-top" alt="{{ $hype->namaproduk }}">
                                                <div class="card-body">
                                                    <a class="card-title" href="#detailproduct"
                                                        data-target="#detailproduct{{ $hype->id }}">{{ $hype->namaproduk }}</a>
                                                    <a class="card-text" href="#detailproduct"
                                                        data-target="#detailproduct{{ $hype->id }}">IDR
                                                        {{ number_format($hype->harga, 0, ',', ',') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Pop-up -->
        @foreach ($apparel as $hype)
            <div class="popup" id="detailproduct{{ $hype->id }}">
                <div class="popup-content">
                    <button class="close">&times;</button>
                    <h3 class="namaproduct_popup">{{ $hype->namaproduk }}</h3>
                    <img src="{{ url('foto_produk/' . $hype->photo) }}" alt="{{ $hype->namaproduk }}"
                        class="productimage_popup">
                    <p class="hargaproduct_popup">IDR {{ number_format($hype->harga, 0, ',', ',') }}</p>
                    <p class="size">Size : {{ $hype->size }}</p>
                    <p class="stock">Stock : {{ $hype->stock }} </p>
                    <button class="buynow_popup add-to-cart" wire:click="beli({{ $hype->id }})"><i
                            class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
                </div>
            </div>
        @endforeach


        <!-- Pembatas Product Sneakers -->
        <div class="pembatas-sneakers">
            <img class="gambar-pembatas" src="img/pembatas-produk-2.webp" alt="banner-produk" href="#">
        </div>

        <!-- Product Slider Sneakers For You -->
        <div class="sneakers">
            <h2 class="container-fluid">Sneakers for You</h2>
        </div>
        <div class="content_sneakers">
            <div class="row_sneakers">
                @foreach ($sneakers as $item)
                    <div class="col-md-2">
                        <div class="box_sneakers">
                            <img src="{{ url('foto_produk/' . $item->photo) }}" class="card-img-top"
                                alt="{{ $item->namaproduk }}">
                            <div class="card-body">
                                <a href="#detailproduct" class="namaproduk"
                                    data-target="#detailproduct{{ $item->id }}">{{ $item->namaproduk }}</a>
                                <a href="#detailproduct" class="harga"
                                    data-target="#detailproduct{{ $item->id }}">IDR
                                    {{ number_format($item->harga, 0, ',', ',') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Pop-up -->
    @foreach ($sneakers as $item)
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

        // Script untuk menutup pop-up ketika tombol close diklik
        var closeButtons = document.querySelectorAll('.popup .close');
        closeButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                var popup = this.closest('.popup');
                popup.style.display = "none";
            });
        });

        // Memisahkan event listener untuk button "Add to Cart"
        var addToCartButtons = document.querySelectorAll('.popup .add-to-cart');
        addToCartButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });

        // Script untuk menutup pop-up ketika area di luar pop-up diklik
        var popups = document.querySelectorAll('.popup');
        popups.forEach(function(popup) {
            popup.addEventListener('click', function(e) {
                var popupContent = this.querySelector('.popup-content');
                // hanya tutup pop-up jika tombol close tidak diklik dan tidak ada klik pada elemen popup-content
                if (!e.target.classList.contains('close') && !popupContent.contains(e.target)) {
                    popup.style.display = "none";
                }
            });
        });
    </script>
</div>
