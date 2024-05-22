<div class="modal fade text-left" id="modalHapus-{{ $kasus->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel34" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel34">Hapus Data Keluhan Pasien</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('kasus.destroy', ['pasien' => $pasien->id, 'kasus' => $kasus->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <h6 class="text-danger">Yakin ingin menghapus Keluhan "{{ $kasus->tanggal_gigitan .' - Hewan
                                '.$kasus->hewan_rabies }}"</h6>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>