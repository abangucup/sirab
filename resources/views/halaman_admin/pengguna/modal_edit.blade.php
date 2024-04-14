<div class="modal fade text-left" id="modalUbah-{{ $pengguna->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel34" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel34">Ubah Data Pengguna</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <label>Nama Lengkap : </label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" placeholder="Nama Lengkap" class="form-control" name="nama_lengkap"
                                    value="{{ old('nama_lengkap', $pengguna->biodata->nama_lengkap) }}" required>
                                <div class="form-control-position">
                                    <i class="ft-user font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            <label>Tanggal Lahir : </label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="date" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir',$pengguna->biodata->tanggal_lahir)}}" class="form-control" name="tanggal_lahir">
                                <div class="form-control-position">
                                    <i class="ft-calendar font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            <label>Nomor Telepon : </label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" placeholder="Nomor Telpon Aktif" class="form-control" name="telepon"
                                    value="{{ old('telepon', $pengguna->biodata->telepon ?? null) }}">
                                <div class="form-control-position">
                                    <span>+62</span>
                                </div>
                            </div>
                            <label>Alamat : </label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" placeholder="Alamat" class="form-control" name="alamat"
                                    value="{{ old('alamat', $pengguna->biodata->alamat ?? null) }}" required>
                                <div class="form-control-position">
                                    <i class="ft-map-pin font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            <label>Jenis Kelamin : </label>
                            <div class="form-group position-relative has-icon-left">
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="{{ $pengguna->biodata->jenis_kelamin }}" selected>{{
                                        $pengguna->biodata->jenis_kelamin == 'l' ? 'Laki-Laki' : 'Perempuan' }}</option>
                                    <option value="" disabled>-- Pilih --</option>
                                    <option value="p">Perempuan</option>
                                    <option value="l">Laki-Laki</option>
                                </select>
                                <div class="form-control-position">
                                    <i class="ft-users font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label>Username : </label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" placeholder="Username" class="form-control" name="username"
                                    value="{{ $pengguna->username }}" required>
                                <div class="form-control-position">
                                    <i class="ft-user font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            <label>Password : </label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control" id="inputPassword"
                                    placeholder="Masukan Password" name="password">
                                <div class="form-control-position">
                                    <i class="ft-lock"></i>
                                </div>
                                <div class="form-control-show-password" id="showPassword">
                                    <i class="ft-eye"></i>
                                </div>
                            </fieldset>
                            <label>Level Pengguna: </label>
                            <div class="form-group position-relative has-icon-left">
                                <select name="role" class="form-control" required>
                                    <option value="{{ $pengguna->role->id }}" selected>{{ $pengguna->role->nama_role }}</option>
                                    <option value="" disabled>-- Pilih --</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                                    @endforeach
                                </select>
                                <div class="form-control-position">
                                    <i class="ft-user-check font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            <label>Instansi : </label>
                            <div class="form-group position-relative has-icon-left">
                                <select name="instansi" class="form-control">
                                    @if ($pengguna->petugas)
                                    <option value="{{ $pengguna->petugas->instansi->id }}" selected>{{ $pengguna->petugas->instansi->nama_instansi
                                        }}</option>
                                    @endif
                                    <option value="">-- Pilih --</option>
                                    @foreach ($instansis as $instansi)
                                    <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}</option>
                                    @endforeach
                                </select>
                                <div class="form-control-position">
                                    <i class="ft-briefcase font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            <label>Foto Profile</label>
                            <fieldset class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                                <p><small class="text-danger">Upload foto jika ada</small></p>
                                <img src="{{ $pengguna->biodata->foto }}" height="150px" width="150px" class="border rounded-circle shadow" alt="">
                            </fieldset>
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