</section>
                <footer class="main-footer">
                    <p>&copy; 2017 - <?php echo date("Y"); ?></p><div class="admin-login"><a href="reports.php" style="text-decoration:none;"><label><i class="fa fa-cog"></i>&nbsp; Admin Privillage</label></a></div>
                </footer>
                </div>
            </div>
        </main>
        <script type="text/javascript" src ="<?php echo base_url();?>./dist/js/inventory_script.js"></script>
         <!--  Chart js -->
         <script src="<?php echo base_url();?>./dist/assets/js/vendor/jquery-2.1.4.min.js"></script>
        <script src="<?php echo base_url();?>./dist/assets/js/popper.min.js"></script>
        <script src="<?php echo base_url();?>./dist/assets/js/plugins.js"></script>
        <script src="<?php echo base_url();?>./dist/assets/js/main.js"></script>
        <script src="<?php echo base_url();?>./dist/assets/js/lib/chart-js/Chart.bundle.js"></script>
        <script src="<?php echo base_url();?>./dist/assets/js/lib/chart-js/chartjs-init.js"></script>
        <!-- jQuery -->
        <script src="<?php echo base_url();?>./dist/plugins/jquery/jquery.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url();?>./dist/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url();?>./dist/plugins/datatables/dataTables.bootstrap4.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script>
        $(function () {
            $("#example1").DataTable();
            $("#example2").DataTable();
            $("#example3").DataTable();
            $("#example4").DataTable();
            $("#example5").DataTable();
            $("#example6").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
            });
        });
        </script>
    </body>
</html>