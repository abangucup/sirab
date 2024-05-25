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
                        <form action="{{ route('kunjungan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section">
                                    <i class="ft-user"></i> Data Kunjungan
                                </h4>
                                <label>Pilih Pasien : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <select name="pasien" id="pasien" class="form-control" required>
                                        <option value="" disabled selected>-- Pilih --</option>
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
                                        <option value="">--Pilih Keluhan--</option>
                                    </select>
                                    <div class="form-control-position">
                                        <i
                                            class="ft-check-square font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label>Tanggal Berkunjung : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="date" class="form-control" name="tanggal_berkunjung" required>
                                    <div class="form-control-position">
                                        <i class="ft-calendar font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label>Puskesmas Kunjungan : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <select name="puskesmas_kunjungan" id="puskesmas" class="form-control" required>
                                        <option value="" disabled selected>-- Pilih Puskesmas Kunjungan--</option>
                                        @foreach ($instansis as $instansi)
                                        <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-control-position">
                                        <i class="ft-briefcase font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label>Cuci Luka : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <select name="cuci_luka" class="form-control" required>
                                        <option value="" disabled selected>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    <div class="form-control-position">
                                        <i class="ft-thermometer font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label>Hasil Pemeriksaan : </label>
                                <div class="form-group position-relative">
                                    <textarea name="hasil_pemeriksaan" rows="3" class="form-control"
                                        placeholder="Contoh: Pasien dalam keadaan membaik"></textarea>
                                </div>
                                <label>Tanggal Pemberian Imunisasi : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="date" class="form-control" name="tanggal_pemberian_imunisasi" required>
                                    <div class="form-control-position">
                                        <i class="ft-calendar font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label>Keterangan : </label>
                                <div class="form-group position-relative">
                                    <textarea name="keterangan" rows="3" class="form-control"
                                        placeholder="Contoh: Selesai pemberian Imunisasi"></textarea>
                                </div>
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