    <script type="text/javascript" src="<?php echo base_url("assets/js/vendor.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/app.js"); ?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            if(window.location.href.indexOf("/dashboard") > -1) {
                $("#sidebardashboard").addClass("active");
                $("#sidebarkaryawan").removeClass("active");
                $("#sidebarmasterdata").removeClass("active");
                $("#sidebarlaporan").removeClass("active");
                $("#sidebarusers").removeClass("active");
            }

            if(window.location.href.indexOf("/karyawan") > -1) {
                $("#sidebarkaryawan").addClass("active");
                $("#sidebardashboard").removeClass("active");
                $("#sidebarmasterdata").removeClass("active");
                $("#sidebarlaporan").removeClass("active");
                $("#sidebarusers").removeClass("active");
            }

            if(window.location.href.indexOf("/jabatan") > -1 || window.location.href.indexOf("/statuskaryawan") > -1 || window.location.href.indexOf("/statuskawin") > -1 || window.location.href.indexOf("/pendidikanterakhir") > -1 || window.location.href.indexOf("/agama") > -1) {
                $("#sidebarmasterdata").addClass("active");
                $("#sidebardashboard").removeClass("active");
                $("#sidebarkaryawan").removeClass("active");
                $("#sidebarlaporan").removeClass("active");
                $("#sidebarusers").removeClass("active");
            }
            
            if(window.location.href.indexOf("/users") > -1) {
                $("#sidebarusers").addClass("active");
                $("#sidebarkaryawan").removeClass("active");
                $("#sidebarmasterdata").removeClass("active");
                $("#sidebardashboard").removeClass("active");
                $("#sidebarlaporan").removeClass("active");
            }

            if(window.location.href.indexOf("/laporan") > -1) {
                $("#sidebarlaporan").addClass("active");
                $("#sidebarkaryawan").removeClass("active");
                $("#sidebarmasterdata").removeClass("active");
                $("#sidebardashboard").removeClass("active");
                $("#sidebarusers").removeClass("active");
            }
        });
    </script>