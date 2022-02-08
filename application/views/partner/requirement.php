
<div class="container-fluid">
<h1 class="h2 mb-4 text-gray-800"> Requirement Data </h1>
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Requirement Data</h6>
    </div>
    <div class="card-body">
                <div class="pull-right">
					<a href="<?=site_url('CreateRequire') ?>" class="btn btn-light btn-outline-primary">
                    <i class="fas fa-plus"></i> Create
					</a>
				</div>
                <br>
    <div class="row justify-content-center">
        <div class="form-group col-lg-12">
            <table class="table table-hover table-bordered">
                <thead>
                    <th style="width: 2em;"> No. </th>
                    <th style="width: 12em;"> Name </th>
                    <th> Branch </th>
                    <th> Date </th>
                    <th> Status </th>
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
                            <td><?php if($data->status == 0) {
                                echo " Not Submited";
                                } else if($data->status == 1){
                                    echo "Submited";
                                } else if($data->status == 2){
                                    echo "Approved";
                                } else {
                                    echo "Rejected";
                                }
                                ?>
                            </td>
                            <td>
                            <a href="<?=site_url('Requirement/detail/'.$data->id)?>"  class="btn btn-light btn-outline-primary btn-sm">
                                <i class="fas fa-eye"> Detail </i>
                            </a>
                            <?php 
                            if($data->status == 0){ ?>
                            <a href="<?=site_url('Requirement/submit/'.$data->id)?>" id="submit" onclick="return confirm('Are you sure submit this data?')" class="btn btn-light btn-outline-primary btn-sm">
                                <i class="fas fa-paper-plane"> Submit </i>
                            </a>
                           <?php }
                            ?>
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

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).on('click', '#submit', function (){
        let id = $('#id_rekap').val()
        alert(id)
            $.ajax({
                type : 'POST',
                url : '<?=base_url('Requirement/submit')?>',
                data : {'id' : id},
                dataType : 'json',
                success:function(result){
                    if(result.success == true){
                        alert('Data submit successfully!')
                    } else {
                        alert('Data failed to submit!')
                    }
                    location.href='<?=site_url('Requirement')?>'
                }
            })
        
    })
</script> -->


