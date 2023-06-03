@section('css', '/css/cart.css')
@section('title', 'Cart')
<div class="container">
    <div class="row at-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Tanggal Pesan</td>
                            <td>Nama Produk</td>
                            <td>Status</td>
                            <td>Total Harga</td>
                            <td>Aksi</td>
                            <td>Hapus</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($product as $pesanan)
                            <tr>
                                <td>{{ $no++ }}</td>

                                <td>{{ $pesanan->created_at }}</td>

                                <td>
                                    <?php $produk = \App\Models\Item::where('id', $pesanan->produk_id)->first(); ?>
                                    <img src="{{ url('foto_produk/' . $produk->photo) }}" width="62px">
                                    {{ $produk->namaproduk }}
                                </td>

                                <td>
                                    @if ($pesanan->status == 0)
                                        <strong>Pesanan belum ditambahkan ongkir</strong>
                                    @endif
                                    @if ($pesanan->status == 1)
                                        <strong>Pesanan sudah ditambahkan ongkir</strong>
                                    @endif
                                    @if ($pesanan->status == 2)
                                        <strong>Pesanan telah ditambahkan ongkir</strong>
                                    @endif
                                </td>

                                <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>

                                <td>
                                    @if ($pesanan->status == 0)
                                        <a href="{{ url('TambahOngkir/' . $pesanan->id) }}"
                                            class="btn btn-warning btn-block">Tambahkan Ongkir</a>
                                    @endif
                                    @if ($pesanan->status == 1)
                                        <a href="{{ url('alamat/' . $pesanan->id) }}"
                                            class="btn btn-primary btn-block">Tambahkan Alamat</a>
                                    @endif
                                    @if ($pesanan->status == 2)
                                        <a href="{{ url('Bayar/' . $pesanan->id) }}"
                                            class="btn btn-primary btn-block">Lihat Status</a>
                                    @endif
                                </td>

                                <td>
                                    <button class="btn btn-danger btn-block" wire:click="destroy({{ $pesanan->id }})">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>
