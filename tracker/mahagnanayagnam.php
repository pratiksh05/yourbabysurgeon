<?php
   error_reporting(0);

   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Hanuman Chalisa Tracker</title>
      <link rel="stylesheet" type="text/css" href="css/styles2.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css">
   </head>
   <body class="customBanner">
      <div class="wapper">
      <div class="container-fluid">
         <div class="row" style="background-color:#517a7f;">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
               <div class="mainHeading" align="left" style="font-size:50px">
                  <h1 align="center">Hanuman Chalisa Maha Gnana Yagnam Tracker</h1>
               </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12">
               <div class="mainHeading" align="left" style="font-size:50px">
               </div>
            </div>
         </div>
         <div class="well" style="margin-top: 50px">
            <div class="row tableContainer">
               <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                  <div>
                     <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                           <tr>
                              <th class="alignTextToCenter">#</th>
                              <th class="alignTextToCenter">Host Name</th>
                              <th class="alignTextToCenter">Address</th>
                              <th class="alignTextToCenter">Email ID</th>
                              <th class="alignTextToCenter">Mobile Number</th>
                              <th class="alignTextToCenter">Date of Interest</th>
                              <th class="alignTextToCenter">Category</th>
                              <th class="alignTextToCenter">Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                                include('../db_conns.php');

                                $fetchRequests = "select hostName,hostAddress,mobileNumber,emailID,dateofInterest,category,date from mahagnanayagam where status = 1";

                                $fetchedRequests = mysqli_query($db_connection , $fetchRequests);

                                $k = 1;

                                while($availableRequests = mysqli_fetch_array($fetchedRequests))

                                {
                                  echo '<tr>';

                                  echo '<td class="alignTextToCenter">' . $k . '</td>';
                                  echo '<td>' . $availableRequests['hostName'] . '</td>';
                                  echo '<td>' . $availableRequests['hostAddress'] . '</td>';
                                  echo '<td>' . $availableRequests['emailID'] .'</td>';
                                  echo '<td>' . $availableRequests['mobileNumber'] . '</td>';
                                  echo '<td>' . $availableRequests['dateofInterest'] . '</td>';
                                  echo '<td>' . $availableRequests['category'] . '</td>';
                                  echo '<td>' . $availableRequests['date'] . '</td>';
                                  $k++;
                                  echo '</tr>';
                                }

                              ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <!-- /container -->
      </div>
   </body>
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
   <script>
      $(document).ready(function() {
       $('#example').DataTable({
       "order": [[ 0, "asc" ]]

       } );
      });

   </script>
</html>