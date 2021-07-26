        <!-- Page Title -->
        <section class="site-heading site-section-top">
            <div class="header-section dashboard">
                <div class="container-fluid">
                    <h1>Pengurusan Laporan</h1>
                </div>
            </div>
        </section>
        <!-- END Page Title -->

        <!-- Content -->
        <section class="site-section site-content-single">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="block full bordered">
                            <div class="block-title">
                                <h2><strong>Jana Laporan Permohonan</strong></h2>
                            </div>

                            <form action="<?php echo base_url('admin'); ?>/index.php/report" id="report-form" method="get" class="form-horizontal form-bordered">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label left" for="kata-kunci">Kata Kunci</label>
                                            <div class="col-md-9">
                                                <input type="text" id="kata-kunci" name="kata-kunci" value="<?php echo $this->input->get('kata-kunci'); ?>" class="form-control" placeholder="Masukkan kata kunci">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label left" for="status-permohonan">Status Permohonan</label>
                                            <div class="col-md-9">
                                                <select name="status-permohonan" id="status-permohonan" class="form-control">
                                                    <option value="">- Pilih status permohonan -</option>
                                                    <option value="Batal" <?php if ($this->input->get('status-permohonan') == 'Batal') echo 'selected'; ?>>Batal</option>
                                                    <option value="Lulus" <?php if ($this->input->get('status-permohonan') == 'Lulus') echo 'selected'; ?>>Lulus</option>
                                                    <option value="Ditolak" <?php if ($this->input->get('status-permohonan') == 'Ditolak') echo 'selected'; ?>>Ditolak</option>
                                                    <option value="Diterima" <?php if ($this->input->get('status-permohonan') == 'Diterima') echo 'selected'; ?>>Diterima</option>
                                                    <option value="Dalam Proses" <?php if ($this->input->get('status-permohonan') == 'Dalam Proses') echo 'selected'; ?>>Dalam Proses</option>
                                                    <option value="Rayuan Dalam Proses" <?php if ($this->input->get('status-permohonan') == 'Rayuan Dalam Proses') echo 'selected'; ?>>Rayuan Dalam Proses</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label left" for="house-type">Jenis Rumah</label>
                                            <div class="col-md-9">
                                                <select name="house-type" id="house-type" class="form-control">
                                                    <option value="0">- Pilih jenis rumah -</option>
                                                    <?php
                                                    foreach ($house_type as $row) {
                                                        if ($row->hid == $this->input->get('house-type'))
                                                            echo "<option value=\"" . $row->hid . "\" selected>" . $row->name . "</option>";
                                                        else
                                                            echo "<option value=\"" . $row->hid . "\">" . $row->name . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label left" for="house-space">Keluasan Rumah</label>
                                            <div class="col-md-9">
                                                <select name="house-space" id="house-space" class="form-control">
                                                    <option value="0">- Pilih jenis keluasan rumah -</option>
                                                    <?php
                                                    foreach ($house_space as $row) {
                                                        if ($row->hsid == $this->input->get('house-space'))
                                                            echo "<option value=\"" . $row->hsid . "\" selected>" . $row->name . "</option>";
                                                        else
                                                            echo "<option value=\"" . $row->hsid . "\">" . $row->name . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label left" for="parlimen">Parlimen</label>
                                            <div class="col-md-9">
                                                <select name="parlimen" id="parlimen" class="form-control">
                                                    <option value="0">- Pilih parlimen -</option>
                                                    <?php
                                                    foreach ($parlimen as $row) {
                                                        if ($row->par_id == $this->input->get('parlimen'))
                                                            echo "<option value=\"" . $row->par_id . "\" selected>" . $row->par_name . "</option>";
                                                        else
                                                            echo "<option value=\"" . $row->par_id . "\">" . $row->par_name . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label left" for="kembiri">Kembiri</label>
                                            <div class="col-md-9">
                                                <select name="kembiri" id="kembiri" class="form-control">
                                                    <option value="">- Pilih kembiri -</option>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label left" for="jenis-laporan">Jenis Laporan</label>
                                            <div class="col-md-9">
                                                <?php
                                                if ($this->input->get('date-type') == 'Semua') {
                                                    $semua = 'checked';
                                                    $view = 'Semua Permohonan';
                                                } elseif ($this->input->get('date-type') == 'Permohonan') {
                                                    $permohonan = 'checked';
                                                    $view = 'Permohonan Baru';
                                                } elseif ($this->input->get('date-type') == 'Kelulusan') {
                                                    $Kelulusan = 'checked';
                                                    $view = 'Kelulusan';
                                                } elseif ($this->input->get('date-type') == 'Sedia') {
                                                    $Sedia = 'checked';
                                                    $view = 'Lesen Sedia Ada';
                                                } elseif ($this->input->get('date-type') == 'Pembaharuan') {
                                                    $Pembaharuan = 'checked';
                                                    $view = 'Tidak Perbaharui Lesen';
                                                } else {
                                                    $semua = 'checked';
                                                    $view = 'Semua Permohonan';
                                                }
                                                ?>
                                                <input type="radio" name="date-type" <?php echo $semua; ?> value="Semua" /> Semua Permohonan <br>
                                                <input type="radio" name="date-type" <?php echo $permohonan; ?> value="Permohonan" /> Permohonan Baru (Dalam Proses / Rayuan Dalam Proses) <br>
                                                <input type="radio" name="date-type" <?php echo $Kelulusan; ?> value="Kelulusan" /> Kelulusan (Diterima) <br>
                                                <input type="radio" name="date-type" <?php echo $Sedia; ?> value="Sedia" /> Lesen Sedia Ada (Lulus / Ditolak) <br>
                                                <input type="radio" name="date-type" <?php echo $Pembaharuan; ?> value="Pembaharuan"> Tidak Perbaharui Lesen
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label left" for="no-lencana">Tarikh</label>
                                            <div class="col-md-9">
                                                <div class="form-inline">
                                                    Dari <input type="text" id="date-from" name="date-from" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" value="<?php echo $this->input->get('date-from'); ?>" placeholder="dd/mm/yyyy"> Hingga <input type="text" id="date-tos" name="date-tos" value="<?php echo $this->input->get('date-tos'); ?>" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label left" for="no-lencana">No. Lencana</label>
                                            <div class="col-md-9">
                                                <input type="text" id="no-lencana" name="no-lencana" value="<?php echo $this->input->get('no-lencana'); ?>" class="form-control" placeholder="Masukkan no lencana">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label left" for="no-siri-microchip">No. Siri Mikrocip</label>
                                            <div class="col-md-7">
                                                <input type="text" id="no-siri-microchip" name="no-siri-microchip" value="<?php echo $this->input->get('no-siri-microchip'); ?>" class="form-control" placeholder="Masukkan no siri microchip">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label left" for="dog-type">Jenis Anjing</label>
                                            <div class="col-md-9">
                                                <select name="dog-type" id="dog-type" class="form-control">
                                                    <option value="0">- Pilih jenis anjing -</option>
                                                    <?php
                                                    foreach ($dog as $row) {
                                                        if ($row->ddid == $this->input->get('dog-type'))
                                                            echo "<option value=\"" . $row->ddid . "\" selected>" . $row->detail . "</option>";
                                                        else
                                                            echo "<option value=\"" . $row->ddid . "\">" . $row->detail . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label left" for="no-receipt">No. Resit</label>
                                            <div class="col-md-9">
                                                <input type="text" id="no-receipt" name="no-receipt" value="<?php echo $this->input->get('no-receipt'); ?>" class="form-control" placeholder="Masukkan no resit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-actions">
                                            <div class="col-md-12 text-right">
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Padam</button>
                                                <button type="button" class="btn btn-sm btn-primary generate-report"><i class="fa fa-file"></i> Jana Laporan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="block bordered">
                            <div class="block-title">
                                <h2><strong>Paparan Laporan | Jenis Laporan : <?php echo $view; ?></strong></h2>
                            </div>
                            <div id="_review">
                                <script type='text/javascript' src="<?php echo base_url(); ?>js/html2canvas.js"></script>
                                <script type='text/javascript' src="<?php echo base_url(); ?>js/jspdf.min.js"></script>
                                <link rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.tableTools.css">
                                <script src="<?php echo base_url(); ?>js/pages/dataTables.tableTools.js"></script>
                                <script src="<?php echo base_url(); ?>js/pages/tablesDatatables.js"></script>
                                <script>
                                    $(function() {
                                        TablesDatatables.init();
                                    });
                                </script>
                                <script>
                                    $(function() {


                                        $("#app-list").click(function() {
                                            $("#list-report").css("display", "block");
                                            $("#graph").css("display", "none");
                                        });

                                        $("#report-chart").click(function() {
                                            $("#list-report").css("display", "none");
                                            $("#graph").css("display", "block");
                                        });

                                        $("#pdf").on("click", function(e) {
                                            e.preventDefault();
                                            $("#pdf").remove();
                                            html2canvas($("#graph").get(0), {
                                                onrendered: function(canvas) {
                                                    //document.body.appendChild(canvas);

                                                    var imgData = canvas.toDataURL('image/png');
                                                    console.log('Report Image URL: ' + imgData);
                                                    var doc = new jsPDF('landscape');

                                                    doc.addImage(imgData, 'PNG', 10, 10, 260, 110);
                                                    doc.save('report.pdf');
                                                }
                                            });

                                            //location.reload();
                                        });

                                        // $('#datatables-baru').dataTable({
                                        //     // "deferRender": true,
                                        //     // "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1, 4 ] } ],
                                        //     // "oLanguage": {
                                        //     //                                           "sEmptyTable": "Tiada rekod dijumpai",
                                        //     //                                           "sInfoEmpty": "Tiada data dipaparkan",
                                        //     //                                           "sInfoFiltered": "( tapisan dari _MAX_ jumlah data )",
                                        //     //                                           "sZeroRecords": "Tiada rekod dijumpai"
                                        //     //                                         },
                                        //     // "iDisplayLength": 30,
                                        //     // "aLengthMenu": [[30, 60, 90, -1], [30, 60, 90, "Semua"]],
                                        //     //"dom": 'T<"clear">lfrtip',
                                        //     "tableTools":{
                                        //         "sSwfPath": "/swf/copy_csv_xls_pdf.swf"
                                        //     }
                                        // });
                                    });
                                </script>

                                <small><strong><a style="cursor:pointer" id="app-list">Senarai / Hasil Carian</a> | <a style="cursor:pointer" id="report-chart">Statistik</a>
                                        <!-- | <a href="/admin/index.php/report/prints?<?php echo $query; ?>" target="_blank">Cetak</a></strong> --><br><br>
                                        <div id="list-report" style="display:block">
                                            <table id="datatables-baru" class="table table-vcenter table-striped table-condensed table-bordered">
                                                <thead>
                                                    <tr class="warning">
                                                        <td class="text-center"><strong>Bil.</strong></td>
                                                        <td class="text-center"><strong>No. Permohonan</strong></td>
                                                        <td class="text-center"><strong>Tarikh</strong></td>
                                                        <td><strong>Nama Pemohon</strong></td>
                                                        <td class="text-center"><strong>Status</strong></td>
                                                        <td class="text-center"><strong>Jenis Rumah</strong></td>
                                                        <td class="text-center"><strong>Parlimen</strong></td>
                                                        <td class="text-center"><strong>Jenis Anjing</strong></td>
                                                        <td class="text-center"><strong>No Lencana</strong></td>
                                                        <?php if($status_batal == 1 ){ ?>
                                                            <td class="text-center"><strong>Catatan</strong></td>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $batal = 0;
                                                    $lulus = 0;
                                                    $tolak = 0;
                                                    $terima = 0;
                                                    $dalam_proses = 0;
                                                    $rayuan_proses = 0;
                                                    if (count($get_all) > 0) {
                                                        foreach ($get_all as $row) {
                                                            $home_type = get_home_type($row->home_type);
                                                            $dog_detail = get_dog_detail($row->app_id);

                                                            $view_dog = null;
                                                            $view_lic = null;
                                                            $old_lic = null;

                                                            foreach ($dog_detail as $rows) {
                                                                $view_dog .= get_dog_name($rows->dog_type);
                                                                if (count($dog_detail) >= 2)
                                                                    $view_dog .= "<br>";

                                                                $dog_license = get_dog_license($rows->dog_id);
                                                                foreach ($dog_license as $rowss) {
                                                                    if ($old_lic != $rowss->license_no) {
                                                                        //DOG FIRST
                                                                        if (strlen($rowss->license_no) == 1)
                                                                            $view_lic .= '0000' . $rowss->license_no;
                                                                        elseif (strlen($rowss->license_no) == 2)
                                                                            $view_lic .= '000' . $rowss->license_no;
                                                                        elseif (strlen($rowss->license_no) == 3)
                                                                            $view_lic .= '00' . $rowss->license_no;
                                                                        elseif (strlen($rowss->license_no) == 4)
                                                                            $view_lic .= '0' . $rowss->license_no;
                                                                        elseif (strlen($rowss->license_no) == 5)
                                                                            $view_lic .= $rowss->license_no;

                                                                        //$view_lic .= $rowss->license_no;
                                                                        if (count($dog_detail) >= 2)
                                                                            $view_lic .= "<br>";
                                                                    }

                                                                    $old_lic = $rowss->license_no;
                                                                }
                                                            }

                                                            echo "<tr>
                                                                                <td class=\"text-center\" width=\"3px\">" . $no . "</td>
                                                                                <td class=\"col-lg-1 text-center\"><a href=\"" . base_url('admin') . "/index.php/view_app/index/" . $row->app_id . "\" target=\"_blank\"><strong>" . $row->app_no . "</strong></a></td>
                                                                                <td class=\"col-lg-2 text-center\">" . date('d/m/Y h:i A', strtotime($row->date_apply)) . "</td>
                                                                                <td class=\"col-lg-2\">" . $row->name . "</td>";
                                                            if ($row->appStatus == "Ditolak")
                                                                echo "<td class=\"text-center\"><button class=\"btn btn-danger btn-xs\" disabled>" . $row->appStatus . "</td>";
                                                            elseif ($row->appStatus == "Dalam proses" && $row->appeal == 1)
                                                                echo "<td class=\"text-center\"><button class=\"btn btn-success btn-xs\" disabled>Rayuan Dalam Proses</td>";
                                                                
                                                            elseif ($row->appStatus == "Batal")
                                                                echo "<td class=\"text-center\"><button class=\"btn btn-danger btn-xs\" disabled>Batal</td>";
                                                            else
                                                                echo "<td class=\"text-center\"><button class=\"btn btn-success btn-xs\" disabled>" . $row->appStatus . "</td>";
                                                            echo "<td class=\"text-center\">" . $home_type[0]->name . "</td>
                                                                                <td class=\"text-center\">" . get_parlimen_name($row->parlimen) . "</td>
                                                                                <td>" . $view_dog . "</td>
                                                                                <td class=\"text-center\">" . $view_lic . "</td>";
                                                            if($status_batal == 1 ){
                                                                                echo "<td class=\"text-center\">" . $row->catatan . "</td>";
                                                            }
                                                                            echo "</tr>";
                                                            $no++;
                                                        }
                                                    } else {
                                                        echo "<tr>
                                                                          <td colspan=\"9\">Tiada rekod dijumpai</td>
                                                                        </tr>";
                                                    }

                                                    foreach ($all as $rw) {
                                                        if ($rw->appStatus == "Batal")
                                                            $batal = $batal + 1;
                                                        elseif ($rw->appStatus == "Lulus")
                                                            $lulus = $lulus + 1;
                                                        elseif ($rw->appStatus == "Ditolak")
                                                            $tolak = $tolak + 1;
                                                        elseif ($rw->appStatus == "Diterima")
                                                            $terima = $terima + 1;
                                                        elseif ($rw->appStatus == "Dalam Proses" && $rw->appeal == 0)
                                                            $dalam_proses = $dalam_proses + 1;
                                                        elseif ($rw->appStatus == "Dalam proses" && $rw->appeal == 1)
                                                            $rayuan_proses = $rayuan_proses + 1;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <div>
                                                <ul class="pagination">
                                                    <?php echo $links; ?>
                                                </ul>
                                            </div>
                                            <div class="text-left">
                                                <h4>Jumlah Permohonan : <strong><?php echo number_format($total_rows); ?></strong></h4>
                                            </div>
                                        </div>
                                </small>
                                <!--  <input type="hidden" name="data-graph"  id="data-graph" value=<?php $lulus . "|" . $tolak . "|" . $terima . "|" . $dalam_proses . "|" . $rayuan_proses ?>> -->
                                <script type="text/javascript">
                                    $(function() {
                                        var opt = $('#data-graph').val();
                                        //var vl = opt.split('|');

                                        $.plot('#plot-chart', [{
                                                label: 'Batal',
                                                data: <?php echo $batal; ?>
                                            },
                                            {
                                                label: 'Lulus',
                                                data: <?php echo $lulus; ?>
                                            },
                                            {
                                                label: 'Ditolak',
                                                data: <?php echo $tolak; ?>
                                            },
                                            {
                                                label: 'Diterima',
                                                data: <?php echo $terima; ?>
                                            },
                                            {
                                                label: 'Dalam Proses',
                                                data: <?php echo $dalam_proses; ?>
                                            },
                                            {
                                                label: 'Rayuan Dalam Proses',
                                                data: <?php echo $rayuan_proses; ?>
                                            }
                                        ], {
                                            series: {
                                                pie: {
                                                    show: true,
                                                    radius: 3 / 4
                                                }
                                            },
                                            legend: {
                                                show: true
                                            }
                                        });
                                    });
                                </script>
                                <div id="graph" style="display:none; height:500px">
                                    <h4>Jumlah Permohonan
                                        <?php
                                        if ($this->input->post('date-from')) {
                                            echo DateTime::createFromFormat('d/m/Y', $this->input->post('date-from'))->format('j F Y') . " Sehingga " . DateTime::createFromFormat('d/m/Y', $this->input->post('date-tos'))->format('j F Y');
                                        } else {
                                            echo "Sehingga " . date('j F Y');
                                        }
                                        ?>

                                    </h4>
                                    <hr>
                                    <div class="col-sm-6">
                                        <div class="block full">
                                            <div id="plot-chart" style="width:500px;height:400px"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6" id="table-report">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="warning">
                                                    <td colspan="3"><strong>Rumusan</strong></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="col-sm-4">Jumlah Permohonan</td>
                                                    <td class="col-sm-1 text-center">:</td>
                                                    <td><?php echo number_format($total_rows); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-sm-4">Lulus</td>
                                                    <td class="col-sm-1 text-center">:</td>
                                                    <td><?php echo number_format($lulus) ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-sm-4">Batal</td>
                                                    <td class="col-sm-1 text-center">:</td>
                                                    <td><?php echo number_format($batal) ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-sm-4">Ditolak</td>
                                                    <td class="col-sm-1 text-center">:</td>
                                                    <td><?php echo number_format($tolak) ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-sm-4\">Diterima</td>
                                                    <td class="col-sm-1 text-center">:</td>
                                                    <td><?php echo number_format($terima) ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-sm-4\">Dalam Proses</td>
                                                    <td class="col-sm-1 text-center">:</td>
                                                    <td><?php echo number_format($dalam_proses) ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-sm-4\">Rayuan Dalam Proses</td>
                                                    <td class="col-sm-1 text-center">:</td>
                                                    <td><?php echo number_format($rayuan_proses) ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-primary" id="pdf" target="_blank" class="text-right"><i class="fa fa-pdf"></i> Download to PDF</button>
                                    <br><br><br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END Company Info -->