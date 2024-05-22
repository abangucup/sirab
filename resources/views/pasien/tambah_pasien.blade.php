@extends('templates.app')

@section('title', 'Pasien')

@section('content')

<section id="vertical-tabs">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">FORM TAMBAH DATA PASIEN</h4>
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
						<form action="{{ route('pasien.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-body">
										<h4 class="form-section">
											<i class="ft-user"></i> Biodata Pasien
										</h4>
										<label>Nama Lengkap : </label>
										<div class="form-group position-relative has-icon-left">
											<input type="text" placeholder="Nama Lengkap" class="form-control"
												name="nama_lengkap" required>
											<div class="form-control-position">
												<i
													class="ft-user font-medium-5 line-height-1 text-muted icon-align"></i>
											</div>
										</div>
										<label>Tanggal Lahir : </label>
										<div class="form-group position-relative has-icon-left">
											<input type="date" placeholder="Tanggal Lahir" class="form-control"
												name="tanggal_lahir">
											<div class="form-control-position">
												<i
													class="ft-calendar font-medium-5 line-height-1 text-muted icon-align"></i>
											</div>
										</div>
										<label>Nomor Telepon : </label>
										<div class="form-group position-relative has-icon-left">
											<input type="number" placeholder="Nomor Telpon Aktif" class="form-control"
												name="telepon">
											<div class="form-control-position">
												<span>+62</span>
											</div>
										</div>
										<label>Alamat : </label>
										<div class="form-group position-relative has-icon-left">
											<input type="text" placeholder="Alamat" class="form-control" name="alamat"
												required>
											<div class="form-control-position">
												<i
													class="ft-map-pin font-medium-5 line-height-1 text-muted icon-align"></i>
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
												<i
													class="ft-users font-medium-5 line-height-1 text-muted icon-align"></i>
											</div>
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
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-body">
										<h4 class="form-section">
											<i class="ft-heart"></i> Keluhan Pasien
										</h4>
										<div class="form-group">
											<label for="tanggal">Tanggal Gigitan</label>
											<input type="date" id="tanggal" class="form-control"
												placeholder="Tanggal Gigitan" name="tanggal_gigitan">
										</div>
										<div class="form-group">
											<label for="hewan">Hewan Penular</label>
											<select name="hewan_rabies" id="hewan" class="form-control">
												<option value="" selected disabled>-- Pilih Hewan Penular --</option>
												<option value="Anjing">Anjing</option>
												<option value="Kucing">Kucing</option>
												<option value="Kera">Kera</option>
												<option value="Dll">Dll</option>
											</select>
										</div>
										<div class="form-group">
											<label for="lokasi">Lokasi Gigitan</label>
											<textarea name="lokasi_gigitan" id="lokasi" rows="2"
												class="form-control"></textarea>
										</div>
										<div class="form-group">
											<label for="kondisi">Kondisi</label>
											<select name="kondisi" id="kondisi" class="form-control">
												<option value="" selected disabled>-- Pilih Kondisi Pasien --</option>
												<option value="Sakit">Sakit</option>
												<option value="Sembuh">Sembuh</option>
												<option value="Mati">Mati</option>
											</select>
										</div>
										<div class="form-group">
											<label for="gejala">Gejala</label>
											<textarea name="gejala" id="gejala" rows="4"
												class="form-control"></textarea>
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