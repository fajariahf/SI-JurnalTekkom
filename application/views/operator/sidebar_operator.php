<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">		

		<ul class="nav nav-primary">
			<li class="nav-item active">
				<a href="<?= base_url(); ?>Operator">
					<i class="fas fa-home"></i>
					<p>Dashboard</p>
				</a>
			</li>

			<li class="nav-section">
				<span class="sidebar-mini-icon">
					<i class="fa fa-ellipsis-h"></i>
				</span>
				<h4 class="text-section">Data User</h4>
			</li>
			<li class="nav-item">
				<a href="<?= base_url(); ?>Operator/data_operator">
				<i class="fas fa-user-tie"></i>
					<p>Operator</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url(); ?>Operator/reviewer">
				<i class="fas fa-chalkboard-teacher"></i>
					<p>Reviewer</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url(); ?>Operator/dosen">
				<i class="far fa-id-badge"></i>
					<p>Dosen</p>
				</a>
			</li>

			<li class="nav-section">
				<span class="sidebar-mini-icon">
					<i class="fa fa-ellipsis-h"></i>
				</span>
				<h4 class="text-section">Menu</h4>
			</li>
			<li class="nav-item">
				<a href="<?= base_url(); ?>Operator/halamanJurnal">
				<i class="flaticon-list"></i>
					<p>Halaman Jurnal</p>
				</a>
			</li>

			<li class="nav-section">
				<span class="sidebar-mini-icon">
					<i class="fa fa-ellipsis-h"></i>
				</span>
				<h4 class="text-section">User</h4>
			</li>
			<li class="nav-item">
				<a href="<?= base_url(); ?>Operator/profil">
				<i class="far fa-address-card"></i>
					<p>My Profile</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url(); ?>Auth/logout">
					<i class="fas fa-power-off"></i>
					<p>Logout</p>
				</a>
			</li>
		</ul>
		
		</div> 
	</div>
</div>
		<!-- End Sidebar -->