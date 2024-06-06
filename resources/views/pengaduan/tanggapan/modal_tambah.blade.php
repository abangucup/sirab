<div class="modal fade text-left" id="modalTambahTanggapan"  aria-labelledby="myModalLabel34"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel34">Tanggapi Pengaduan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form action="{{ route('tanggapan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }}">
                    <div class="form-group">
                        <label for="tanggal_pemberian">Tanggapan</label>
                        <textarea name="tanggapan" rows="3" class="form-control" placeholder="Masukan tanggapan anda"></textarea>
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