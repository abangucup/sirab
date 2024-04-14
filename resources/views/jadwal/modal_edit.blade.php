<div class="modal fade text-left" id="modalUbah-{{ $jadwal->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel34">Ubah Data Jadwal</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            @if (auth()->user()->role->level_role == 'super_admin')
                            <label>Instansi : </label>
                            <div class="form-group position-relative has-icon-left">
                                <select name="instansi" class="form-control" required>
                                    <option value="{{ $jadwal->instansi->id }}" selected>{{ $jadwal->instansi->nama_instansi }}</option>
                                    <option value="" disabled>-- Pilih --</option>
                                    @foreach ($instansis as $instansi)
                                    <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}</option>
                                    @endforeach
                                </select>
                                <div class="form-control-position">
                                    <i class="ft-briefcase font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            @endif
                            <label>Hari Pelayanan : </label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" placeholder="Senin" class="form-control" name="hari" value="{{ old('hari', $jadwal->hari) }}" required>
                                <div class="form-control-position">
                                    <i class="ft-calendar font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            <label>Jam Mulai : </label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="time" placeholder="10/10" class="form-control" name="jam_mulai" value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" required>
                                <div class="form-control-position">
                                    <i class="ft-clock font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            <label>Jam Istrahat : </label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="time" placeholder="10/10" class="form-control" name="jam_istrahat" value="{{ old('jam_istrahat', $jadwal->jam_istrahat) }}"
                                    required>
                                <div class="form-control-position">
                                    <i class="ft-clock font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
                            <label>Jam Tutup : </label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="time" placeholder="10/10" class="form-control" name="jam_tutup" value="{{ old('jam_tutup', $jadwal->jam_tutup) }}" required>
                                <div class="form-control-position">
                                    <i class="ft-clock font-medium-5 line-height-1 text-muted icon-align"></i>
                                </div>
                            </div>
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