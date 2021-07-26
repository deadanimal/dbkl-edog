<h3><small><u><strong>PERMOHONAN LESEN ANJING</strong></u></small></h3>
<div class="application-form">
	<table class="table table-bordered table-striped">
			<tr class="warning">
				<td colspan="3"><i><strong>BAHAGIAN A - Butir-butir Pemohon</strong></i></td>
			</tr>
			<tr>
				<td width="20%">Nama Pemohon</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-6">
						<strong>HAFIDZUL AMIN BIN ZULKIFLI</strong>
					</div>
				</td>
			</tr>
			<tr>
				<td width="15%">No K/P</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-6">
						<strong><?php echo $this->session->userdata('nric'); ?></strong>
					</div>
				</td>
			</tr>
			<tr>
				<td width="15%">Alamat</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-15">
						<div class="col-xs-3">
							<input type="text" name="no-unit" id="no-unit" class="form-control input-sm" placeholder="No Unit" />
						</div><br></br>
						<div class="col-xs-8">
							<input type="text" name="lot" id="lot" class="form-control input-sm" placeholder="Taman / Appt / PPR / Kondo / Kg" />
						</div><br></br>
						<div class="col-xs-10">
							<input type="text" name="street" id="street" class="form-control input-sm" placeholder="Jalan / Lorong" />
						</div><br></br>
						<div class="col-xs-5">
							<input type="text" name="district" id="district" class="form-control input-sm" placeholder="Daerah" />
						</div><br></br>
						<div class="col-xs-4">
							<input type="text" name="postcode" id="postcode" class="form-control input-sm" placeholder="Poskod" />
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td width="15%">No. Tel</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-6">
						<input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Masukkan no telefon"/>
					</div>
				</td>
			</tr>
			<tr>
				<td width="15%">E-mel</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-10">
						<input type="text" name="email" id="email" class="form-control input-sm" placeholder="Masukkan e-mel"/>
					</div>
				</td>
			</tr>
	</table>
	<table class="table table-bordered table-striped">
			<tr class="warning">
				<td colspan="3"><i><strong>BAHAGIAN B - Butir-butir Mengenai Tempat Pemeliharaan</strong></i></td>
			</tr>
			<tr>
				<td width="20%">Jenis Rumah</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-9">
						<input type="radio" name="housetype" id="banglow" value="Banglow"/> Banglow
						&nbsp;<input type="radio" name="housetype" id="semid" value="Semi-Detach"/> Semi-Detach
						&nbsp;<input type="radio" name="housetype" id="teres" value="Teres"/> Teres/Link
						&nbsp;<input type="radio" name="housetype" id="kilang" value="Kilang"/> Kilang<br>
						<input type="radio" name="housetype" id="townhouse" value="Townhouse"/> Town-House
						&nbsp;<input type="radio" name="housetype" id="kondo" value="Kondo"/> Kondo
						&nbsp;<input type="radio" name="housetype" id="flat" value="Pangsa"/> Rumah Pangsa
						&nbsp;<input type="radio" name="housetype" id="apartment" value="Apartment"/> Apartment
					</div>
				</td>
			</tr>
			<tr>
				<td width="15%">Keluasan Rumah</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-9">
						<input type="radio" name="home-area" id="home-area1" value="100"/> 100m&sup2;
						&nbsp;<input type="radio" name="home-area" id="home-area1" value="200"/> 200m&sup2;
						&nbsp;<input type="radio" name="home-area" id="home-area1" value="300"/> 300m&sup2;
						&nbsp;<input type="radio" name="home-area" id="home-area2" value=">300"/> > 300m&sup2;
					</div>
				</td>
			</tr>
			<tr>
				<td width="15%">Rumah Anjing</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-6">
						<input type="radio" name="dog-house" id="dog-house" value="1"/> Ya
						&nbsp;<input type="radio" name="dog-house" id="dog-house" value="0"/> Tidak
					</div>
				</td>
			</tr>
	</table>
	<table class="table table-bordered table-striped" id="dog-detail">
			<tr class="warning">
				<td colspan="3">
					<i><strong>BAHAGIAN C - Butir-butir Anjing</strong></i>
					<span class="addDog" style="display:none">[ <strong><a href="#" id="addDog">+</a></strong> ]</span>
				</td>
			</tr>
			<tbody class="multi">
			<tr>
				<td colspan="3" class="info"><strong>Anjing 1</strong></td>
			</tr>
			<tr>
				<td width="20%">Jenis Anjing</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-9">
						<input type="radio" name="dog-type[]" id="dog-type-biasa" value="Biasa"/> Biasa
						&nbsp;<input type="radio" name="dog-type[]" id="dog-type-terkawal" value="Terkawal"/> Terkawal
						&nbsp;<input type="radio" name="dog-type[]" id="dog-type-kecil" value="Kecil"/> Kecil
					</div>
				</td>
			</tr>
			<tr>
				<td width="15%">Warna</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-9">
							<input type="text" name="dog-color[]" id="dog-color" class="form-control input-sm" placeholder="Masukkan warna anjing"/>
					</div>
				</td>
			</tr>
			<tr>
				<td width="15%">Muat Naik Gambar</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-6">
						<input type="file" name="dog-photo[]" id="dog-photo"/>
					</div>
				</td>
			</tr>
			<tr>
				<td width="15%">Jantina</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-6">
						<input type="radio" name="dog-gender[]" id="dog-gender" value="Jantan"/> Jantan
						&nbsp;<input type="radio" name="dog-gender[]" id="dog-gender" value="Betina"/> Betina
					</div>
				</td>
			</tr>
			<tr>
				<td width="15%">Berat</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-6">
						<input type="radio" name="dog-weight[]" id="dog-weight" value="<10"/> < 10kg
						&nbsp;<input type="radio" name="dog-weight[]" id="dog-weight" value=">10"/> > 10kg
					</div>
				</td>
			</tr>
			<tr>
				<td width="15%">Pemandulan / Kembiri</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-6">
						<input type="radio" name="dog-kembiri[]" id="dog-kembiri" value="1"/> Ya
						&nbsp;<input type="radio" name="dog-kembiri[]" id="dog-kembiri" value="0"/> Tidak
					</div>
				</td>
			</tr>
			<tr>
				<td width="15%">No. Siri Mikrocip</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-6">
							<input type="text" name="microcip[]" id="microcip" class="form-control input-sm" placeholder="Masukkan no siri mikrocip" />
					</div>
				</td>
			</tr>
			</tbody>
	</table>
	<table class="table table-bordered table-striped">
			<tr class="warning">
				<td colspan="3"><i><strong>BAHAGIAN D - Muat Naik Dokumen Sokongan</strong></i></td>
			</tr>
			<tr>
				<td width="20%">Dokumen</td>
				<td width="2%">:</td>
				<td>
					<div class="col-xs-6">
						<input type="file" name="doc-support[]" id="doc-support" multiple />
					</div>
				</td>
			</tr>
	</table>
	<table class="table table-bordered table-striped">
			<tr class="warning">
				<td><i><strong>BAHAGIAN E - Persetujuan</strong></i></td>
			</tr>
			<tr>
				<td width="20%">
					<input type="checkbox" name="agree" id="agree"> Saya bersetuju mematuhi semua peruntukan di bawah Undang-Undang Kecil Perlesenan Anjing dan Rumah Pembiakan Anjing (WPKL)(Pindaan)2001.	
				</td>
			</tr>
	</table>
	<button type="button" class="btn btn-primary btn-sm"> Hantar</button>
	<button type="button" class="btn btn-primary btn-sm"> Reset</button>
</div>
