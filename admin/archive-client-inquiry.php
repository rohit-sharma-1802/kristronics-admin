<?php require_once('include/_header.php'); ?>

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Client's Inquiries</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Client's Inquiries</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <?php 

        $requestStatus = @$_GET['request_status'];

         if($requestStatus == "pending"){
            $requestClientId = @$_GET['client_id'];
            $sql = "UPDATE client_inquiries SET request_status = '$requestStatus' WHERE client_id = '$requestClientId' ";
            $stmt = $connectingDB->prepare($sql);

            $Execute = $stmt->execute();
        
            if($Execute){
                echo '<script>window.open("archive-client-inquiry.php?message=Status has been updated successfully","_self")</script>'; 
            }
            else{
                echo '<script>window.open("archive-client-inquiry.php?message=Error! Please try again","_self")</script>'; 
            }       
         }
         else if($requestStatus == "completed"){
            $requestClientId = @$_GET['client_id'];
            $sql = "UPDATE client_inquiries SET request_status = '$requestStatus' WHERE client_id = '$requestClientId' ";
            $stmt = $connectingDB->prepare($sql);

            $Execute = $stmt->execute();
        
            if($Execute){
                echo '<script>window.open("archive-client-inquiry.php?message=Status has been updated successfully","_self")</script>'; 
            }
            else{
                echo '<script>window.open("archive-client-inquiry.php?message=Error! Please try again","_self")</script>'; 
            }   
         }
        
     ?>

    <?php

        
       
        $requestType = @$_GET['request_type'];
        $sql = "SELECT * FROM client_inquiries";
        $stmt = $connectingDB->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
       
        $stmt = $connectingDB->prepare("SELECT * FROM client_inquiries WHERE request_status = 'pending' ");
        $stmt->execute();
        $pending_count = $stmt->rowCount();

    
        $stmt = $connectingDB->prepare("SELECT * FROM client_inquiries WHERE request_status = 'completed' ");
        $stmt->execute();
        $completed_count = $stmt->rowCount();

        $stmt = $connectingDB->prepare("SELECT * FROM client_inquiries WHERE request_status = 'new_request' ");
        $stmt->execute();
        $new_count = $stmt->rowCount();
        

    ?>

    <!-- Row -->
    <div class="row ">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-2">
            <a href="archive-client-inquiry.php?request_type=total">
                <div class="card bg-info img-card box-info-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font"><?php echo $count; ?></h2>
                                <h4 class="text-white mb-0">Total</h4>
                            </div>
                            <div class="ms-auto"> <i class="fa fa-user-o text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-2">
            <a href="archive-client-inquiry.php?request_type=new">
                <div class="card bg-danger img-card box-danger-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font"><?php echo $new_count; ?></h2>
                                <h4 class="text-white mb-0">New Request</h4>
                            </div>
                            <div class="ms-auto"> <i class="fa fa-heart-o text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-2">
            <a href="archive-client-inquiry.php?request_type=pending">
                <div class="card bg-warning img-card box-warning-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font"><?php echo $pending_count; ?></h2>
                                <h4 class="text-white mb-0">Pending</h4>
                            </div>
                            <div class="ms-auto"> <i class="fa fa-user-o text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-2">
            <a href="archive-client-inquiry.php?request_type=completed">
                <div class="card bg-success img-card box-success-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font"><?php echo $completed_count; ?></h2>
                                <h4 class="text-white mb-0">Completed</h4>
                            </div>
                            <div class="ms-auto"> <i class="fa fa-heart-o text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- COL END -->
        
    </div>
</div>
<!-- /Row -->


<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
        <h2 class=" m-5 text-green"><?php echo @$_GET['request_status'] ?></h2>
            <div class="card-header">
                <h3 class="card-title">Client's Request</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-20p border-bottom-0">Client ID</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0">Email</th>
                                <th class="wd-20p border-bottom-0">Phone</th>
                                <th class="wd-15p border-bottom-0">Part No</th>
                                <th class="wd-10p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 

                            if($requestType == "pending"){
                                $sql = "SELECT * FROM client_inquiries WHERE request_status = '$requestType' ";
                                $stmt = $connectingDB->prepare($sql);
                                $stmt->execute();

                                while($dataRows = $stmt->fetch()){
                                    $client_id = $dataRows['client_id'];
                                    $client_name = $dataRows['client_name'];
                                    $client_email = $dataRows['client_email'];
                                    $client_phone = $dataRows['client_phone'];
                                    $client_part_no = $dataRows['client_part_no'];                            
                            
                                    echo '<tr>
                                        <td>'.$client_id.'</td>
                                        <td>'.$client_name.'</td>
                                        <td>'.$client_email.'</td>
                                        <td>'.$client_phone.'</td>
                                        <td>'.$client_part_no.'</td>
                                        <td>
                                        <a href="view-client-request.php?clientID='.$client_id.'"
                                                class="btn text-success btn-sm" data-bs-toggle="tooltip"
                                                data-bs-original-title="View Request"><span class="ion ion-eye fs-20"></span></a>
                                        </td>
                                    </tr>';
                                }   
                            }

                            else if($requestType == "completed"){
                                $sql = "SELECT * FROM client_inquiries WHERE request_status = '$requestType' ";
                                $stmt = $connectingDB->prepare($sql);
                                $stmt->execute();

                                while($dataRows = $stmt->fetch()){
                                    $client_id = $dataRows['client_id'];
                                    $client_name = $dataRows['client_name'];
                                    $client_email = $dataRows['client_email'];
                                    $client_phone = $dataRows['client_phone'];
                                    $client_part_no = $dataRows['client_part_no'];                            
                            
                                    echo '<tr>
                                        <td>'.$client_id.'</td>
                                        <td>'.$client_name.'</td>
                                        <td>'.$client_email.'</td>
                                        <td>'.$client_phone.'</td>
                                        <td>'.$client_part_no.'</td>
                                        <td>
                                        <a href="view-client-request.php?clientID='.$client_id.'"
                                                class="btn text-success btn-sm" data-bs-toggle="tooltip"
                                                data-bs-original-title="View Request"><span class="ion ion-eye fs-20"></span></a>
                                        </td>
                                    </tr>';
                                }  
                            }

                            else if($requestType == "total"){
                                $sql = "SELECT * FROM client_inquiries";
                                $stmt = $connectingDB->prepare($sql);
                                $stmt->execute();
                                while($dataRows = $stmt->fetch()){
                                    $client_id = $dataRows['client_id'];
                                    $client_name = $dataRows['client_name'];
                                    $client_email = $dataRows['client_email'];
                                    $client_phone = $dataRows['client_phone'];
                                    $client_part_no = $dataRows['client_part_no'];                            
                            
                                    echo '<tr>
                                        <td>'.$client_id.'</td>
                                        <td>'.$client_name.'</td>
                                        <td>'.$client_email.'</td>
                                        <td>'.$client_phone.'</td>
                                        <td>'.$client_part_no.'</td>
                                        <td>
                                        <a href="view-client-request.php?clientID='.$client_id.'"
                                                class="btn text-success btn-sm" data-bs-toggle="tooltip"
                                                data-bs-original-title="View Request"><span class="ion ion-eye fs-20"></span></a>
                                        </td>
                                    </tr>';
                                }   
                            }

                            else if($requestType == "new"){
                                $sql = "SELECT * FROM client_inquiries WHERE request_status = 'new_request' ";
                                $stmt = $connectingDB->prepare($sql);
                                $stmt->execute();
                                while($dataRows = $stmt->fetch()){
                                    $client_id = $dataRows['client_id'];
                                    $client_name = $dataRows['client_name'];
                                    $client_email = $dataRows['client_email'];
                                    $client_phone = $dataRows['client_phone'];
                                    $client_part_no = $dataRows['client_part_no'];                            
                            
                                    echo '<tr>
                                        <td>'.$client_id.'</td>
                                        <td>'.$client_name.'</td>
                                        <td>'.$client_email.'</td>
                                        <td>'.$client_phone.'</td>
                                        <td>'.$client_part_no.'</td>
                                        <td>
                                        <a href="view-client-request.php?clientID='.$client_id.'"
                                                class="btn text-success btn-sm" data-bs-toggle="tooltip"
                                                data-bs-original-title="View Request"><span class="ion ion-eye fs-20"></span></a>
                                        </td>
                                    </tr>';
                                }   
                            }


                            else {
                               
                                while($dataRows = $stmt->fetch()){
                                    $client_id = $dataRows['client_id'];
                                    $client_name = $dataRows['client_name'];
                                    $client_email = $dataRows['client_email'];
                                    $client_phone = $dataRows['client_phone'];
                                    $client_part_no = $dataRows['client_part_no'];                            
                            
                                    echo '<tr>
                                        <td>'.$client_id.'</td>
                                        <td>'.$client_name.'</td>
                                        <td>'.$client_email.'</td>
                                        <td>'.$client_phone.'</td>
                                        <td>'.$client_part_no.'</td>
                                        <td>
                                        <a href="view-client-request.php?clientID='.$client_id.'"
                                                class="btn text-success btn-sm" data-bs-toggle="tooltip"
                                                data-bs-original-title="View Request"><span class="ion ion-eye fs-20"></span></a>
                                        </td>
                                    </tr>';
                                }   
                            }

                                      
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
</div>
<!-- CONTAINER CLOSED -->
</div>
</div>
<!--app-content closed-->
</div>

<?php require_once('include/_footer.php'); ?>