@extends('templates.app')

@section('title', 'Pasien')

@section('content')

<section id="vertical-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">FORM TAMBAH DATA KUNJUNGAN</h4>
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
                        <form action="{{ route('kunjungan.update', $kunjungan->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <h4 class="form-section">
                                    <i class="ft-user"></i> Data Kunjungan
                                </h4>
                                <label>Pilih Pasien : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <select name="pasien" id="pasien" class="form-control" required>
                                        <option value="{{ $kunjungan->kasus->pasien_id }}" selected>{{ $kunjungan->kasus->pasien->biodata->nama_lengkap }}</option>
                                        <option value="" disabled>-- Pilih --</option>
                                        @foreach ($pasiens as $pasien)
                                        <option value="{{ $pasien->id }}">{{ $pasien->biodata->nama_lengkap }}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-control-position">
                                        <i class="ft-users font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label for="keluhan">Pilih Kasus Keluhan:</label>
                                <div class="form-group position-relative has-icon-left">
                                    <select id="keluhan" name="kasus" required class="form-control">
                                        <option value="{{ $kunjungan->kasus_id }}" selected>{{ $kunjungan->kasus->tanggal_gigitan.' - Hewan '.$kunjungan->kasus->hewan_rabies }}</option>
                                        <option value="" disabled>--Pilih Keluhan--</option>
                                    </select>
                                    <div class="form-control-position">
                                        <i
                                            class="ft-check-square font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label>Tanggal Berkunjung : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="date" class="form-control" value="{{ $kunjungan->tanggal_berkunjung }}" name="tanggal_berkunjung" required>
                                    <div class="form-control-position">
                                        <i class="ft-calendar font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label>Cuci Luka : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <select name="cuci_luka" class="form-control" required>
                                        <option value="{{ $kunjungan->cuci_luka }}" selected>{{ $kunjungan->cuci_luka }}</option>
                                        <option value="" disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    <div class="form-control-position">
                                        <i class="ft-thermometer font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>

                                <label>Hasil Pemeriksaan : </label>
                                <textarea name="hasil_pemeriksaan" rows="3" class="form-control"
                                    placeholder="Hasil pemeriksaan">{{ $kunjungan->hasil_pemeriksaan }}</textarea>
                                <div class="form-actions">
                                    <a type="button" href="{{ route('kunjungan.index') }}" class="btn btn-danger mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#pasien').on('change', function() {
            var pasien = $(this).val();
            if (pasien) {
                $.ajax({
                    url: '/getKeluhanPasien/' + pasien,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#keluhan').empty();
                        $('#keluhan').append('<option value="">--Pilih Keluhan--</option>');
                        $.each(data, function(key, value) {
                            $('#keluhan').append('<option value="' + value.id + '">' + value.tanggal_gigitan +' - Hewan '+value.hewan_rabies + '</option>');
                        });
                    }
                });
            } else {
                $('#keluhan').empty();
                $('#keluhan').append('<option value="">--Pilih Keluhan--</option>');
            }
        });
    });
</script>
@endpush