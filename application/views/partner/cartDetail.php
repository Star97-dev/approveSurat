<?php           
	$no = 1;
	if ($cart->num_rows() > 0) {
		foreach ($cart->result() as $c => $data) { ?>
			<tr>
				<td><?=$no++?></td>
				<td><?=$data->filename?></td>
				<td><?=$data->file?></td>
				<td>
					<?php if($data->status == 0) {
                     echo " Not Approved";
					 } else if($data->status == 1){
						 echo "Approved";
					 } else {
						 echo "Rejected";
					 } 
					 ?>
                </td>
				<td>
				<a href="<?=site_url('Requirement/getViewDetailReq/'.$data->file.'/'.$data->id_rekap)?>" onclick="basicPopup(this.href); return false" class="btn btn-light btn-outline-primary btn-sm">
					<i class="fas fa-eye"></i>
				</a>
				<a href="<?=site_url('Requirement/delCartDetail/'.$data->id.'/'.$data->id_rekap)?>" onclick="return confirm('Are you sure delete this data?')" id="deleteCart" class="btn btn-light btn-outline-primary btn-sm">
					<i class="fas fa-trash"></i>
				</a>
				</td>
			</tr>
		<?php }	
	}
	else{
		echo '<tr>
		<td colspan="8" class="text-center"> -No data-</td>
		</tr>';
	}
?>

<script>
	function basicPopup(url){
		popupWindow = window.open(url, 'popUpWindow')
	}
</script>

