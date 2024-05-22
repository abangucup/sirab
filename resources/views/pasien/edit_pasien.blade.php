@extends('templates.app')

@section('title', 'Pasien')

@section('content')

<section id="vertical-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">FORM UBAH DATA PASIEN</h4>
                    <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                    </a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <a data-action="collapse">
                                    <i class="ft-minus"></i>
                                </a>
                            </li>
                            <li>
                                <a data-action="reload">
                                    <i class="ft-rotate-cw"></i>
                                </a>
                            </li>
                            <li>
                                <a data-action="expand">
                                    <i class="ft-maximize"></i>
                                </a>
                            </li>
                            <li>
                                <a data-action="close">
                                    <i class="ft-x"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form action="{{ route('pasien.update', $pasien->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <h4 class="form-section">
                                    <i class="ft-user"></i> Biodata Pasien
                                </h4>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Nomor Register : </label>
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" placeholder="Nomor Register" class="form-control"
                                                value="{{ $pasien->nomor_register }}">
                                            <div class="form-control-position">
                                                <i
                                                    class="ft-hash font-medium-5 line-height-1 text-muted icon-align"></i>
                                            </div>
                                        </div>
                                        <label>Nama Lengkap : </label>
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" placeholder="Nama Lengkap" class="form-control"
                                                name="nama_lengkap" value="{{ $pasien->biodata->nama_lengkap }}"
                                                required>
                                            <div class="form-control-position">
                                                <i
                                                    class="ft-user font-medium-5 line-height-1 text-muted icon-align"></i>
                                            </div>
                                        </div>
                                        <label>Tanggal Lahir : </label>
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="date" placeholder="Tanggal Lahir" class="form-control"
                                                name="tanggal_lahir" value="{{ $pasien->biodata->tanggal_lahir }}">
                                            <div class="form-control-position">
                                                <i
                                                    class="ft-calendar font-medium-5 line-height-1 text-muted icon-align"></i>
                                            </div>
                                        </div>
                                        <label>Jenis Kelamin : </label>
                                        <div class="form-group position-relative has-icon-left">
                                            <select name="jenis_kelamin" class="form-control">
                                                <option value="{{ $pasien->biodata->jenis_kelamin }}" selected>{{
                                                    $pasien->biodata->jenis_kelamin }}</option>
                                                <option value="" disabled>-- Pilih --</option>
                                                <option value="p">Perempuan</option>
                                                <option value="l">Laki-Laki</option>
                                            </select>
                                            <div class="form-control-position">
                                                <i
                                                    class="ft-users font-medium-5 line-height-1 text-muted icon-align"></i>
                                            </div>
                                        </div>
                                        <label>Alamat : </label>
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" placeholder="Alamat" class="form-control" name="alamat"
                                                value="{{ $pasien->biodata->alamat }}">
                                            <div class="form-control-position">
                                                <i
                                                    class="ft-map-pin font-medium-5 line-height-1 text-muted icon-align"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">

                                        <label>Nomor Telepon : </label>
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="number" placeholder="Nomor Telpon Aktif" class="form-control"
                                                name="telepon" value="{{ $pasien->biodata->telepon }}">
                                            <div class="form-control-position">
                                                <span>+62</span>
                                            </div>
                                        </div>
                                        <label>Foto Profile</label>
                                        <fieldset class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="foto"
                                                    id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                    file</label>
                                            </div>
                                            <p><small class="text-danger">Upload foto jika ada</small></p>
                                        </fieldset>
                                        <label>Gambar Lama</label>
                                        <div class="form-group position">
                                            <img src="{{ $pasien->biodata->foto }}" alt="Gambar Kosong" width="40%"
                                                height="200px" class="shadow rounded border-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <a type="button" href="{{ route('pasien.index') }}" class="btn btn-danger mr-1">
                                    <i class="ft-x"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection