<div class="main-panel">
    <div class="content">

        <div class="col-12">
            <div class="card">
                <div class="card-header">

                <div class="d-flex align-items-center">
                        <h4 class="card-title">Detail Penulis Jurnal</h4>
                    </div>

                    <div class="card-body">
                    <div class="table">
                        <div class="row">
                            <div class="col-md-12 col-table">
                                <table class="table table-bordered" id="crud_table">
                                        <tr>
                                            <th width="30%">NipPenulis</th>
                                            <th width="30%">Status Penulis</th>
                                            <th width="30%">ID Jurnal</th>
                                        </tr>
                                        <tr>
                                            <td contenteditable="true" class="nip_penulis"></td>
                                            <td contenteditable="true" class="stat_penulis"></td>
                                            <td contenteditable="true" class="id_jurnal"></td>
                                        </tr>
                                </table>
                                            <div align="center">
                                            <button type="submit" name="save" id="save" class="btn btn-info">Save</button>
                                            </div>
                                            <br />
                                            <div id="inserted_item_data"></div>
                                        </div>
                                        
                                </div>

                                <div id="inserted_item_data" class="table table-striped table-bordered">
                                    <br>
                                    <h3 align="center">Data Penulis Jurnal</h3>
                                    <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="10%">No.</th>
                                            <th width="30%">NIP Penulis</th>
                                            <th width="10%">Status Penulis</th>
                                            <th width="10%">ID Jurnal</th>
                                            <th width="45%">Judul Jurnal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count=0;
                                            foreach ($penulis->result() as $row) :
                                                $count++;
                                        ?>
                                        <tr>
                                            <td align="center"><?php echo $count;?></td>
                                            <td align="center"><?php echo $row->nip; ?></td>
                                            <td align="center"><?php echo $row->stat_penulis; ?></td>
                                            <td align="center"><?php echo $row->id_jurnal; ?></td>
                                            <td align="center"><?php echo $row->judul_jurnal; ?></td>
                                        </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                        </table>
                                        </div>

</div>						
</div>
</div>
</div>				

</body>
</html>

<script>
$(document).ready(function(){
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td contenteditable='true' class='nip_penulis'></td>";
   html_code += "<td contenteditable='true' class='stat_penulis'></td>";
   html_code += "<td contenteditable='true' class='id_jurnal'></td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
  var nip_penulis = [];
  var stat_penulis = [];
  var id_jurnal = [];
  var judul_jurnal = [];
  $('.nip_penulis').each(function(){
   nip_penulis.push($(this).text());
  });
  $('.stat_penulis').each(function(){
   stat_penulis.push($(this).text());
  });
  $('.id_jurnal').each(function(){
   id_jurnal.push($(this).text());
  });
  $.ajax({
   url:"<?= base_url();?>Dosen/tambah_penulis_save",
   method:"POST",
   data:{nip_penulis:nip_penulis, stat_penulis:stat_penulis, id_jurnal:id_jurnal},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
   }
  });
 });
});
</script>
