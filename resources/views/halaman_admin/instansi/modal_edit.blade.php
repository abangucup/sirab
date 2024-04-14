<div class="modal fade text-left" id="modalUbah-{{ $instansi->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel34">Ubah Data Instansi</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form action="{{ route('instansi.update', $instansi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <label>Kecamatan : </label>
                            <div class="form-group position-relative has-icon-left">
                                <select name="kecamatan_id" class="form-control">
                                    <option value="{{ $instansi->kecamatan->id }}" selected>{{ $instansi->kecamatan->nama_kecamatan }}</option>
                                    <option value="" disabled>-- Pilih Kecamatan--</option>
                                    @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                                <div class="form-control-position">
                                    <i class="ft-briefcase font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            <label>Nama Instansi : </label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" placeholder="Nama Instansi" class="form-control" name="nama_instansi"
                                value="{{ old('nama_instansi', $instansi->nama_instansi) }}"
                                    required>
                                <div class="form-control-position">
                                    <i class="ft-user font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            <label>Kode Instansi : </label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="number" placeholder="Kode Instansi" class="form-control"
                                    name="kode_instansi" value="{{ old('kode_instansi', $instansi->kode_instansi) }}" required>
                                <div class="form-control-position">
                                    <i class="ft-user font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            <label>Alamat Instansi : </label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" placeholder="Alamat Instansi" class="form-control"
                                    name="alamat_instansi" value="{{ old('alamat_instansi', $instansi->alamat_instansi) }}">
                                <div class="form-control-position">
                                    <i class="ft-user font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            <label>Status : </label>
                            <div class="form-group position-relative has-icon-left">
                                <select name="status" class="form-control" required>
                                    <option value="{{ $instansi->status }}" selected>{{ $instansi->status }}</option>
                                    <option value="" disabled>-- Pilih Status Instansi--</option>
                                    <option value="dinas">Dinas</option>
                                    <option value="puskesmas">Puskesmas</option>
                                </select>
                                <div class="form-control-position">
                                    <i class="ft-briefcase font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                        </div>
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