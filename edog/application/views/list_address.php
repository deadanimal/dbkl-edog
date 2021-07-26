<!-- Page Title -->
			<section class="site-heading site-section-top">
				<div class="header-section dashboard">
					<div class="container">
						<h1>Permohonan Lesen</h1>
					</div>
				</div>
			</section>
			<!-- END Page Title -->
				
            <!-- Company Info -->
            <section class="site-section site-content-single">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10">
                        	<?php 
                        	foreach($PROFILE as $LIST)
                        	{
                        		$profileid = $LIST->profile_id;
                        	?>
                            <table class="table table-bordered table-striped">
                            	<tr>
                            		<td colspan="2" class="active"><strong>PROFIL PENGGUNA</strong></td>
                            	</tr>
                            	<tr>
                            		<td class="col-sm-2" align="right"><strong>Nama</strong></td>
                            		<td><?php echo $LIST->name ?></td>
                            	</tr>
                            	<tr>
                            		<td align="right"><strong>Jenis Pengenalan</strong></td>
                            		<td>
                            			<?php 
                            				if ($LIST->identity_type == "IC")
                            					echo 'No. Kad Pengenalan';
                            				elseif ($LIST->identity_type == "POLICE")
                            					echo 'No. Polis';
                            				elseif ($LIST->identity_type == "ARMY")
                            					echo 'No. Tentera';
                            				elseif ($LIST->identity_type == "PASSPORT")
                            					echo 'No. Pasport';
                            			?>
                            		</td>
                            	</tr>
                            	<tr>
                            		<td align="right"><strong>No Pengenalan</strong></td>
                            		<td><?php echo $LIST->nric ?></td>
                            	</tr>
                            	<tr>
                            		<td align="right"><strong>No Tel</strong></td>
                            		<td><?php echo $LIST->phone_no ?></td>
                            	</tr>
                            	<tr>
                            		<td align="right"><strong>Emel</strong></td>
                            		<td><?php echo $LIST->email ?></td>
                            	</tr>
                            </table>
                           <?php
                          }
                           ?>
                          <table class="table table-bordered table-striped">
                          	<tr>
                          		<td colspan="3" class="active"><strong>SENARAI ALAMAT</strong></td>
                          	</tr>
                          	<tr>
                          		<td class="col-sm-1" align="center"><strong>No</strong></td>	
                          		<td><strong>Alamat</strong></td>
                          		<td class="col-sm-2" align="center"><strong>Tindakan</strong></td>
                          	</tr>
                          	<?php 
                          		$ADDRESS = get_address_users($profileid);
                          		
                          		foreach($ADDRESS as $ROW)
                          		{
                          				echo "<tr>
                          								<td align=\"center\">1</td>
                          								<td></td>
                          								<td align=\"center\">[ Pilih ]</td>
                          							</tr>";
                          		}
                          	?>
                          </table>
                    </div>
                </div>
            </section>
            <!-- END Company Info -->
        

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-up"></i></a>