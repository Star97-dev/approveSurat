<style>
    .back{
        float: right;
    }
</style>
<div class="container-fluid">
    <?php foreach($rekap as $rkp) { ?>
        <a href="<?=site_url('Requirement/detailRequire/'.$rkp->id) ?>"  class="back btn btn-light btn-outline-primary">
            <i class="fas fa-undo"></i> Back
        </a>
    <?php } ?>
    <h1 class="h2 mb-4 text-gray-800">Upload Requirement</h1>
        <br>
    <div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form upload Requirement</h6>
    </div>
    <div class="card-body">
    
    <div class="row justify-content-center">
        <div
    
        class="form-group col-lg-10">
        <hr>
        <button type="button" class="btn btn-light btn-block btn-outline-primary" data-toggle="collapse" data-target="#uploadFile">
            <i class="fas fa-file-upload"></i> Upload File </button>
            <form id="uploadFile" class="collapse">
            <div class="form-group m-2">
            <?php foreach($rekap as $rkp) { ?>
                <input type="text" name="id_rekap" id="id_rekap" value="<?=$rkp->id?>" hidden>
            <?php } ?>
                <input type="text" name="fileName" id="fileName" class="form-control" placeholder="Filename">
            </div>
            <div class="form-group m-2">
            <input type="file" name="file" id="file" class="form-control" placeholder="File">
            </div>
            <div class="form-group">
                <center>
                    <button type="submit" id="inputCart" class="btn btn-light btn-outline-primary btn-sm"> Input File </button>
                </center>
            </div>
            </form>
            <hr>                             
        </div>
        <div class="form-group col-lg-10">
        <table class="table table-hover table-bordered">
            <thead>
                <th style="width: 2em;"> No. </th>
                <th> Filename </th>
                <th> File </th>
                <th> Status </th>
                <th style="width: 6em;"> Action </th>
            </thead>
            <tbody id="cart_file">
                <?php $this->load->view('partner/cartDetail')?>
            </tbody>
        </table>
       </div>
    </div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

$(document).ready(function(){
    $('#uploadFile').submit(function(e){
        e.preventDefault();
        $(document).on('click','#inputCart', function(){
            let filename = $('#fileName').val()
            let file = $('#file').val()
            let id_rekap = $('#id_rekap').val()

            if(filename == ''){
                alert('Filename cannot empty!');
            } else if(file == '') {
                alert('File cannot empty!');
            }
        })
        $.ajax({
            url : '<?=base_url('Requirement/input_cart')?>',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success:function(result){
                location.reload();
            }
        })
    })
})


</script>
