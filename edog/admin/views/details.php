<!-- Page Title -->
<section class="site-heading site-section-top">
	<div class="header-section dashboard">
		<div class="container-fluid">
			<h1>Pengurusan Laporan</h1>
		</div>
	</div>
</section>
<!-- END Page Title -->

<section class="site-section site-content-single">
    <div class="container-fluid">
        <div class="row">
			<div class="col-sm-5">
				<div class="block full bordered">
					<div class="block-title">
						<h2><strong>Jana Laporan</strong></h2>
					</div>
					
					<form action="<?php echo base_url('admin'); ?>/index.php/report/details" id="report-form" method="get" class="form-horizontal form-bordered">
						<div class="row">
							<div class="col-sm-12">
		                        <div class="form-group">
		                            <label class="col-md-3 control-label left" for="year">Tahun</label>
		                            <div class="col-md-3">
		                                <select name="tahun" id="tahun" class="form-control">
		                                	<?php
											   for($i = 2015; $i < 2025; $i++){
											   	if($year == $i)
											     	echo "<option selected>" . $i . "</option>";
											     else
											     	echo "<option>" . $i . "</option>";
											   }
											  ?>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="col-md-3 control-label left" for="parlimen">Parlimen</label>
		                            <div class="col-md-9">
		                            	<?php if($this->input->get('parlimen') == 'semua-parlimen'){ ?>
		                            	 <label class="radio-inline"><input type="radio" id="parlimen" checked name="parlimen" value="semua-parlimen">Semua parlimen</label>
										<?php }else{ ?>
										 <label class="radio-inline"><input type="radio" id="parlimen" checked name="parlimen" value="semua-parlimen">Semua parlimen</label>
										<?php } ?>

										 <?php if($this->input->get('parlimen') == 'pilih-parlimen'){ ?>
											<label class="radio-inline"><input type="radio" id="parlimen" checked name="parlimen" value="pilih-parlimen">Pilih parlimen</label>
										 <?php }else{ ?>
										 	<label class="radio-inline"><input type="radio" id="parlimen" name="parlimen" value="pilih-parlimen">Pilih parlimen</label>
		                            	 <?php } ?>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="col-md-3 control-label left" for="parlimen">Parlimen</label>
		                            <div class="col-md-9">
		                            	<?php 
		                            		foreach($parlimen as $row)
		                            		{
		                            			if($this->input->get('parlimen') == 'semua-parlimen')
		                            				$disabled = 'disabled';
		                            			elseif($this->input->get('parlimen') == 'pilih-parlimen')
		                            				$disabled = '';
		                            			else
		                            				$disabled = 'disabled';

		                            			if(in_array($row->par_id, $this->input->get('list-parlimen')))
		                            				echo "<label class=\"checkbox-inline\"><input type=\"checkbox\" checked ".$disabled." id=\"list-parlimen\" name=\"list-parlimen[]\" value=\"".$row->par_id."\" /> ".$row->par_name."</label>";
		                            			else
		                            				echo "<label class=\"checkbox-inline\"><input type=\"checkbox\" ".$disabled." id=\"list-parlimen\" name=\"list-parlimen[]\" value=\"".$row->par_id."\" /> ".$row->par_name."</label>";
		                            		}	
		                            	?>
		                            </div>
		                        </div>
		                        <div class="form-group form-actions">
									<div class="col-md-12 text-right">
										<button type="submit" class="btn btn-sm btn-primary"><strong><i class="fa fa-angle-right"></i> Jana Laporan</strong></button>
									</div>
								</div>
		                    </div>
		                </div>
		            </form>
		        </div>
		    </div>
		</div>
		<div class="row">
			<div class="col-sm-10">
				<h3><strong>Statistik Tahun <?php echo $year; ?> </strong><br> Parlimen : <?php echo $listparlimen; ?></h3><br>
			</div>
		</div>
		 <div class="row">
			<div class="col-sm-10">
				<div class="block full bordered">
					<div class="block-title">
						<h2><strong>Permohonan</strong></h2>
					</div>
					<div class="form-horizontal form-bordered">
		            	<div class="row">
							<div class="col-sm-12">
		                        <div class="form-group">
		                            <table class="table table-bordered table-vcenter">
		                            	<thead>
		                            		<tr class="warning text-center">
		                            			<td><strong>Status Permohonan</strong></td>
		                            			<td><strong>Jan</strong></td>
		                            			<td><strong>Feb</strong></td>
		                            			<td><strong>Mac</strong></td>
		                            			<td><strong>Apr</strong></td>
		                            			<td><strong>Mei</strong></td>
		                            			<td><strong>Jun</strong></td>
		                            			<td><strong>Jul</strong></td>
		                            			<td><strong>Ogs</strong></td>
		                            			<td><strong>Sep</strong></td>
		                            			<td><strong>Okt</strong></td>
		                            			<td><strong>Nov</strong></td>
		                            			<td><strong>Dis</strong></td>
		                            			<td><strong>JUMLAH</strong></td>
		                            		</tr>
		                            	</thead>
		                            	<tbody>
		                            		<tr class="text-center">
		                            			<td class="text-left">Lulus</td>
		                            			<td><?php echo number_format($lulus[0]); ?></td>
		                            			<td><?php echo number_format($lulus[1]); ?></td>
		                            			<td><?php echo number_format($lulus[2]); ?></td>
		                            			<td><?php echo number_format($lulus[3]); ?></td>
		                            			<td><?php echo number_format($lulus[4]); ?></td>
		                            			<td><?php echo number_format($lulus[5]); ?></td>
		                            			<td><?php echo number_format($lulus[6]); ?></td>
		                            			<td><?php echo number_format($lulus[7]); ?></td>
		                            			<td><?php echo number_format($lulus[8]); ?></td>
		                            			<td><?php echo number_format($lulus[9]); ?></td>
		                            			<td><?php echo number_format($lulus[10]); ?></td>
		                            			<td><?php echo number_format($lulus[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($lulus)); ?></td>
		                            		</tr>
		                            		<tr class="text-center">
		                            			<td class="text-left">Ditolak</td>
		                            			<td><?php echo number_format($tolak[0]); ?></td>
		                            			<td><?php echo number_format($tolak[1]); ?></td>
		                            			<td><?php echo number_format($tolak[2]); ?></td>
		                            			<td><?php echo number_format($tolak[3]); ?></td>
		                            			<td><?php echo number_format($tolak[4]); ?></td>
		                            			<td><?php echo number_format($tolak[5]); ?></td>
		                            			<td><?php echo number_format($tolak[6]); ?></td>
		                            			<td><?php echo number_format($tolak[7]); ?></td>
		                            			<td><?php echo number_format($tolak[8]); ?></td>
		                            			<td><?php echo number_format($tolak[9]); ?></td>
		                            			<td><?php echo number_format($tolak[10]); ?></td>
		                            			<td><?php echo number_format($tolak[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($tolak)); ?></td>
		                            		</tr>
		                            		<tr class="text-center">
		                            			<td class="text-left">Diterima</td>
		                            			<td><?php echo number_format($terima[0]); ?></td>
		                            			<td><?php echo number_format($terima[1]); ?></td>
		                            			<td><?php echo number_format($terima[2]); ?></td>
		                            			<td><?php echo number_format($terima[3]); ?></td>
		                            			<td><?php echo number_format($terima[4]); ?></td>
		                            			<td><?php echo number_format($terima[5]); ?></td>
		                            			<td><?php echo number_format($terima[6]); ?></td>
		                            			<td><?php echo number_format($terima[7]); ?></td>
		                            			<td><?php echo number_format($terima[8]); ?></td>
		                            			<td><?php echo number_format($terima[9]); ?></td>
		                            			<td><?php echo number_format($terima[10]); ?></td>
		                            			<td><?php echo number_format($terima[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($terima)); ?></td>
		                            		</tr>
		                            		<tr class="text-center">
		                            			<td class="text-left">Dalam Proses</td>
		                            			<td><?php echo number_format($dalam_proses[0]); ?></td>
		                            			<td><?php echo number_format($dalam_proses[1]); ?></td>
		                            			<td><?php echo number_format($dalam_proses[2]); ?></td>
		                            			<td><?php echo number_format($dalam_proses[3]); ?></td>
		                            			<td><?php echo number_format($dalam_proses[4]); ?></td>
		                            			<td><?php echo number_format($dalam_proses[5]); ?></td>
		                            			<td><?php echo number_format($dalam_proses[6]); ?></td>
		                            			<td><?php echo number_format($dalam_proses[7]); ?></td>
		                            			<td><?php echo number_format($dalam_proses[8]); ?></td>
		                            			<td><?php echo number_format($dalam_proses[9]); ?></td>
		                            			<td><?php echo number_format($dalam_proses[10]); ?></td>
		                            			<td><?php echo number_format($dalam_proses[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($dalam_proses)); ?></td>
		                            		</tr>
		                            		<tr class="text-center">
		                            			<td class="text-left">Rayuan Dalam Proses</td>
		                            			<td><?php echo number_format($dalam_proses_rayuan[0]); ?></td>
		                            			<td><?php echo number_format($dalam_proses_rayuan[1]); ?></td>
		                            			<td><?php echo number_format($dalam_proses_rayuan[2]); ?></td>
		                            			<td><?php echo number_format($dalam_proses_rayuan[3]); ?></td>
		                            			<td><?php echo number_format($dalam_proses_rayuan[4]); ?></td>
		                            			<td><?php echo number_format($dalam_proses_rayuan[5]); ?></td>
		                            			<td><?php echo number_format($dalam_proses_rayuan[6]); ?></td>
		                            			<td><?php echo number_format($dalam_proses_rayuan[7]); ?></td>
		                            			<td><?php echo number_format($dalam_proses_rayuan[8]); ?></td>
		                            			<td><?php echo number_format($dalam_proses_rayuan[9]); ?></td>
		                            			<td><?php echo number_format($dalam_proses_rayuan[10]); ?></td>
		                            			<td><?php echo number_format($dalam_proses_rayuan[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($dalam_proses_rayuan)); ?></td>
		                            		</tr>
		                            		<tr class="text-center">
		                            			<td class="text-left"><strong>JUMLAH</strong></td>
		                            			<td><?php echo number_format($lulus[0] + $tolak[0] + $terima[0] + $dalam_proses[0] + $dalam_proses_rayuan[0]); ?></td>
		                            			<td><?php echo number_format($lulus[1] + $tolak[1] + $terima[1] + $dalam_proses[1] + $dalam_proses_rayuan[1]); ?></td>
		                            			<td><?php echo number_format($lulus[2] + $tolak[2] + $terima[2] + $dalam_proses[2] + $dalam_proses_rayuan[2]); ?></td>
		                            			<td><?php echo number_format($lulus[3] + $tolak[3] + $terima[3] + $dalam_proses[3] + $dalam_proses_rayuan[3]); ?></td>
		                            			<td><?php echo number_format($lulus[4] + $tolak[4] + $terima[4] + $dalam_proses[4] + $dalam_proses_rayuan[4]); ?></td>
		                            			<td><?php echo number_format($lulus[5] + $tolak[5] + $terima[5] + $dalam_proses[5] + $dalam_proses_rayuan[5]); ?></td>
		                            			<td><?php echo number_format($lulus[6] + $tolak[6] + $terima[6] + $dalam_proses[6] + $dalam_proses_rayuan[6]); ?></td>
		                            			<td><?php echo number_format($lulus[7] + $tolak[7] + $terima[7] + $dalam_proses[7] + $dalam_proses_rayuan[7]); ?></td>
		                            			<td><?php echo number_format($lulus[8] + $tolak[8] + $terima[8] + $dalam_proses[8] + $dalam_proses_rayuan[8]); ?></td>
		                            			<td><?php echo number_format($lulus[9] + $tolak[9] + $terima[9] + $dalam_proses[9] + $dalam_proses_rayuan[9]); ?></td>
		                            			<td><?php echo number_format($lulus[10] + $tolak[10] + $terima[10] + $dalam_proses[10] + $dalam_proses_rayuan[10]); ?></td>
		                            			<td><?php echo number_format($lulus[11] + $tolak[11] + $terima[11] + $dalam_proses[11] + $dalam_proses_rayuan[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($lulus) + array_sum($tolak) + array_sum($terima) + array_sum($dalam_proses) + array_sum($dalam_proses_rayuan)); ?></td>
		                            		</tr>
		                            	</tbody>
		                            </table>
		                        </div>
		                    </div>
		                </div>
		            </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-10">
				<div class="block full bordered">
					<div class="block-title">
						<h2><strong>Bilangan Anjing</strong></h2>
					</div>
					<div class="form-horizontal form-bordered">
		            	<div class="row">
							<div class="col-sm-12">
		                        <div class="form-group">
		                            <table class="table table-bordered table-vcenter">
		                            	<thead>
		                            		<tr class="warning text-center">
		                            			<td><strong>Bilangan Anjing</strong></td>
		                            			<td><strong>Jan</strong></td>
		                            			<td><strong>Feb</strong></td>
		                            			<td><strong>Mac</strong></td>
		                            			<td><strong>Apr</strong></td>
		                            			<td><strong>Mei</strong></td>
		                            			<td><strong>Jun</strong></td>
		                            			<td><strong>Jul</strong></td>
		                            			<td><strong>Ogs</strong></td>
		                            			<td><strong>Sep</strong></td>
		                            			<td><strong>Okt</strong></td>
		                            			<td><strong>Nov</strong></td>
		                            			<td><strong>Dis</strong></td>
		                            			<td><strong>JUMLAH</strong></td>
		                            		</tr>
		                            	</thead>
		                            	<tbody>
		                            		<tr class="text-center">
		                            			<td class="text-left">Mempunyai Lencana</td>
		                            			<td><?php echo number_format($exists[0]); ?></td>
		                            			<td><?php echo number_format($exists[1]); ?></td>
		                            			<td><?php echo number_format($exists[2]); ?></td>
		                            			<td><?php echo number_format($exists[3]); ?></td>
		                            			<td><?php echo number_format($exists[4]); ?></td>
		                            			<td><?php echo number_format($exists[5]); ?></td>
		                            			<td><?php echo number_format($exists[6]); ?></td>
		                            			<td><?php echo number_format($exists[7]); ?></td>
		                            			<td><?php echo number_format($exists[8]); ?></td>
		                            			<td><?php echo number_format($exists[9]); ?></td>
		                            			<td><?php echo number_format($exists[10]); ?></td>
		                            			<td><?php echo number_format($exists[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($exists)); ?></td>
		                            		</tr>
		                            		<tr class="text-center">
		                            			<td class="text-left">Tiada Lencana</td>
		                            			<td><?php echo number_format($not_exists[0]); ?></td>
		                            			<td><?php echo number_format($not_exists[1]); ?></td>
		                            			<td><?php echo number_format($not_exists[2]); ?></td>
		                            			<td><?php echo number_format($not_exists[3]); ?></td>
		                            			<td><?php echo number_format($not_exists[4]); ?></td>
		                            			<td><?php echo number_format($not_exists[5]); ?></td>
		                            			<td><?php echo number_format($not_exists[6]); ?></td>
		                            			<td><?php echo number_format($not_exists[7]); ?></td>
		                            			<td><?php echo number_format($not_exists[8]); ?></td>
		                            			<td><?php echo number_format($not_exists[9]); ?></td>
		                            			<td><?php echo number_format($not_exists[10]); ?></td>
		                            			<td><?php echo number_format($not_exists[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($not_exists)); ?></td>
		                            		</tr>
		                            		<tr class="text-center">
		                            			<td class="text-left"><strong>JUMLAH</strong></td>
		                            			<td><?php echo number_format($exists[0] + $not_exists[0]); ?></td>
		                            			<td><?php echo number_format($exists[1] + $not_exists[1]); ?></td>
		                            			<td><?php echo number_format($exists[2] + $not_exists[2]); ?></td>
		                            			<td><?php echo number_format($exists[3] + $not_exists[3]); ?></td>
		                            			<td><?php echo number_format($exists[4] + $not_exists[4]); ?></td>
		                            			<td><?php echo number_format($exists[5] + $not_exists[5]); ?></td>
		                            			<td><?php echo number_format($exists[6] + $not_exists[6]); ?></td>
		                            			<td><?php echo number_format($exists[7] + $not_exists[7]); ?></td>
		                            			<td><?php echo number_format($exists[8] + $not_exists[8]); ?></td>
		                            			<td><?php echo number_format($exists[9] + $not_exists[9]); ?></td>
		                            			<td><?php echo number_format($exists[10] + $not_exists[10]); ?></td>
		                            			<td><?php echo number_format($exists[11] + $not_exists[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($exists) + array_sum($not_exists)); ?></td>
		                            		</tr>
		                            	</tbody>
		                            </table>
		                        </div>
		                    </div>
		                </div>
		            </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-10">
				<div class="block full bordered">
					<div class="block-title">
						<h2><strong>Status Anjing</strong></h2>
					</div>
					<div class="form-horizontal form-bordered">
		            	<div class="row">
							<div class="col-sm-12">
		                        <div class="form-group">
		                            <table class="table table-bordered table-vcenter">
		                            	<thead>
		                            		<tr class="warning text-center">
		                            			<td><strong>Status Anjing</strong></td>
		                            			<td><strong>Jan</strong></td>
		                            			<td><strong>Feb</strong></td>
		                            			<td><strong>Mac</strong></td>
		                            			<td><strong>Apr</strong></td>
		                            			<td><strong>Mei</strong></td>
		                            			<td><strong>Jun</strong></td>
		                            			<td><strong>Jul</strong></td>
		                            			<td><strong>Ogs</strong></td>
		                            			<td><strong>Sep</strong></td>
		                            			<td><strong>Okt</strong></td>
		                            			<td><strong>Nov</strong></td>
		                            			<td><strong>Dis</strong></td>
		                            			<td><strong>JUMLAH</strong></td>
		                            		</tr>
		                            	</thead>
		                            	<tbody>
		                            		<tr class="text-center">
		                            			<td class="text-left">Masih Hidup</td>
		                            			<td><?php echo number_format($alive[0]); ?></td>
		                            			<td><?php echo number_format($alive[1]); ?></td>
		                            			<td><?php echo number_format($alive[2]); ?></td>
		                            			<td><?php echo number_format($alive[3]); ?></td>
		                            			<td><?php echo number_format($alive[4]); ?></td>
		                            			<td><?php echo number_format($alive[5]); ?></td>
		                            			<td><?php echo number_format($alive[6]); ?></td>
		                            			<td><?php echo number_format($alive[7]); ?></td>
		                            			<td><?php echo number_format($alive[8]); ?></td>
		                            			<td><?php echo number_format($alive[9]); ?></td>
		                            			<td><?php echo number_format($alive[10]); ?></td>
		                            			<td><?php echo number_format($alive[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($alive)); ?></td>
		                            		</tr>
		                            		<tr class="text-center">
		                            			<td class="text-left">Mati</td>
		                            			<td><?php echo number_format($dead[0]); ?></td>
		                            			<td><?php echo number_format($dead[1]); ?></td>
		                            			<td><?php echo number_format($dead[2]); ?></td>
		                            			<td><?php echo number_format($dead[3]); ?></td>
		                            			<td><?php echo number_format($dead[4]); ?></td>
		                            			<td><?php echo number_format($dead[5]); ?></td>
		                            			<td><?php echo number_format($dead[6]); ?></td>
		                            			<td><?php echo number_format($dead[7]); ?></td>
		                            			<td><?php echo number_format($dead[8]); ?></td>
		                            			<td><?php echo number_format($dead[9]); ?></td>
		                            			<td><?php echo number_format($dead[10]); ?></td>
		                            			<td><?php echo number_format($dead[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($dead)); ?></td>
		                            		</tr>
		                            		<tr class="text-center">
		                            			<td class="text-left">Hilang</td>
		                            			<td><?php echo number_format($lost[0]); ?></td>
		                            			<td><?php echo number_format($lost[1]); ?></td>
		                            			<td><?php echo number_format($lost[2]); ?></td>
		                            			<td><?php echo number_format($lost[3]); ?></td>
		                            			<td><?php echo number_format($lost[4]); ?></td>
		                            			<td><?php echo number_format($lost[5]); ?></td>
		                            			<td><?php echo number_format($lost[6]); ?></td>
		                            			<td><?php echo number_format($lost[7]); ?></td>
		                            			<td><?php echo number_format($lost[8]); ?></td>
		                            			<td><?php echo number_format($lost[9]); ?></td>
		                            			<td><?php echo number_format($lost[10]); ?></td>
		                            			<td><?php echo number_format($lost[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($lost)); ?></td>
		                            		</tr>
		                            		<tr class="text-center">
		                            			<td class="text-left">No Lencana Hilang</td>
		                            			<td><?php echo number_format($tag_lost[0]); ?></td>
		                            			<td><?php echo number_format($tag_lost[1]); ?></td>
		                            			<td><?php echo number_format($tag_lost[2]); ?></td>
		                            			<td><?php echo number_format($tag_lost[3]); ?></td>
		                            			<td><?php echo number_format($tag_lost[4]); ?></td>
		                            			<td><?php echo number_format($tag_lost[5]); ?></td>
		                            			<td><?php echo number_format($tag_lost[6]); ?></td>
		                            			<td><?php echo number_format($tag_lost[7]); ?></td>
		                            			<td><?php echo number_format($tag_lost[8]); ?></td>
		                            			<td><?php echo number_format($tag_lost[9]); ?></td>
		                            			<td><?php echo number_format($tag_lost[10]); ?></td>
		                            			<td><?php echo number_format($tag_lost[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($tag_lost)); ?></td>
		                            		</tr>
		                            		<tr class="text-center">
		                            			<td class="text-left">Anjing Tidak Dibenarkan</td>
		                            			<td><?php echo number_format($not_allowed[0]); ?></td>
		                            			<td><?php echo number_format($not_allowed[1]); ?></td>
		                            			<td><?php echo number_format($not_allowed[2]); ?></td>
		                            			<td><?php echo number_format($not_allowed[3]); ?></td>
		                            			<td><?php echo number_format($not_allowed[4]); ?></td>
		                            			<td><?php echo number_format($not_allowed[5]); ?></td>
		                            			<td><?php echo number_format($not_allowed[6]); ?></td>
		                            			<td><?php echo number_format($not_allowed[7]); ?></td>
		                            			<td><?php echo number_format($not_allowed[8]); ?></td>
		                            			<td><?php echo number_format($not_allowed[9]); ?></td>
		                            			<td><?php echo number_format($not_allowed[10]); ?></td>
		                            			<td><?php echo number_format($not_allowed[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($not_allowed)); ?></td>
		                            		</tr>
		                            		<tr class="text-center">
		                            			<td class="text-left">Berpindah Ke Tempat Baru</td>
		                            			<td><?php echo number_format($new_place[0]); ?></td>
		                            			<td><?php echo number_format($new_place[1]); ?></td>
		                            			<td><?php echo number_format($new_place[2]); ?></td>
		                            			<td><?php echo number_format($new_place[3]); ?></td>
		                            			<td><?php echo number_format($new_place[4]); ?></td>
		                            			<td><?php echo number_format($new_place[5]); ?></td>
		                            			<td><?php echo number_format($new_place[6]); ?></td>
		                            			<td><?php echo number_format($new_place[7]); ?></td>
		                            			<td><?php echo number_format($new_place[8]); ?></td>
		                            			<td><?php echo number_format($new_place[9]); ?></td>
		                            			<td><?php echo number_format($new_place[10]); ?></td>
		                            			<td><?php echo number_format($new_place[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($new_place)); ?></td>
		                            		</tr>
		                            		<tr class="text-center">
		                            			<td class="text-left"><strong>JUMLAH</strong></td>
		                            			<td><?php echo number_format($alive[0] + $dead[0] + $tag_lost[0] + $lost[0] + $not_allowed[0] + $new_place[0]); ?></td>
		                            			<td><?php echo number_format($alive[1] + $dead[1] + $tag_lost[1] + $lost[1] + $not_allowed[1] + $new_place[1]); ?></td>
		                            			<td><?php echo number_format($alive[2] + $dead[2] + $tag_lost[2] + $lost[2] + $not_allowed[2] + $new_place[2]); ?></td>
		                            			<td><?php echo number_format($alive[3] + $dead[3] + $tag_lost[3] + $lost[3] + $not_allowed[3] + $new_place[3]); ?></td>
		                            			<td><?php echo number_format($alive[4] + $dead[4] + $tag_lost[4] + $lost[4] + $not_allowed[4] + $new_place[4]); ?></td>
		                            			<td><?php echo number_format($alive[5] + $dead[5] + $tag_lost[5] + $lost[5] + $not_allowed[5] + $new_place[5]); ?></td>
		                            			<td><?php echo number_format($alive[6] + $dead[6] + $tag_lost[6] + $lost[6] + $not_allowed[6] + $new_place[6]); ?></td>
		                            			<td><?php echo number_format($alive[7] + $dead[7] + $tag_lost[7] + $lost[7] + $not_allowed[7] + $new_place[7]); ?></td>
		                            			<td><?php echo number_format($alive[8] + $dead[8] + $tag_lost[8] + $lost[8] + $not_allowed[8] + $new_place[8]); ?></td>
		                            			<td><?php echo number_format($alive[9] + $dead[9] + $tag_lost[9] + $lost[9] + $not_allowed[9] + $new_place[9]); ?></td>
		                            			<td><?php echo number_format($alive[10] + $dead[10] + $tag_lost[10] + $lost[10] + $not_allowed[10] + $not_allowed[10]); ?></td>
		                            			<td><?php echo number_format($alive[11] + $dead[11] + $tag_lost[11] + $lost[11] + $not_allowed[11] + $not_allowed[11]); ?></td>
		                            			<td><?php echo number_format(array_sum($alive) + array_sum($dead) + array_sum($tag_lost) + array_sum($lost) + array_sum($new_place) + array_sum($not_allowed)); ?></td>
		                            		</tr>
		                            	</tbody>
		                            </table>
		                        </div>
		                    </div>
		                </div>
		            </div>
				</div>
				
				<div class="text-right"><a href="<?php echo base_url('admin'); ?>/index.php/report/print_report?<?php echo $_SERVER['QUERY_STRING']; ?>" class="btn btn-sm btn-info" target="_blank"><strong><i class="fa fa-file-excel-o"></i> Muat Turun Excel</strong></a></div>
			</div>
		</div>	
	</div>
</section>