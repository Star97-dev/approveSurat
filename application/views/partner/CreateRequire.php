<style>
    .back{
        float: right;
    }
</style>
<div class="container-fluid">
    <a href="<?=site_url('Requirement') ?>"  class="back btn btn-light btn-outline-primary">
        <i class="fas fa-undo"></i> Back
    </a>
    <h1 class="h2 mb-4 text-gray-800">Upload Requirement</h1>
        <br>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form upload Requirement</h6>
    </div>
    <form action="CreateRequire/save" method="post">
    <div class="card-body">
    <div class="row justify-content-center">
        <div class="form-group col-lg-10">
            <input type="date" class="form-control"
                id="date" name="date" value="<?=date('Y-m-d')?>">
        </div>
        <div class="form-group col-lg-10">
            <input type="text" name="id_user" id="id_user" value="<?=$user['id']?>" hidden>
            <input type="text" class="form-control" id="name" name="name" value="<?=$user["name"]?>">
                <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
        </div>
        <div class="form-group col-lg-10">
            <select name="branch" id="branch" class="form-control">
                <option value> ---Select Branch--- </option>
                <option value="BTN Tangerang"> BTN Tangerang </option>
                <option value="BTN Harmoni"> BTN Harmoni </option>
                <option value="BTN Cawang"> BTN Cawang </option>
            </select>
                <?= form_error('branch','<small class="text-danger pl-3">','</small>'); ?>
        </div>
    </div>
    <div class="form-group">
        <center>
            <button type="submit" class="btn btn-light btn-outline-primary btn-sm">
            <i class="fas fa-upload"> </i> Create </button>
        </center>
    </div>
</div>
</div>
</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

//save cart
$(document).on('click', '#saveCart', function (){
        let date = $('#date').val()
        let id_user = $('#id_user').val()
        let name = $('#name').val()
        let branch = $('#branch').val()

        if(branch == ''){
            alert('Branch cannot be empty!')
            $('#branch').focus()
        } else {
            $.ajax({
                type : 'POST',
                url : '<?=base_url('CreateRequire/save')?>',
                data : {'date' : date, 'id_user' : id_user, 'name' : name, 'branch' : branch},
                dataType : 'json',
                success:function(result){
                    if(result.success == true){
                        alert('Data saved successfully!')
                        $('#branch').val()
                        $('#role').val()
                    } else {
                        alert('Data failed to save!')
                    }
                    location.href='<?=site_url('Requirement')?>'
                }
            })
        }
    })
</script>
