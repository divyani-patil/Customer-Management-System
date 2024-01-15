<?php include("auth.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>eshuzo Admin : Notice</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php include("templates/inc.php"); ?>
  <script src="scripts/notice.js" type="text/javascript" language="javascript"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php
  include("templates/header.php");
  ?>

  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php
  include("templates/sidebar.php");

  ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Notice List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <a href="notice.php" class="btn btn-primary">Add Notice</a>
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Title</th>
                    <th scope="col">Notice</th>
                    <th scope="col" colspan="2">Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  require "conn.php";

                  $sl = 1;
                  $sql = "select id,title,notice,status from tbl_notice where deleted_at is NULL order by id desc";

                  $rs = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_assoc($rs)) {
                    echo "<tr>";
                    echo '<td>' . $sl . '</td>';
                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>' . $row['notice'] . '</td>';

                    echo '<td><a href="notice.php?action=Edit&id=' . base64_encode($row['id']) . '" class="btn btn-primary">Edit</a></td>';
                    echo '<td><button id='.$row['id'].' class="btn btn-danger delete">Delete</button></td>';

                    echo "</tr>";
                    $sl++;
                  }
                  ?>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
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