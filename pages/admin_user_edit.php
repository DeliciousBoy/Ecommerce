<?php 
    require_once('admin_edit.php');
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
                    <h1 class="h3 mb-2 text-gray-800">Customer</h1>
                    <p class="mb-4">Database of all user</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                        </div>
                        <div class="card-body">
                            <div class="container">
                            <h3 class="mt-5">แก้ไขข้อมูลสมาชิก</h3>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="fname" class="form-label">ชื่อ:</label>
                                    <input type="text" class="form-control" id="fname" name="fname" value=<?php echo $fname ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="lname" class="form-label">นามสกุล:</label>
                                    <input type="text" class="form-control" id="lname" name="lname" value=<?php echo $lname ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="uname" class="form-label">UserName:</label>
                                    <input type="text" class="form-control" id="uname" name="uname" value=<?php echo $uname; ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="telephone" class="form-label">telephone: </label>
                                    <input type="int" class="form-control" id="telephone" name="telephone" value=<?php echo $telephone; ?>>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="role" class="form-label">role: </label>
                                    <input type="text" class="form-control" id="role" name="role" value=<?php echo $role; ?>>
                                </div> -->
                                <div class="mb-3">
                                    <label for="role" class="form-label">role: </label>
                                    <select class="form-control" name="role" id="role">
                                        <!-- <option value =""> role select</option> -->
                                        
                                        <option value='user'> user </option>
                                        <option value='admin'> admin </option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" id="edit" name="edit">บันทึกการเปลี่ยนแปลง </button>
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