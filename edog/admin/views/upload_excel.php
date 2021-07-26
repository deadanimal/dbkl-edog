<!-- Page Title -->
<section class="site-heading site-section-top">
	<div class="header-section dashboard">
		<div class="container-fluid">
			<h1>Muat Naik Excel</h1>
		</div>
	</div>
</section>
<!-- END Page Title -->

<section class="site-section site-content-single">
    <div class="container-fluid">
        <div class="row">
			<div class="col-sm-4">
				<div class="block full bordered">
					<div class="block-title">
						<h2><strong>Muat Naik Data Permohonan</strong></h2>
					</div>
					<form action="<?php echo base_url('admin'); ?>/index.php/report/process_data" id="upload-form" method="post"  enctype="multipart/form-data" class="form-horizontal form-bordered">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
	                            <label class="col-md-3 control-label left" for="kata-kunci">Bulan</label>
	                            <div class="col-md-9">
	                            	<select name="bulan" id="bulan" class="form-control">
	                            		<option value="01">Januari</option>
	                            		<option value="02">Februari</option>
	                            		<option value="03">Mac</option>
	                            		<option value="04">April</option>
	                            		<option value="05">Mei</option>
	                            		<option value="06">Jun</option>
	                            		<option value="07">Julai</option>
	                            		<option value="08">Ogos</option>
	                            		<option value="09">September</option>
	                            		<option value="10">Oktober</option>
	                            		<option value="11">November</option>
	                            		<option value="12">Disember</option>
	                            	</select>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-3 control-label left" for="kata-kunci">Tahun</label>
	                            <div class="col-md-9">
	                            	<?php 
	                            		$already_selected_value = 2017;
										$earliest_year = 2000;

										print '<select name="tahun" id="tahun" class="form-control">';
										foreach (range(date('Y'), $earliest_year) as $x) {
										    print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
										}
										print '</select>';
	                            	?>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-3 control-label left" for="files">Fail Excel</label>
	                            <div class="col-md-9">
	                                <input type="file" name="files" id="files" class="form-control">
	                            </div>
	                        </div>
	                        <div class="form-group form-actions">
								<div class="col-md-9 col-md-offset-3">
									<button type="button" class="btn btn-sm btn-primary btn-upload"><i class="fa fa-arrow-right"></i> Muat Naik</button>
								</div>
								 <!--<input type="submit" name="">-->
							</div>
	                    </div>
	                    <!-- <input type="submit" name=""> -->
	                </div>
	            </form>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="block full bordered">
					<div class="block-title">
						<h2><strong>Makluman</strong></h2>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
		                        <p>
		                        	1. Pilih bulan dan tahun sebelum memuat naik fail.<br>
		                        	2. Pemilihan bulan dan tahun ini bagi menentukan running number.<br>
		                        	Cth : Jika memilih bulan 3 dan tahun 2016, no permohonan akan bermula dengan <strong>LX1603</strong>xxxxxx<br>
		                        	3. Muat turun format excel <a href="/edog/admin/FORMAT.xlsx"><strong>DISINI</strong></a>
		                        </p>
		                    </div>
		                </div>
		            </div>
				</div>
			</div>

		</div>
	</div>
</section>
