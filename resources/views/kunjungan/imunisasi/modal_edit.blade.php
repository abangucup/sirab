<div class="modal fade text-left" id="modalUbahImunisasi-{{ $imunisasi->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel34">Tambah Imunisasi Pasien</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form action="{{ route('imunisasi.update', ['kunjungan' => $kunjungan->id, 'imunisasi' => $imunisasi->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal_pemberian">Tanggal Pemberian Imunisasi</label>
                        <input type="date" id="tanggal_pemberian" required class="form-control" value="{{ $imunisasi->tanggal_pemberian_imunisasi }}"
                            placeholder="Tanggal Gigitan" name="tanggal_pemberian_imunisasi">
                    </div>
                    <div class="form-group">
                        <label for="puskesmas_pemberi">Puskesmas Pemberi Imunisasi</label>
                        <select name="puskesmas_pemberi_imunisasi" id="puskesmas_pemberi" class="form-control">
                            <option value="{{ $imunisasi->puskesmas_pemberi_imunisasi }}" selected>{{ $imunisasi->nama_puskesmas_pemberi }}</option>
                            <option value="" disabled>-- Pilih Puskesmas Pemberi --</option>
                            @foreach ($instansis as $instansi)
                                <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Imunisasi</label>
                        <select name="status_imunisasi" id="status" class="form-control" required>
                            <option value="{{ $imunisasi->status_imunisasi }}" selected>{{ $imunisasi->status_imunisasi }}</option>
                            <option value="" disabled>-- Pilih Status Imunisasi --</option>
                            <option value="Var 1">Var 1</option>
                            <option value="Var 2">Var 2</option>
                            <option value="Var 3">Var 3</option>
                            <option value="Var 4">Var 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="puskesmas_pemberi">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="4" placeholder="Contoh: Selesai imunisasi var 2">{{ $imunisasi->keterangan }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>