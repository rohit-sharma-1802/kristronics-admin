<?php require_once('include/_header.php'); ?>
<?php require_once('include/_db.php'); ?>

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Delete Record</li>
            </ol>
        </div>
    </div>

    <?php
$getURLtype = @$_GET['type'];

//operation on supplier record

if($getURLtype == "Supplier"){
    $supplierID = @$_GET['supplierID'];

    if( isset($_POST['update'])){
         $supplierName = $_POST['Name'];
         $supplierPhone = $_POST['Phone'];
         $supplierEmail = $_POST['Email'];
         $supplierCompany = $_POST['Company'];
         $supplierCountry = $_POST['Country'];
         $supplierAddress = $_POST['Address'];
    
    
        global $connectingDB;
        $sql = "UPDATE suppliers_records SET supplier_name = '$supplierName', supplier_phone = '$supplierPhone', supplier_email = '$supplierEmail', supplier_company = '$supplierCompany', supplier_country = '$supplierCountry', supplier_address = '$supplierAddress' WHERE supplier_id='$supplierID'";

        $stmt = $connectingDB->prepare($sql);

        $stmt->bindValue(':namE', $supplierName);
        $stmt->bindValue(':companY', $supplierCompany);
        $stmt->bindValue(':countrY', $supplierCountry);
        $stmt->bindValue(':phonE', $supplierPhone);
        $stmt->bindValue(':emaiL', $supplierEmail);
        $stmt->bindValue(':addresS', $supplierAddress);

        $Execute = $stmt->execute();
    
        if($Execute){
            echo '<script>window.open("view-all-record.php?type=Supplier&message=Record has been updated successfully","_self")</script>'; 
        }
        else{
            echo '<h4 class="text-danger">Error! Please try again</h4>'; 
        }
    }

    // fectch record
    global $connectingDB;
    $sql = "SELECT * FROM suppliers_records WHERE supplier_id = '$supplierID'";
    $stmt = $connectingDB->query($sql);
    while ($dataRows=$stmt->fetch()){
        $supplierID = $dataRows['supplier_id'];
        $supplierName = $dataRows['supplier_name'];
        $supplierPhone = $dataRows['supplier_phone'];
        $supplierEmail = $dataRows['supplier_email'];
        $supplierCompany = $dataRows['supplier_company'];
        $supplierCountry = $dataRows['supplier_country'];
        $supplierAddress = $dataRows['supplier_address'];
     }


     echo ' <div class="card">
     <div class="card-header">
         <h3 class="card-title">'. @$_GET['type'] . 's Information  </h3>
     </div>
     <form action=""  method="post" class="card">
         <div class="card-body">
             <div class="row">
             <div class="col-sm-2 col-md-2">
                     <div class="form-group">
                         <label class="form-label">'. @$_GET['type']. ' ID <span class="text-red">*</span></label>
                         <input class="form-control mb-4" disabled="" value="#'.$supplierID.'" type="text">
                     </div>
                 </div>
                 <div class="col-sm-4 col-md-3">
                     <div class="form-group">
                         <label class="form-label">Name <span class="text-red">*</span></label>
                         <input type="text" name="Name" class="form-control" value="'.$supplierName.'" required>
                     </div>
                 </div>
                 <div class="col-sm-4 col-md-3">
                     <div class="form-group">
                         <label class="form-label">Phone <span class="text-red">*</span></label>
                         <input type="text" name="Phone" class="form-control" value="'.$supplierPhone.'" >
                     </div>
                 </div>
                 <div class="col-sm-4 col-md-4">
                     <div class="form-group">
                         <label class="form-label">Email address <span class="text-red">*</span></label>
                         <input type="email" name="Email" class="form-control" value="'.$supplierEmail.'" >
                     </div>
                 </div>
                 <div class="col-md-12">
                     <div class="form-group">
                         <label class="form-label">Company Name <span class="text-red">*</span></label>
                         <input type="text" name="Company" class="form-control" value="'.$supplierCompany.'" >
                     </div>
                 </div>
     
                 <div class="col-md-12">
                     <div class="form-group">
                         <label class="form-label">Country Name <span class="text-red">*</span></label>
                         <input type="text" name="Country" class="form-control" value="'.$supplierCountry.'" >
                     </div>
                 </div>
     
                 <div class="col-md-12">
                     <div class="form-group">
                         <label class="form-label">Address <span class="text-red">*</span></label>
                         <input type="text" name="Address" class="form-control" value="'.$supplierAddress.'" >
                     </div>
                 </div>
                 <div class="col-md-12">
                     <div class="form-group">
                         <input type="submit" name="update" value="Update now" class="btn btn-info">
                     </div>
                 </div>
             </div>
         </div>
     </form>
     </div>
     
     </div>
     <!-- CONTAINER CLOSED -->
     </div>
     </div>
     <!--app-content closed-->
     </div>';

}




//operation on client records

if($getURLtype == "Client"){
    $clientID = $_GET['clientID'];

    if( isset($_POST['update'])){
        $clientName = $_POST['Name'];
        $clientPhone = $_POST['Phone'];
        $clientEmail = $_POST['Email'];
        $clientCompany = $_POST['Company'];
        $clientCountry = $_POST['Country'];
        $clientAddress = $_POST['Address'];
    
    
        global $connectingDB;

        $sql = "UPDATE clients_records SET clients_name = '$clientName', clients_phone = '$clientPhone', clients_email = '$clientEmail', clients_company = '$clientCompany', clients_country = '$clientCountry', clients_address = '$clientAddress' WHERE clients_id='$clientID'";

        $stmt = $connectingDB->prepare($sql);

        $stmt->bindValue(':namE', $clientName);
        $stmt->bindValue(':companY', $clientCompany);
        $stmt->bindValue(':countrY', $clientCountry);
        $stmt->bindValue(':phonE', $clientPhone);
        $stmt->bindValue(':emaiL', $clientEmail);
        $stmt->bindValue(':addresS', $clientAddress);

        $Execute = $stmt->execute();
    
        if($Execute){
            echo '<script>window.open("view-all-record.php?type=Client&message=Record has been updated successfully","_self")</script>'; 
        }
        else{
            echo '<h4 class="text-danger">Error! Please try again</h4>'; 
        }
    }

    // fectch record
    global $connectingDB;
    $sql = "SELECT * FROM clients_records WHERE clients_id = '$clientID'";
    $stmt = $connectingDB->query($sql);
    
    while ($dataRows=$stmt->fetch()){
        $clientID = $dataRows['clients_id'];
        $clientName = $dataRows['clients_name'];
        $clientPhone = $dataRows['clients_phone'];
        $clientEmail = $dataRows['clients_email'];
        $clientCompany = $dataRows['clients_company'];
        $clientCountry = $dataRows['clients_country'];
        $clientAddress = $dataRows['clients_address'];
     }

     echo ' <div class="card">
     <div class="card-header">
         <h3 class="card-title">'. @$_GET['type'] . 's Information  </h3>
     </div>
     <form action=""  method="post" class="card">
         <div class="card-body">
             <div class="row">
             <div class="col-sm-2 col-md-2">
                     <div class="form-group">
                         <label class="form-label">'. @$_GET['type']. ' ID <span class="text-red">*</span></label>
                         <input class="form-control mb-4" disabled="" value="#'.$clientID.'" type="text">
                     </div>
                 </div>
                 <div class="col-sm-4 col-md-3">
                     <div class="form-group">
                         <label class="form-label">Name <span class="text-red">*</span></label>
                         <input type="text" name="Name" class="form-control" value="'.$clientName.'" required>
                     </div>
                 </div>
                 <div class="col-sm-4 col-md-3">
                     <div class="form-group">
                         <label class="form-label">Phone <span class="text-red">*</span></label>
                         <input type="text" name="Phone" class="form-control" value="'.$clientPhone.'" >
                     </div>
                 </div>
                 <div class="col-sm-4 col-md-4">
                     <div class="form-group">
                         <label class="form-label">Email address <span class="text-red">*</span></label>
                         <input type="email" name="Email" class="form-control" value="'.$clientEmail.'" >
                     </div>
                 </div>
                 <div class="col-md-12">
                     <div class="form-group">
                         <label class="form-label">Company Name <span class="text-red">*</span></label>
                         <input type="text" name="Company" class="form-control" value="'.$clientCompany.'" >
                     </div>
                 </div>
     
                 <div class="col-md-12">
                     <div class="form-group">
                         <label class="form-label">Country Name <span class="text-red">*</span></label>
                         <input type="text" name="Country" class="form-control" value="'.$clientCountry.'" >
                     </div>
                 </div>
     
                 <div class="col-md-12">
                     <div class="form-group">
                         <label class="form-label">Address <span class="text-red">*</span></label>
                         <input type="text" name="Address" class="form-control" value="'.$clientAddress.'" >
                     </div>
                 </div>
                 <div class="col-md-12">
                     <div class="form-group">
                         <input type="submit" name="update" value="update now" class="btn btn-info">
                     </div>
                 </div>
             </div>
         </div>
     </form>
     </div>
     
     </div>
     <!-- CONTAINER CLOSED -->
     </div>
     </div>
     <!--app-content closed-->
     </div>';

}

?>



    <?php require_once('include/_footer.php'); ?>