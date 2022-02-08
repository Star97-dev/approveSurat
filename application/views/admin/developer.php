
<div class="container-fluid">
<h1 class="h2 mb-4 text-gray-800"> Developer </h1>
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Developer</h6>
    </div>
    <div class="card-body">
    <div class="row justify-content-center">
        <div class="form-group col-lg-12">
            <table class="table table-hover table-bordered">
                <thead>
                    <th style="width: 2em;"> No. </th>
                    <th> Name </th>
                    <th> Branch </th>
                    <th> PKS </th>
                    <th style="width: 20em;"> Note </th>
                    <th style="width: 7em;"> Action </th>
                </thead>
                <tbody>
                    <?php $no=1; 
                    foreach($rekap as $rkp => $data) : ?>
                        <tr>
                            <input type="text" name="id_rekap" id="id_rekap" value="<?=$data->id?>" hidden>
                            <td><?=$no++?></td>
                            <td><?=$data->name?></td>
                            <td><?=$data->branch?></td>
                            <td><?=$data->pks?></td>
                            <td><?=$data->note?></td>    
                            <td>
                            <a id="upload" class="btn btn-light btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-update"
                            data-id = "<?=$data->id?>"
                            >
                                <i class="fas fa-upload"></i>
                            </a>
                            <?php if($data->pks != null) : ?>
                            <a href="<?=site_url('Developer/getView/'.$data->pks.'/'.$data->id)?>" onclick="basicPopup(this.href); return false" class="btn btn-light btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <?php endif; ?>
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
                <h5 class="modal-title"> Upload PKS File </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <div class="modal-body">
                <?=form_open_multipart('Developer/upload')?>
            <div class="row justify-content-center">    
                <div class="form-group col-lg-11">
                    <input type="text" id="id" name="id" hidden>
                    <input type="text" id="filename" name="filename" class="form-control" placeholder="Filename">
                </div>
                <div class="form-group col-lg-11">
                    <input type="file" id="pks" name="pks" class="form-control">
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
    $('#id').val(id)
})
})
</script>


