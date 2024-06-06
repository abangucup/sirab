@extends('templates.app')

@section('title', 'Pasien')

@section('content')

<section id="file-export">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div id="chart">
                        <a class="heading-elements-toggle"><i cl-ass="la la-ellipsis-v font-medium-3"></i></a>
                        {!! $imunisasiChart->container() !!}
                    </div>
                    
                    <button id="download-button" class="btn btn-primary mt-2">Download Chart</button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('script')
<script src="{{ $imunisasiChart->cdn() }}"></script>

{{ $imunisasiChart->script() }}

<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<script>
    document.getElementById('download-button').addEventListener('click', function () {
        // Panggil fungsi untuk membuat gambar dari tabel
        captureTable();
    });

    function captureTable() {
        // Ambil elemen kontainer tabel
        const tableContainer = document.getElementById('chart');

        // Konversi elemen HTML menjadi gambar menggunakan html2canvas
        html2canvas(tableContainer).then(function(canvas) {
            // Dapatkan data URL gambar PNG
            const imgData = canvas.toDataURL('image/png');

            // Dapatkan tanggal saat ini menggunakan variabel PHP
            const currentDate = "<?php echo date('d-m-Y'); ?>";

            // Buat elemen <a> untuk menautkan data URL dan simpan gambar
            const link = document.createElement('a');
            link.href = imgData;
            link.download = 'grafik_imunisasi_pertanggal_' + currentDate + '.png';
            link.click();
        });
    }
</script>
@endpush