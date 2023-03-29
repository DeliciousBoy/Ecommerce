<?php include_once('admin_edit.php'); ?>
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
    <div class="mb-3">
        <select class="form-control" name="role" id="role">
            <option value="">-- Choose product types--</option>
            <option value=<?php $role = "user" ?>> user </option>
            <option value=<?php $role = "admin" ?>> admin </option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary" id="edit" name="edit">บันทึกการเปลี่ยนแปลง </button>
</form>
</div>