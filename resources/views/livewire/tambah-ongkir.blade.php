@section('css', '/css/ongkir.css')
<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card1">
                    <div class="card-body">
                        <div class="judul">{{ 'Tambah Ongkir' }}</div>
                        <form wire:submit.prevent="getOngkir">
                            <label for="provinsi"
                                class="col-md-12 col-form-label text-md-left">{{ 'Silahkan pilih Provinsi Anda' }}</label>

                            <select name="provinsi" wire:model="provinsi_id" class="form-control">
                                <option value="0">-PILIH PROVINSI-</option>
                                @forelse ($daftarProvinsi as $p)
                                    <option value="{{ $p['province_id'] }}">{{ $p['province'] }}</option>
                                @empty
                                    <option value="0">Provinsi tidak ada</option>
                                @endforelse
                            </select>

                            <label for="kota"
                                class="col-md-12 col-form-label text-md-left">{{ 'Silahkan Pilih Kota Anda' }}</label>

                            <select name="kota" wire:model="kota_id" class="form-control">
                                <option value="">-PILIH KABUPATEN/KOTA-</option>
                                @if ($provinsi_id)
                                    @forelse ($daftarKota as $k)
                                        <option value="{{ $k['city_id'] }}">{{ $k['city_name'] }}</option>
                                    @empty
                                        <option value="">PILIH KABUPATEN/KOTA</option>
                                    @endforelse
                                @endif
                            </select>

                            <label for="jasa"
                                class="col-md-12 col-form-label text-md-left">{{ 'Jasa Pengiriman' }}</label>

                            <select name="jasa" wire:model="jasa" class="form-control">
                                <option value="">-PILIH JASA PENGIRIMAN-</option>
                                <option value="jne">JNE</option>
                            </select>

                            <br><br>

                            <div class="col-md-6">
                                <button type="submit" class="submit-login">Lihat Daftar Ongkir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($result)
        <section class="products mb-5">
            <div class="row mt-4">
                @forelse($result as $r)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <div>
                                    <h5>{{ $nama_jasa }}</h5>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <h5><strong>{{ $r['biaya'] }}</strong></h5>
                                        <h5><strong>{{ $r['etd'] }}</strong></h5>
                                        <h5><strong>{{ $r['description'] }}</strong></h5>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <button class="btn-save"
                                        wire:click="save_ongkir({{ $r['biaya'] }})">
                                        Tambah Sebagai Ongkir
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</div>
