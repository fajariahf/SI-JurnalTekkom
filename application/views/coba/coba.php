        <!-- Modal Add New Package-->
        <form action="<?php echo base_url();?>Dosen/create" method="post">
            <div class="modal fade" id="addNewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Package</label>
                        <div class="col-sm-10">
                        <input type="text" name="package" class="form-control" placeholder="Package Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product</label>
                        <div class="col-sm-10">
                            <select class="bootstrap-select" name="product[]" data-width="100%" data-live-search="true" multiple required>
                                <?php foreach ($product->result() as $row) :?>
                                    <option value="<?php echo $row->product_id;?>"><?php echo $row->product_name;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </div>
                </div>
            </div>
            </div>
        </form>
        <!-- Modal Add New Package-->

        <!-- Modal Update Package-->
        <form action="<?php echo base_url();?>Dosen/update" method="post">
            <div class="modal fade" id="UpdateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Penulis Jurnal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ID Jurnal</label>
                        <div class="col-sm-10">
                        <input readonly name="jurnal_edit" class="form-control" placeholder="Package Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nip Penulis</label>
                        <div class="col-sm-10">
                            <select class="bootstrap-select strings" name="user_edit[]" data-width="100%" data-live-search="true" multiple required>
                                <?php foreach ($user->result() as $row) :?>
                                    <option value="<?php echo $row->id_user;?>"><?php echo $row->nip;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="edit_id" required>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                </div>
                </div>
            </div>
            </div>
        </form>
    <!-- Modal Update Package-->
    