<script src="<?= base_url('assets/static/js/initTheme.js') ?>"></script>

<section class="section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="card col-md-6 mt-4 col-12 d-flex align-items-center">
				<div class="card-body py-4 px-4 text-center">
					<div class="d-flex align-items-center">
						<div class="name">
							<h3>Edit <?= $title ?></h3>
							<p class="text-subtitle text-muted">
								Silakan Edit <?= $title ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-md-6 col-12">
			<div class="card">
				<form action="<?= base_url('data_pengguna/aksi_edit/') ?>" method="post" class="row g-3" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $rizkan->id_user ?>">
					<input type="hidden" name="id2" value="<?php echo $jojo->user ?>">
					<div class="card-body">
						<div class="row">
							<div>
								<label for="Foto" class="form-label">Foto</label>
								<div class="custom-file">
									<div class="col-12 col-md-12">
										<input type="file" class="logo-perusahaan" id="foto" name="foto" accept="image/*">
									</div>
								</div>
							</div>
							<label for="Foto" class="form-label">Foto Lama</label>
							<div id="preview">
								<?php if ($rizkan->foto) : ?>
									<img src="<?= base_url('images/' . $rizkan->foto) ?>" class="img-fluid rounded mb-3" width="100px">
								<?php endif; ?>
							</div>

							<div>
								<div class="form-group">
									<label for="last-name-column">Reset Password</label>
									<input type="text" id="password" class="form-control" placeholder="Masukkan Password Baru" name="password" />
								</div>
							</div>

							<!-- bagian tombol submit -->
							<div class="col-12">
								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-0 col-md-offset-0">
										<!-- <a href="javascript:history.back()" class="btn btn-danger">Cancel</a> -->
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</div>
							<!-- bagian tombol submit -->
				</form>
			</div>
			</body>

			</html>

		</div>
</section>
</div>