<?php $this->load->view('template_data/head'); ?>

<body>
    <div class="app app-default">
        <?php $this->load->view('template_data/sidebar'); ?>
        <div class="app-container">
            <?php $this->load->view('template_data/navbar'); ?>

            <div class='row'>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Data Karyawan
                        </div>
                        <div class="card-body no-padding table-responsive">
                           <?php
                                $template = array('table_open' => '<table class="table datatable card-table" cellspacing="0" width="100%">');
                                $this->table->set_template($template);

                                $this->table->set_heading('No','Kode', 'Nama', 'Jabatan', 'Status',  'Aksi');
                                $no = 1;
                                foreach($query as $row){
                                    $aksi = "
                                    <a class='btn btn-primary' href='".site_url('karyawan/edit/'.$row->id)."'>Edit</a>
                                    <a class='btn btn-danger' href='".site_url('karyawan/delete/'.$row->id)."'>Delete</a>";
                                    $this->table->add_row($no, $row->kode, $row->nama, $row->nmjabatan, $row->nmstatus, $aksi);
                                    ++$no;
                                }
                                echo $this->table->generate();
                            ?>  
                        </div>
                    </div>
                </div>
            </div>

            <a href="<?php echo site_url("karyawan/add"); ?>">
                <div class="btn-floating" id="help-actions">
                <div class="btn-bg"></div>
                <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
                    <i class="icon fa fa-plus"></i>
                    <span class="help-text">Shortcut</span>
                </button>
                </div>
            </a>

            <?php $this->load->view('template_data/footer'); ?>
        </div>
    </div>

    <?php $this->load->view('template_data/libs'); ?>
</body>
</html>