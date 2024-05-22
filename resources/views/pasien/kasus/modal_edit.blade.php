<div class="modal fade text-left" id="modalUbah-{{ $kasus->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel34" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel34">Ubah Data Keluhan Pasien</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form action="{{ route('kasus.update', ['pasien' => $pasien->id, 'kasus' => $kasus->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal">Tanggal Gigitan</label>
                        <input type="date" id="tanggal" class="form-control" value="{{ $kasus->tanggal_gigitan }}"
                            placeholder="Tanggal Gigitan" name="tanggal_gigitan">
                    </div>
                    <div class="form-group">
                        <label for="hewan">Hewan Penular</label>
                        <select name="hewan_rabies" id="hewan" class="form-control">
                            <option value="{{ $kasus->hewan_rabies }}" selected>{{ $kasus->hewan_rabies }}</option>
                            <option value="" disabled>-- Pilih Hewan Penular --</option>
                            <option value="Anjing">Anjing</option>
                            <option value="Kucing">Kucing</option>
                            <option value="Kera">Kera</option>
                            <option value="Dll">Dll</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi Gigitan</label>
                        <textarea name="lokasi_gigitan" id="lokasi" rows="2"
                            class="form-control">{{ $kasus->lokasi_gigitan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-control">
                            <option value="{{ $kasus->kondisi }}" selected>{{ $kasus->kondisi }}</option>
                            <option value="" disabled>-- Pilih Kondisi Pasien --</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Sembuh">Sembuh</option>
                            <option value="Mati">Mati</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gejala">Gejala</label>
                        <textarea name="gejala" id="gejala" rows="4"
                            class="form-control">{{ $kasus->gejala }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
                    <button type="submit" class="btn btn-warning">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>