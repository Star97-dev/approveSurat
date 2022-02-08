<style>
    .back{
        float: right;
    }
</style>
<div class="container-fluid">
    <?php foreach($rekap as $rkp => $data) { ?>
        <a href="<?=site_url('Requirement/detail/'.$data->id) ?>" id="back" class="back btn btn-light btn-outline-primary">
        <i class="fas fa-undo"></i> Back
    </a>
    <?php } ?>
    <?php $id_rekap = $data->id ?>
    <h1 class="h2 mb-4 text-gray-800">Upload File</h1>
        <br>
<div class="card shadow mb-4">
<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Upload File</h6>
    </div>
    <div class="card-body">
    <div class="row justify-content-center">
        <div class="form-group col-lg-10">
        <form id="uploadFile" method="POST">
            <div class="form-group m-2">
                <input type="text" name="id_user" id="id_user" value="<?=$user['id']?>" hidden>
                <?php foreach($requirement as $rkp) : ?>
                    <input type="text" name="id_rekap" id="id_rekap" value="<?=$id_rekap?>" hidden>
                    <input type="text" name="id_req" id="id_req" value="<?=$rkp->id_req?>" class="form-control" hidden>
                    <input type="text" name="fileName" id="fileName" value="<?=$rkp->filename?>" class="form-control" readonly>
                <?php endforeach; ?>
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
            let id_req = $('#id_req').val()

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
                alert('Upload Success!')
                let back = document.getElementById('back');
                back.click();
            }
        })
    })
})
</script>