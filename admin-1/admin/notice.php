<?php include("auth.php");
require("conn.php");
$action="Add";
$id=null;

if(isset($_GET['action']))
{
  $action=$_GET['action'];
  $id=base64_decode($_GET['id']);

  $sql="select * from tbl_notice where id='$id'";
  $smt=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($smt);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>eshuzo Admin : Blank</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php  include("templates/inc.php"); ?>
  <script src="scripts/notice.js" type="text/javascript" language="javascript"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php
include ("templates/header.php");
?>

<!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php
include("templates/sidebar.php");

  ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Notice</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <div class="card-body py-2">
              <!-- <h5 class="card-title">Custom Styled Validation</h5> -->
            
              <!-- Custom Styled Validation -->
              <form id="notice" action="notice-action.php"  class="row g-3 needs-validation" novalidate="">
           
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Notice Title</label>
                  <input value="<?php if(isset($_GET['id'])) echo $row['title'] ; ?>" type="text" class="form-control" id="title" name="title" required="">
                  <div class="invalid-feedback">
                    Please provide a title.
                  </div>
                </div>

                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Notice</label>
                  <input value="<?php if(isset($_GET['id'])) echo $row['notice']?>" type="text" class="form-control" id="notice" name="notice" required="">
                  <div class="invalid-feedback">
                    Please enter notice.
                  </div>
                </div>
              
                <div class="col-12">
                  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                  <input type="hidden" name="action" id="action" value="<?php echo $action; ?>" />
                  <?php if(isset($_GET['id']))
                  {
                  ?>
                  <button class="btn btn-primary" type="submit">Update Notice</button>
                  <a href="notice-list.php"><button class="btn btn-danger" type="button">Cancel</button></a>
                  <?php
                  }
                  else
                  {
                  ?>
                  <button id="btnAdd" class="btn btn-primary" type="submit">Add Notice</button>
                  <a href="notice-list.php" class="btn btn-danger">Cancle</a>
                  <?php
                  }
                  ?>
                  
                  <p id="msg"></p>
                </div>
              </form><!-- End Custom Styled Validation -->

            </div>
            </div>
          </div>

        </div>
      </div>
   </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include("templates/footer.php");
?>
<!-- End Footer -->


  <?php include("templates/vendors.php"); ?>

</body>

</html>