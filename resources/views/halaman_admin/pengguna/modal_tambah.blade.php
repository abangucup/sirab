<div class="modal fade text-left" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel34">Tambah Data Pengguna</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label>Instansi : </label>
                    <div class="form-group position-relative has-icon-left">
                        <select name="instansi" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach ($instansis as $instansi)
                            <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}</option>
                            @endforeach
                        </select>
                        <div class="form-control-position">
                            <i class="ft-briefcase font-medium-5 line-height-1 text-muted icon-align"></i>
                        </div>
                    </div>
                    <label>Nama Lengkap : </label>
                    <div class="form-group position-relative has-icon-left">
                        <input type="text" placeholder="Nama Lengkap" class="form-control" name="nama_lengkap" required>
                        <div class="form-control-position">
                            <i class="ft-user font-medium-5 line-height-1 text-muted icon-align"></i>
                        </div>
                    </div>
                    <label>NIK : </label>
                    <div class="form-group position-relative has-icon-left">
                        <input type="text" placeholder="NIK" class="form-control" name="nik" required>
                        <div class="form-control-position">
                            <i class="ft-credit-card font-medium-5 line-height-1 text-muted icon-align"></i>
                        </div>
                        <sup class="text-danger">NIK akan berguna sebagai username dan password untuk login</sup>
                    </div>
                    <label>Nomor Telepon : </label>
                    <div class="form-group position-relative has-icon-left">
                        <input type="text" placeholder="Nomor Telpon Aktif" class="form-control" name="telepon"
                            required>
                        <div class="form-control-position">
                            <span>+62</span>
                        </div>
                    </div>
                    <label>Alamat : </label>
                    <div class="form-group position-relative has-icon-left">
                        <input type="text" placeholder="Alamat" class="form-control" name="alamat" required>
                        <div class="form-control-position">
                            <i class="ft-map-pin font-medium-5 line-height-1 text-muted icon-align"></i>
                        </div>
                    </div>
                    <label>Jenis Kelamin : </label>
                    <div class="form-group position-relative has-icon-left">
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="p">Perempuan</option>
                            <option value="l">Laki-Laki</option>
                        </select>
                        <div class="form-control-position">
                            <i class="ft-users font-medium-5 line-height-1 text-muted icon-align"></i>
                        </div>
                    </div>
                    <label>Foto : </label>
                    <fieldset class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        <sup class="text-danger">Upload foto jika ada</sup>
                    </fieldset>
                    <label>Level Pengguna: </label>
                    <div class="form-group position-relative has-icon-left">
                        <select name="role" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                            @endforeach
                        </select>
                        <div class="form-control-position">
                            <i class="ft-user-check font-medium-5 line-height-1 text-muted icon-align"></i>
                        </div>
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