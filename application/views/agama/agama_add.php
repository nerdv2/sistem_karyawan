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
                            Tambah Agama
                        </div>
                        <div class="card-body">
                            <form action="#" method="post" class="form form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Agama</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" class="btn btn-success" value="Submit" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php $this->load->view('template_data/footer'); ?>
        </div>
    </div>

    <?php $this->load->view('template_data/libs'); ?>
</body>
</html>