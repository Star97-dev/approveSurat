
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
                </thead>
                <tbody>
                    <?php $no=1; 
                    foreach($rekap as $rkp => $data) : ?>
                        <tr>
                            <input type="text" name="id_rekap" id="id_rekap" value="<?=$data->id?>" hidden>
                            <td><?=$no++?></td>
                            <td><?=$data->name?></td>
                            <td><?=$data->branch?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
       </div>
    </div>
</div>
</div>
</div>
