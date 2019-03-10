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
                  <h1 align="center">Feedback Tracker</h1>
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
                              <th class="alignTextToCenter">Name</th>
                              <th class="alignTextToCenter">Email ID</th>
                              <th class="alignTextToCenter">Mobile Number</th>
                              <th class="alignTextToCenter">Subject</th>
                              <th class="alignTextToCenter">Message</th>
                              <th class="alignTextToCenter">Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                                include('../db_conns.php');

                                $fetchRequests = "select name,emailID,mobile,subject,message,date from feedback";

                                $fetchedRequests = mysqli_query($db_connection , $fetchRequests);

                                $k = 1;

                                while($availableRequests = mysqli_fetch_array($fetchedRequests))

                                {
                                  echo '<tr>';

                                  echo '<td class="alignTextToCenter">' . $k . '</td>';
                                  echo '<td>' . $availableRequests['name'] . '</td>';
                                  echo '<td>' . $availableRequests['emailID'] .'</td>';
                                  echo '<td>' . $availableRequests['mobile'] .'</td>';
                                  echo '<td>' . $availableRequests['subject'] . '</td>';
                                  echo '<td>' . $availableRequests['message'] . '</td>';
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