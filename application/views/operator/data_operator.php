<div class="main-panel">
    <div class="content">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Operator</h4>
                    </div>
                </div>

                <div class="card-body">
                <!-- table responsive -->
                <div class="table">
                    <div class="row">
                        <div class="col-12">
                            <table id="basic-datatables" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                        <td align="center">Id User</td>
                                        <td align="center">Nip</td>
                                        <td align="center">Nama</td>
                                        <td align="center">Email</td>
                                        <!-- <td align="center">Password</td> -->
                                        <td align="center">Role</td>
                                        <td align="center">Statue</td>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach ($getuser as $p ) { ?>
                                <tr>
                                    <td align="center"><?php echo $p->id_user; ?> </td>
                                    <td align="center"><?php echo $p->nip; ?> </td>
                                    <td align="center"><?php echo $p->name; ?></td>
                                    <td align="center"><?php echo $p->email; ?></td>
                                    <!-- <td align="center"><?php echo $p->password; ?></td> -->
                                    <td align="center"><?php echo $p->role_name; ?></td>
                                    <td align="center"><?php echo $p->is_active; ?></td>
                                </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
					</div>
                </div>
				<!-- table responsive -->	
			</div>						
        </div>
    </div>
</div>				
