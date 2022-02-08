<style>
    .back{
        float: right;
    }
</style>
<div class="container-fluid">
<a href="<?=site_url('Requirement')?>"  class="back btn btn-light btn-outline-primary">
        <i class="fas fa-undo"></i> Back
    </a>
<h1 class="h2 mb-4 text-gray-800"> Detail Requirement Data </h1>
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Detail Requirement Data</h6>
    </div>
    <div class="card-body">
    <?php foreach ($rekap as $rk => $data) { ?>
    <?php if($data->status == 3) { ?>
    <div class="pull-right">
        <a href="<?=site_url('Requirement/CreateDetailRequire/'.$data->id)?>" class="btn btn-light btn-outline-primary">
        <i class="fas fa-plus"></i> Create
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    
                <br>
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
                            <a href="<?=site_url('Requirement/getView/'.$data->file.'/'.$data->id_rekap)?>" onclick="basicPopup(this.href); return false" class="btn btn-light btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?=site_url('Requirement/delCart/'.$data->id.'/'.$data->id_rekap)?>" onclick="return confirm('Are you sure delete this data?')" id="deleteCart" class="btn btn-light btn-outline-primary btn-sm">
                                <i class="fas fa-trash"></i>
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

