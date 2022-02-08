<style>
    .back{
        float: right;
    }
</style>
<div class="container-fluid">
    <a href="<?=site_url('Requirement') ?>"  class="back btn btn-light btn-outline-primary">
        <i class="fas fa-undo"></i> Back
    </a>
    <h1 class="h2 mb-4 text-gray-800">Detail Requirement</h1>
        <br>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Detail Requirement</h6>
    </div>
    <div class="card-body">
    <div class="row justify-content-center">
        <?php foreach($rekap as $r => $data) { ?>
        <div class="form-group col-lg-10">
            <input type="date" class="form-control" id="date" name="date" value="<?=$data->date?>" disabled>
        </div>
        <div class="form-group col-lg-10">
            <input type="text" class="form-control" id="name" name="name" value="<?=$data->name?>" disabled>
        </div>
        <div class="form-group col-lg-10">
            <input type="text" class="form-control" id="branch" name="branch" value="<?=$data->branch?>" disabled>
        </div>
        <?php } ?>
        <?php $id_rekap = $data->id ?>
        <div class="form-group col-lg-10"> 
        <table class="table table-hover table-bordered">
                <thead>
                    <th style="width: 2em;"> No. </th>
                    <th> Filename </th>
                    <th> Status </th>
                    <th style="width: 7em;"> Action </th>
                </thead>
                <tbody>
                    <?php $no=1; foreach($requirement as $re => $data) : ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data->filename?></td>
                        <td>
                            <?php 
                            if($data->status == null) {
                                echo " ";
                            }
                            else if($data->status == 0){
                                echo "not approved";
                            } else if($data->status == 1){
                                echo "Approved";
                            } else {
                                echo "Rejected";
                            }
                            ?>
                        </td>
                        <td>
                            <?php if($data->status == null) { ?>
                                <a id="upload" class="btn btn-light btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-update"
                                data-id = "<?=$data->id?>"
                                data-id_rekap = "<?=$data->id_rekap?>"
                                data-filename = "<?=$data->filename?>"
                                >
                                    <i class="fas fa-upload"> Upload </i>
                                </a>
                            <?php } ?>
                            <?php if($data->status != null) { ?>
                                <a href="<?=site_url('Requirement/getView/'.$data->file.'/'.$data->id_rekap)?>" onclick="basicPopup(this.href); return false" class="btn btn-light btn-outline-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            <?php } ?>
                            <?php if($data->status == 2) { ?>
                                <a href="<?=site_url('Requirement/delCart/'.$data->id.'/'.$id_rekap)?>" onclick="return confirm('Are you sure delete this data?')" id="deleteCart" class="btn btn-light btn-outline-primary btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            <?php } ?>
                        
                        </td>
                    </tr>
                    <?php endforeach; ?>
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
                <h5 class="modal-title"> Upload File </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <div class="modal-body">
                <?=form_open_multipart('Requirement/upload')?>
            <div class="row justify-content-center">    
                <div class="form-group col-lg-11">
                    <input type="text" id="id_rekap" name="id_rekap" hidden>
                    <input type="text" id="id" name="id" hidden>
                    <input type="text" id="filename" name="filename" class="form-control">
                </div>
                <div class="form-group col-lg-11">
                    <input type="file" id="file" name="file" class="form-control">
                </div>
                <center>
                <div class="form-group col-lg-12">
                <button type="submit" id="uploadFile" class="btn btn-light btn-outline-primary btn-sm">
                    <i class="fa fa-upload"></i> Upload
                </button>
                </div>
                </center>
            </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
$(document).on('click', '#upload', function(){
    let id = $(this).data('id');
    let id_rekap = $(this).data('id_rekap');
    let filename = $(this).data('filename');

    $('#id').val(id)
    $('#id_rekap').val(id_rekap)
    $('#filename').val(filename)
})
})
</script>
