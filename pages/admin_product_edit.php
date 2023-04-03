<?php 
    require_once('admin_edit_product.php');
    require_once('admin.php'); 
    
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php include_once("admin_header.php"); ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once("admin_sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once("admin_topbar_dashboard.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Customer</h1> -->
                    <!-- <p class="mb-4">Database of Guide</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit product infomation </h6>
                        </div>
                        <div class="card-body">
                            <div class="container">
                            <h3 class="mt-5">แก้ไขข้อมูลสินค้า</h3>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="pname" class="form-label">Product name:</label>
                                    <input type="text" class="form-control" id="pname" name="pname" value=<?php echo $pname; ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="pDetails" class="form-label">Details:</label>
                                    <input type="text" class="form-control" id="pDetails" name="pDetails" value=<?php echo $pdetail; ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="pPrice" class="form-label">Price:</label>
                                    <input type="int" class="form-control" id="pPrice" name="pPrice" value=<?php echo $price ?>>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="pImage" class="form-label">Image: </label>
                                    <input type="file" class="form-control" id="pImage" name="pImage" value=<?php echo $pimage; ?>>
                                </div> -->
                                <div class="mb-3">
                                    <label for="id" class="form-label">category: </label>
                                    <select class="form-control" name="id" id="id">
                                        <!-- <option value =id>---select category--</option> -->
                                        <option value='1'> Basket </option>
                                        <option value='2'> Chair </option>
                                        <option value='3'> Lamp </option>
                                        <option value='4'> Bag </option>
                                        <option value='5'> Hat </option>

                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" id="Pedit" name="Pedit">บันทึกการเปลี่ยนแปลง </button>
                            </form>
                            </div>     
                        </div>
                    </div>

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
    <?php
 
    
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>