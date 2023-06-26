@section('css', '/css/bayar.css')
<div>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Detail Pesanan</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                    <img src="{{ asset('foto_produk/'.$namaproduk.'.webp') }}" onerror="this.onerror=null; this.src='{{ asset('foto_produk/'.$namaproduk.'.png') }}';" class="gambar" alt="{{ $namaproduk }}" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h5 class="card-title">{{ $namaproduk }}</h5>
                        <p class="card-text">
                        Total Harga:
                            <br>
                            {{ 'IDR. ' . number_format($totalharga, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
          
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if ($belanja->status == 1)
                    <div class="row">
                        <div class="col-md-12" id="ok">
                            <button id="pay-button" class="btn-bayar">Bayar sekarang</button>
                        </div>
                    </div>
                @elseif($belanja->status == 2)
                    <div class="card">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col">
                                    <table class="table" style="border-top: hidden">
                                        <tr>
                                            <td>Bank</td>
                                            <td>:</td>
                                            <td>{{ $payment_type }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Harga</td>
                                            <td>:</td>
                                            <td>IDR {{ number_format($gross_amount, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>{{ $transaction_status }}</td>
                                        </tr>
                                        <tr>
                                            <td>Batas Waktu Pembayaran</td>
                                            <td>:</td>
                                            <td>{{ $deadline }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div>
        <form id="payment-form" method="get" action="Payment">
            <input type="hidden" name="result_data" id="result-data" value="">
    </div>
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-UzgcYjyfmcP0H9RP"></script>
    <script>
        $(document).ready(function() {
            $("#pay-button").click(function() {
                //Snaptoken acquired from previous step
                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }
                p = '<?= $snapToken ?>';
                snap.pay(p, {
                    //optional
                    onSuccess: function(result) {
                        changeResult('success', result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            });
        });
    </script>
    @include('sweetalert::alert')
</div>
