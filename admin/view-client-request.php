<?php require_once('include/_header.php'); ?>
<?php 
$clientID = @$_GET['clientID'];
$sql = "SELECT * FROM client_inquiries WHERE client_id = '$clientID' ";
$stmt = $connectingDB->prepare($sql);
$stmt->execute();
while($dataRows = $stmt->fetch()){
    $client_id = $dataRows['client_id'];
    $client_name = $dataRows['client_name'];
    $client_email = $dataRows['client_email'];
    $client_phone = $dataRows['client_phone'];
    $client_address = $dataRows['client_address'];
    $client_company = $dataRows['client_company'];  
    $client_country = $dataRows['client_country'];  
    $client_part_no = $dataRows['client_part_no'];  
    $client_quantity = $dataRows['client_quantity'];  
    $client_description = $dataRows['client_description'];  
    $client_additional_remarks = $dataRows['client_additional_remarks'];  
    $client_inquiry_date = $dataRows['client_inquiry_date'];  
}
?>

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Request Details</li>
            </ol>
        </div>

    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a class="header-brand">
                                <img src="../assets/images/brand/logo.png" class="header-brand-img logo"
                                    alt="Sash logo">
                            </a>
                        </div>
                        <div class="col-lg-6 text-end border-bottom border-lg-0">
                            <h3>CLIENT ID - #<?php echo $client_id; ?></h3>
                            <h5>Received On: <?php echo $client_inquiry_date; ?></h5>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col-lg-12">
                            <div class="card-header">
                                <h3 class="card-title text-info fw-semibold">Personal Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h5><strong>Name: </strong><?php echo $client_name; ?></h5>
                                    </div>

                                    <div class="col-lg-4">
                                        <h5><strong>Email: </strong><?php echo $client_email; ?></h5>
                                    </div>

                                    <div class="col-lg-4">
                                        <h5><strong>Phone: </strong><?php echo $client_phone; ?></h5>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col">
                                        <h5><strong>Company: </strong><?php echo $client_company; ?></h5>
                                    </div>

                                    <div class="col">
                                        <h5><strong>Address: </strong><?php echo $client_address; ?></h5>
                                    </div>

                                    <div class="col">
                                        <h5><strong>Country: </strong><?php echo $client_country; ?></h5>
                                    </div>
                                </div>
                                <div class="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive push">
                        <div class="card-header">
                            <h3 class="card-title text-info">Product Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table class="table table-bordered table-hover mb-0 text-nowrap">
                                    <tbody>
                                        <tr class=" ">
                                            <th>Part No.</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Additional Remarks</th>
                                        </tr>
                                        <tr>
                                            <td class="fs-15"><?php echo $client_part_no; ?></td>
                                            <td class="fs-15"><?php echo $client_description; ?></td>
                                            <td class="fs-15"><?php echo $client_quantity; ?></td>
                                            <td class="fs-15">
                                                <p><?php echo $client_additional_remarks; ?></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-end">
                    <a type="button" class="btn bg-red mb-1 text-white fs-15"
                        href="supplier-quote-form.php?part_no=<?php echo $client_part_no; ?>&qty=<?php echo $client_quantity; ?>">Send
                        to Supplier</a>
                    <a type="button" class="btn bg-teal mb-1 text-white fs-15"
                        href="archive-client-inquiry.php?client_id=<?php echo $client_id; ?>&request_status=pending">Mark
                        as
                        pending</a>
                    <a type="button" class="btn bg-purple mb-1 text-white fs-15"
                        href="archive-client-inquiry.php?client_id=<?php echo $client_id; ?>&request_status=completed">Mark
                        as Completed</a>
                </div>
            </div>
        </div>
        <!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->
</div>
<!-- CONTAINER CLOSED -->
</div>
</div>
<!--app-content closed-->
</div>

<?php require_once('include/_footer.php'); ?>