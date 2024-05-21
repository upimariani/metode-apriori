<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Chatting</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#">Modules</a></div>
				<div class="breadcrumb-item">Chatting</div>
			</div>
		</div>

		<div class="section-body">
			<?php
			if ($this->session->userdata('success')) {
			?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<?= $this->session->userdata('success') ?>
				</div>
			<?php
			}
			?>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="position-relative">
							<div class="chat-messages p-4">
								<?php
								foreach ($chatting as $key => $value) {

									if ($value->pelanggan_send != null) {

								?>

										<div class="chat-message-right pb-4">
											<div>
												<img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
												<div class="text-muted small text-nowrap mt-2"><?= $value->time ?></div>
											</div>
											<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
												<div class="font-weight-bold mb-1"><?= $value->nama ?></div>
												<?= $value->pelanggan_send ?>
											</div>
										</div>
									<?php
									} else if ($value->admin_send != null) {
									?>
										<div class="chat-message-left pb-4">
											<div>
												<img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
												<div class="text-muted small text-nowrap mt-2"><?= $value->time ?></div>
											</div>
											<div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
												<div class="font-weight-bold mb-1">Admin</div>
												<?= $value->admin_send ?>
											</div>
										</div>
									<?php
									}
									?>
								<?php
								}
								?>
							</div>
						</div>
						<form action="<?= base_url('Admin/cDashboard/balas/' . $id) ?>" method="POST">
							<div class="flex-grow-0 py-3 px-4 border-top">
								<div class="input-group">
									<input type="text" name="pesan" class="form-control" placeholder="Type your message" required>
									<button type="submit" class="btn btn-primary">Send</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</section>
</div>
