<?php require_once('include/_header.php'); ?>


<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
        <div>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </div>

    </div>
    <div class="page-header">
        <div>
            <span>
            <a href="add-new-record.php?type=Supplier" class="btn-lg btn-cyan"> <i class="fe fe-plus me-2"></i> Add Supplier Record</a>
            </span>
            <span>
            <a href="add-new-record.php?type=Client" class="btn-lg btn-info"><i class="fe fe-plus me-2"></i> Add Client Record</a>
            </span>
        </div>
</div>

    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <!-- Row -->
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card">
                <h2 class=" m-5 text-green"><?php echo @$_GET['message'] ?></h2>
                <div class="card-header">

                    <h3 class="card-title mb-0"><?php echo @$_GET['type'] ?>'s Database</h3>
                </div>
                <div class="card-body pt-4">
                    <div class="grid-margin">
                        <div class="">
                            <div class="panel panel-primary">
                                <div class="panel-body tabs-menu-body border-0 pt-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                            <div class="table-responsive">
                                                <table id="data-table" class="table table-bordered text-nowrap mb-0">
                                                    <thead class="border-top">

                                                        <?php 
                                                
                                                    global $connectingDB;
                                                    $getUrlParameter = @$_GET['type']; 
                                                    

                                                    if($getUrlParameter == 'Supplier'){

                                                    
                                                    echo '<tr>
                                                    <th class="bg-transparent border-bottom-0"
                                                    style="width: 5%;">Id</th>
                                                    <th class="bg-transparent border-bottom-0">Name</th>
                                                    <th class="bg-transparent border-bottom-0">Phone</th>
                                                    <th class="bg-transparent border-bottom-0">Email</th>
                                                    <th class="bg-transparent border-bottom-0">Company</th>
                                                    <th class="bg-transparent border-bottom-0">Country</th>
                                                    <th class="bg-transparent border-bottom-0">Address</th>
                                                    <th class="bg-transparent border-bottom-0"
                                                    style="width: 5%;">Action</th>
                                                    </tr>';

                                                        $sql = "SELECT * FROM suppliers_records";
                                                        $stmt = $connectingDB->query($sql);


                                                        while($dataRows = $stmt->fetch()){
                                                            $supplier_id = $dataRows['supplier_id'];
                                                            $supplier_name = $dataRows['supplier_name'];
                                                            $supplier_phone = $dataRows['supplier_phone'];
                                                            $supplier_email = $dataRows['supplier_email'];
                                                            $supplier_company = $dataRows['supplier_company'];
                                                            $supplier_country = $dataRows['supplier_country'];
                                                            $supplier_address = $dataRows['supplier_address'];

                                                        echo '<tr class="border-bottom">
                                                                <td class="text-center">
                                                                    <div class="mt-0 mt-sm-2 d-block">
                                                                        <h6 class="mb-0 fs-14">#'.$supplier_id.'</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="ms-3 mt-0 mt-sm-2 d-block">
                                                                        <h6 class="mb-0 fs-14">'.$supplier_name.'</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="mt-0 mt-sm-3 d-block">
                                                                            <h6 class="mb-0 fs-14">'.$supplier_phone.'</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="mt-sm-2 d-block"><h6 class="mb-0 fs-14">'.$supplier_email.'</h6></span></td>
                                                                <td><span
                                                                        class="mt-sm-2 d-block"><h6 class="mb-0 fs-14">'.$supplier_company.'</h6></span>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="mt-0 mt-sm-3 d-block">
                                                                            <h6 class="mb-0 fs-14">'.$supplier_country.'</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-sm-1 d-block">
                                                                    <h6 class="mb-0 fs-14">'.$supplier_address.'</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a href="update-record.php?type=Supplier&supplierID='.$supplier_id.'" class="btn text-primary btn-sm"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Edit"><span
                                                                                class="fe fe-edit fs-14"></span></a>
                                                                        <a href="delete-record.php?type=Supplier&supplierID='.$supplier_id.'" class="btn text-danger btn-sm"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Delete"><span
                                                                                class="fe fe-trash-2 fs-14"></span></a>
                                                                    </div>
                                                                </td>
                                                            </tr>';
                                                    }
                                                    }

                                                    if($getUrlParameter == 'Client'){
                                                        echo '<tr>
                                                                <th class="bg-transparent border-bottom-0"
                                                                    style="width: 5%;">Id</th>
                                                                <th class="bg-transparent border-bottom-0">Name</th>
                                                                <th class="bg-transparent border-bottom-0">Phone</th>
                                                                <th class="bg-transparent border-bottom-0">Email</th>
                                                                <th class="bg-transparent border-bottom-0">Company</th>
                                                                <th class="bg-transparent border-bottom-0">Country</th>
                                                                <th class="bg-transparent border-bottom-0">Address</th>
                                                                <th class="bg-transparent border-bottom-0"
                                                                    style="width: 5%;">Action</th>
                                                            </tr>';
                                                        ?>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $sql = "SELECT * FROM clients_records";
                                                        $stmt = $connectingDB->query($sql);
                                                        while($dataRows = $stmt->fetch()){
                                                            $client_id = $dataRows['clients_id'];
                                                            $client_name = $dataRows['clients_name'];
                                                            $client_phone = $dataRows['clients_phone'];
                                                            $client_email = $dataRows['clients_email'];
                                                            $client_company = $dataRows['clients_company'];
                                                            $client_country = $dataRows['clients_country'];
                                                            $client_address = $dataRows['clients_address'];

                                                        echo 
                                                            '<tr class="border-bottom">
                                                                <td class="text-center">
                                                                    <div class="mt-0 mt-sm-2 d-block">
                                                                        <h6 class="mb-0 fs-14">#'.$client_id.'</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="ms-3 mt-0 mt-sm-2 d-block">
                                                                        <h6 class="mb-0 fs-14">'.$client_name.'</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="mt-0 mt-sm-3 d-block">
                                                                            <h6 class="mb-0 fs-14">'.$client_phone.'</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="mt-sm-2 d-block">'.$client_email.'</span></td>
                                                                <td><span
                                                                        class="mt-sm-2 d-block">'.$client_company.'</span>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="mt-0 mt-sm-3 d-block">
                                                                            <h6 class="mb-0 fs-14">'.$client_country.'</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-sm-1 d-block">
                                                                    <h6 class="mb-0 fs-14">'.$client_address.'</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a href="update-record.php?type=Client&clientID='.$client_id.'" class="btn text-primary btn-sm"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Edit"><span
                                                                                class="fe fe-edit fs-14"></span></a>
                                                                        <a href="delete-record.php?type=Client&clientID='.$client_id.'" class="btn text-danger btn-sm"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Delete"><span
                                                                                class="fe fe-trash-2 fs-14"></span></a>
                                                                    </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>
<!-- CONTAINER CLOSED -->
</div>
</div>
<!--app-content closed-->
</div>

<?php require_once('include/_footer.php'); ?>