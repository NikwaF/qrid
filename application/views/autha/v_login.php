<!-- Header -->
<div class="header bg-gradient-dark py-7 py-lg-8">
	<div class="separator separator-bottom separator-skew zindex-100">
		<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
			<polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
		</svg>
	</div>
</div>
<!-- Page content -->
<div class="container mt--8 pb-5">
	<div class="row justify-content-center">
		<div class="col-lg-5 col-md-7">
			<div class="card bg-secondary shadow border-0">

				<div class="card-body px-lg-5 py-lg-5">
					<div class="text-center text-muted mb-4">
						<b>Login Manager</b>
					</div>
					<form role="form" action="<?= base_url('autha'); ?>" method="post">
						<div class="form-group mb-3">
							<div class="input-group input-group-alternative">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ni ni-email-83"></i></span>
								</div>
								<input class="form-control" placeholder="Nik Manager" type="number" name="nik" value="<?= set_value('nik'); ?>">
							</div>
							<?= form_error('nik', '<small class="text-danger pl-2">', '</small>'); ?>
						</div>
						<div class="form-group">
							<div class="input-group input-group-alternative">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
								</div>
								<input class="form-control" placeholder="Password" type="password" name="passcode" value="<?= set_value('nik'); ?>">
							</div>
							<?= form_error('passcode', '<small class="text-danger pl-2">', '</small>'); ?>
						</div>
						<?= $this->session->flashdata('pesan'); ?>
						<div class="text-center">
							<button type="submit" class="btn btn-dark my-4">Masuk</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
