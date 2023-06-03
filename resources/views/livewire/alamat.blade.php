@section('css', '/css/alamat.css')
<div>
    @forelse ($product as $pesanan)
    @if (session()->has('message'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('message') }}',
                showConfirmButton: false,
                footer: '<a href="{{ url('Bayar/' . $pesanan->id) }}" class="btn btn-success">Bayar Sekarang</a>'
            });
        </script>
    @endif
@empty
    {{-- Tidak ada data --}}
@endforelse


    <form wire:submit.prevent="store" id="form-pemesanan">
        @csrf

        <div class="form-group">
            <label for="namapenerima">Nama Lengkap :</label>
            <input type="text" wire:model="namapenerima" class="form-control" value="{{ $user->name }}"  placeholder="Masukkan nama lengkap Anda" required>
            @error('namapenerima') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="phone">Nomor Telepon:</label>
            <input type="number" wire:model="phone" class="form-control" value="{{ $user->phonenumber }}" placeholder="Masukkan nomor telepon Anda" required>
            @error('phone') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group" style="margin-top: 20px">
            <label for="alamat">Alamat Lengkap:</label>
            <textarea wire:model="alamat" class="form-control" placeholder="Masukkan alamat lengkap Anda" required></textarea>
            @error('alamat') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="namaproduk" style="margin-top: 20px">Nama Produk :</label>
            <input type="text" wire:model="namaproduk" class="form-control" value="{{($namaproduk)}}" readonly>
            @error('namaproduk') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="totalharga" style="margin-top: 20px">Total Belanja :</label>
            <input type="text" wire:model="totalharga" class="form-control" value="{{ 'IDR. ' . number_format($totalharga, 0, ',', '.') }}" readonly>
            @error('totalharga') <span class="error">{{ $message }}</span> @enderror
        </div>
        
        <button type="submit" class="submit-pesan" style="margin-top: 20px">Pesan Sekarang</button>
    </form>
</div>