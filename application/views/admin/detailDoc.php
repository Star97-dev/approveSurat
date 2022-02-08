<style>
    .back{
        float: right;
    }
</style>
<div class="container-fluid">
<a href="<?=site_url('Document') ?>"  class="back btn btn-light btn-outline-primary">
        <i class="fas fa-undo"></i> Back
    </a>
<h1 class="h2 mb-4 text-gray-800"> Detail Requirement Data </h1>
<?php foreach($rekap as $rkp => $dt) { ?>
    <input type="text" name="id_user" id="id_user" value="$dt->id_user" hidden>
    <?php } ?>
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Detail Requirement Data</h6>
    </div>
    <div class="card-body">
    <div class="row justify-content-center">
        <div class="form-group col-lg-12">
            <table class="table table-hover table-bordered">
                <thead>
                    <th style="width: 2em;"> No. </th>
                    <th> Filename </th>
                    <th> File </th>
                    <th> Status </th>
                    <th style="width: 7em;"> Action </th>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach ($detail_rekap as $dr => $data) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data->filename?></td>
                            <td><?=$data->file?></td>
                            <td>
                                <?php if($data->status == 0) {
                                    echo "Not Approved";
                                 } else if($data->status == 1){
                                     echo "Approved";
                                 } else {
                                    echo "Rejected";
                                 }?>
                            </td>
                            <td>
                            <a href="<?=site_url('Document/getView/'.$data->file.'/'.$data->id_rekap)?>" onclick="basicPopup(this.href); return false" class="btn btn-light btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a id="updateDetail" class="btn btn-light btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-update"
                            data-id = "<?=$data->id?>"
                            data-filename = "<?=$data->filename?>"
                            data-file = "<?=$data->file?>"
                            data-status = "<?=$data->status?>"
                            >
                                <i class="fas fa-edit"></i>
                            </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
       </div>
    </div>
</div>
</div>
</div>


<!-- Modal update document -->
<div class="modal fade" id="modal-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Update Detail Requirement </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <div class="modal-body">
            <div class="row justify-content-center">
                <div class="form-group col-lg-11">
                    <input type="text" id="id" hidden>
                    <input type="text" id="filename" name="filename" class="form-control" readonly>
                </div>
                <div class="form-group col-lg-11">
                    <input type="text" id="file" name="file" class="form-control" readonly>
                </div>
                <div class="form-group col-lg-11">
                    <select name="status" id="status" class="form-control">
                        <option value="0"> Not Approved </option>
                        <option value="1"> Approved </option>
                        <option value="2"> Rejected </option>
                    </select>
                </div>
                <center>
                <div class="form-group col-lg-12">
                <button type="button" id="updateDocument" class="btn btn-light btn-outline-primary btn-sm">
                    <i class="fa fa-paper-plane"></i> Save
                </button>
                </div>
                </center>
            </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
$(document).on('click', '#updateDetail', function(){

    let id = $(this).data('id');
    let filename = $(this).data('filename');
    let file = $(this).data('file');
    let status = $(this).data('status');

    if(status == 0) {
       $('#status').val('Not Approved')
    } else if(status == 1){
        $('#status').val('Approved')
    } else {
        $('#status').val('Rejected')
    }
    
    $('#id').val(id)
    $('#filename').val(filename)
    $('#file').val(file)
    $('#status').val(status)
})
})


$(document).on('click', '#updateDocument', function(){
    let id = $('#id').val()
    let filename = $('#filename').val()
    let file = $('#file').val()
    let status = $('#status').val()

    $.ajax({
        type: 'POST',
        url: '<?=site_url('Document/updateDet')?>',
        data: {'id':id, 'filename':filename, 'file':file, 'status':status},
        dataType: 'json',
        success : function(result){
            if(result.success == true){
                alert('Updated successfully!')
            }else{
                alert('Updated Failed!')
            }
            location.reload();
        }
    })
})
</script>

