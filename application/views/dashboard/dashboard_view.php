<?php $this->load->view('template_data/head'); ?>

<body>
    <div class="app app-default">
        <?php $this->load->view('template_data/sidebar'); ?>
        <div class="app-container">
            <?php $this->load->view('template_data/navbar'); ?>



            <?php $this->load->view('template_data/footer'); ?>
        </div>
    </div>

    <?php $this->load->view('template_data/libs'); ?>
</body>
</html>