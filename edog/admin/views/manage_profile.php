<!-- Page Title -->
			<section class="site-heading site-section-top">
				<div class="header-section dashboard">
					<div class="container">
						<h1>Profil</h1>
					</div>
				</div>
			</section>
			<!-- END Page Title -->
	
            <!-- Form Urus Profil -->
            <section class="site-section site-content-single">
                <div class="container">
                    <div class="row">
						<div class="col-sm-12">
							<!-- Default Tabs -->
							<ul class="nav nav-pills nav-justified" >
								<li class="active" data-toggle="tabs"><a href="#profile"><strong>1. Butiran Pengenalan Diri</strong></a></li>
							</ul>
							<div class="small-gap"></div>
							<div class="tab-content small-gap">
								<div class="tab-pane active" id="profile">
									<!-- User Details -->
									<form id="user-details" action="<?php echo base_url('admin');?>/index.php/manage_profile/save_profile" method="post" class="form-horizontal form-bordered">
										<div class="form-group">
											<label class="col-md-4 control-label" for="val_username">Nama Pemohon <span class="text-danger">*</span></label>
											<div class="col-md-6">
												<input type="text" id="val_name_view" name="val_name_view" class="form-control" value="<?php echo $this->session->userdata('name');?>" required>
												<input type="hidden" id="val_name" name="val_name" value="<?php echo $this->session->userdata('name');?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="val_resident">Kewarganegaraan <span class="text-danger">*</span></label>
											<div class="col-md-6">
												<?php
												$my = null;
												$ttp = null;
												$asg = null;
												$phone_no = null;
												
												if( count($PROFILE) > 0)
												{
													$phone_no = $PROFILE[0]->phone_no;
													if($PROFILE[0]->citizenship == 'Malaysia')
														$my = 'checked';
													elseif($PROFILE[0]->citizenship == 'Tetap')
														$ttp = 'checked';
													elseif($PROFILE[0]->citizenship == 'Asing')
														$asg = 'checked';
												}
												?>
												<label class="radio-inline" for="example-inline-radio1">
													<input type="radio" <?php echo $my; ?> id="val_resident_my1" name="val_resident_my" value="Malaysia"> Malaysia
												</label>
												<label class="radio-inline" for="example-inline-radio2">
													<input type="radio" <?php echo $ttp; ?> id="val_resident_my2" name="val_resident_my" value="Tetap"> Penduduk Tetap
												</label>
												<label class="radio-inline" for="example-inline-radio2">
													<input type="radio" <?php echo $asg; ?> id="val_resident_my2" name="val_resident_my" value="Asing"> Warga Asing
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="val_resident">Jenis Pengenalan <span class="text-danger">*</span></label>
											<div class="col-md-6">
												<?php 
												$ic = null;
												$army = null;
												$passport = null;
												
												if($this->session->userdata('id_type') == 'IC')
												{
													$ic = 'checked';
												}
												elseif($this->session->userdata('id_type') == 'ARMY')
												{
													$army = 'checked';
												}
												elseif($this->session->userdata('id_type') == 'PASSPORT')
												{
													$passport = 'checked';
												}
												?>
												<input type="hidden" name="val_type_id" value="<?php echo $this->session->userdata('id_type');?>" />
												<label class="radio-inline" for="example-inline-radio1">
													<input type="radio" <?php echo $ic;?> id="val_type_id1" name="val_type_ids" value="IC"> Kad Pengenalan
												</label>
												<label class="radio-inline" for="example-inline-radio2">
													<input type="radio"  <?php echo $army;?> id="val_type_id2" name="val_type_ids" value="ARMY"> No. Tentera/Polis
												</label>
												<label class="radio-inline" for="example-inline-radio2">
													<input type="radio"  <?php echo $passport;?> id="val_type_id2" name="val_type_ids" value="PASSPORT	"> No. Paspot
												</label>
											</div>
											<div class="col-sm-6 col-sm-offset-4">
												<input type="text"  id="val_id_view" name="val_id_view" class="form-control" value="<?php echo $this->session->userdata('nric');?>"/>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-4 control-label" for="masked_phone">No. Telefon Bimbit <span class="text-danger">*</span></label>
											<div class="col-md-6">
												<input type="text" id="masked_phone" name="masked_phone" class="form-control" placeholder="(999) 999-9999" value="<?php echo $phone_no; ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="val_email">Emel <span class="text-danger">*</span></label>
											<div class="col-md-6">
												<input type="hidden" name="val_email" value="<?php echo get_email_users($this->session->userdata('userid'));?>" />
												<input type="email"  id="val_email_view" name="val_email_view" class="form-control" value="<?php echo get_email_users($this->session->userdata('userid'));?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="val_email">Kata Laluan Baru (Sekiranya perlu)</label>
											<div class="col-md-6">
												<input type="hidden" name="val_email" value="<?php echo get_email_users($this->session->userdata('userid'));?>" />
												<input type="text"  id="val_pass" name="val_pass" class="form-control" value="" placeholder="Kata laluan baru">
											</div>
										</div>
										<div class="form-group form-actions">
											<div class="col-md-8 col-md-offset-4">
												<button type="reset" class="btn btn-square btn-sm btn-warning" id="add-dog" value="Padam"><i class="fa fa-repeat"></i> Padam</button>
												<button type="submit" class="btn btn-square btn-sm btn-primary" id="add-dog" value="Simpan"><i class="fa fa-save"></i> Simpan</button>
											</div>
										</div>
									</form>
								</div>
								
								<!-- Address Details -->
								
                                  </div>
                                    <!-- END Form Buttons -->
                                </form>
                                <!-- END Wizard with Validation Content -->
                            </div>
                            <!-- END Wizard with Validation Block -->
						</div>

						<div class="col-sm-12">
							
							
						</div>
                    </div>
                </div>
            </section>
            <!-- END Form Urus Profil -->
            
           
				
				
        
        <!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo base_url();?>js/pages/formsWizard.js"></script>
        <script>$(function(){ FormsWizard.init(); });</script>