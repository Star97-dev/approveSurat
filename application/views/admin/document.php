
<div class="container-fluid">
<h1 class="h2 mb-4 text-gray-800"> Document Requirement </h1>
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Document Requirement</h6>
    </div>
    <div class="card-body">
    <div class="row justify-content-center">
        <div class="form-group col-lg-12">
            <table class="table table-hover table-bordered">
                <thead>
                    <th style="width: 2em;"> No. </th>
                    <th style="width: 12em;"> Name </th>
                    <th> Branch </th>
                    <th> Date </th>
                    <th> Status </th>
                    <th style="width: 15em;"> Note </th>
                    <th style="width: 12em;"> Action </th>
                </thead>
                <tbody>
                    <?php $no=1; 
                    foreach($rekap as $rkp => $data) : ?>
                        <tr>
                            <input type="text" name="id_rekap" id="id_rekap" value="<?=$data->id?>" hidden>
                            <td><?=$no++?></td>
                            <td><?=$data->name?></td>
                            <td><?=$data->branch?></td>
                            
                            <td><?=$data->date?></td>
                            <td><?php if($data->status == 1) {
                                echo "Not Approved";
                                } else if($data->status == 2){
                                    echo "Approved";
                                } else {
                                    echo "Rejected";
                                }?>
                                </td>
                            <td><?=$data->note?></td>    
                            <td>
                            <a href="<?=site_url('Document/detailDoc/'.$data->id)?>"  class="btn btn-light btn-outline-primary btn-sm">
                                <i class="fas fa-eye"> Detail </i>
                            </a>
                            <a id="update" class="btn btn-light btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-update"
                            data-id = "<?=$data->id?>"
                            data-id_user = "<?=$data->id_user?>"
                            data-name = "<?=$data->name?>"
                            data-branch = "<?=$data->branch?>"
                            data-date = "<?=$data->date?>"
                            data-status = "<?=$data->status?>"
                            data-note = "<?=$data->note?>"
                            >
                                <i class="fas fa-edit"> Update </i>
                            </a>
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
                <h5 class="modal-title"> Update Document Requirement </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <div class="modal-body">
            <div class="row justify-content-center">
                <div class="form-group col-lg-11">
                    <input type="text" id="id" hidden>
                    <input type="text" id="id_user" hidden>
                    <input type="text" id="name" name="name" class="form-control" readonly>
                </div>
                <div class="form-group col-lg-11">
                    <input type="text" id="branch" name="branch" class="form-control" readonly>
                </div>
                <div class="form-group col-lg-11">
                    <input type="text" id="role" name="role" class="form-control" readonly>
                </div>
                <div class="form-group col-lg-11">
                    <input type="text" id="date" name="date" class="form-control" readonly>
                </div>
                <div class="form-group col-lg-11">
                    <select name="status" id="status" class="form-control">
                        <option value="1"> Not Approved </option>
                        <option value="2"> Approved </option>
                        <option value="3"> Rejected </option>
                    </select>
                </div>
                <div class="form-group col-lg-11">
                    <input type="text" id="note" name="note" class="form-control" placeholder="note">
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
$(document).on('click', '#update', function(){
    let id = $(this).data('id');
    let id_user = $(this).data('id_user');
    let name = $(this).data('name');
    let branch = $(this).data('branch');
    let role = $(this).data('role');
    let date = $(this).data('date');
    let status = $(this).data('status');
    let note = $(this).data('note');
    
    if(role == 1) {
       $('#role').val('Developer')
    } else {
        $('#role').val('Individual Cutomer')
    }

    if(status == 1) {
       $('#status').val('Not Approved')
    } else if(status == 2){
        $('#status').val('Approved')
    } else {
        $('#status').val('Rejected')
    }

    
    
    $('#id').val(id)
    $('#id_user').val(id_user)
    $('#name').val(name)
    $('#branch').val(branch)
    $('#date').val(date)
    $('#status').val(status)
    $('#note').val(note)
})
})


$(document).on('click', '#updateDocument', function(){
    let id = $('#id').val()
    let id_user = $('#id_user').val()
    let name = $('#name').val()
    let branch = $('#branch').val()
    let date = $('#date').val()
    let status = $('#status').val()
    let note = $('#note').val()

    $.ajax({
        type: 'POST',
        url: '<?=site_url('Document/updateDoc')?>',
        data: {'id':id, 'id_user':id_user, 'name':name, 'branch':branch, 'date':date, 'status':status,'note':note},
        dataType: 'json',
        success : function(result){
            if(result.success == true){
                alert('Updated successfully!')
            }else{
                alert('Updated Failed!')
            }
            location.href='<?=site_url('Document')?>'  
        }
    })
})
</script>


