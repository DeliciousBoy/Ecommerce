
<?php require_once('admin.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("admin_header.php"); ?>
</head>

<body id="page-top">
    
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once("admin_sidebar.php")?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once("admin_topbar_dashboard.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"></h1>
                    
                        <div class="container-fluid pt-5">
                            <h2 class="text-center mb-4"><span class="px-2">Add products</span></h2>
                            <form name="product" id="product" novalidate="novalidate" action="insertPro.php" enctype="multipart/form-data" method="post">
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" required oninvalid="setCustomValidity('Please enter your first name')" oninput="setCustomValidity('')" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control" id="details" name="pDetails" placeholder="Product details" required oninvalid="setCustomValidity('Please enter your last name')" oninput="setCustomValidity('')" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Price of product" required oninvalid="setCustomValidity('Please enter your username name')" oninput="setCustomValidity('')" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="file" class="form-control" id="picture" name="picture" placeholder="picture" required oninvalid="setCustomValidity('Please enter your password')" oninput="setCustomValidity('')" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="mb-3">
                                    <select class="form-control" name="category" id="category">
                                        <option value="">-- Choose product types--</option>
                                        <?php include_once('admin_product_test.php'); ?>
                                    </select>
                                    </div>
                                    <div class="mb-3" align='center'>
                                        <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">SAVE</button>
                                    </div>
                            </div>
                            </div>
                            </form>
                        </div>
                    <!-- Content Row -->
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary"  type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>