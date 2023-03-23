<?php 
 require_once('include/_header.php');
 require_once('include/_db.php');
?>


<?php
$part_no = @$_GET['part_no'];
$qty = @$_GET['qty'];

include('include/signature.php');


if(isset($_POST['sendQuote'])){


           $emailList = $_POST['supplierEmails'];
            $to = "rohitsharmatech9@gmail.com";
            $subject = $_POST['subject'];
            $message = $_POST['quoteMessage'];
            $headers = [
                "Bcc: $emailList",
                "From: sales1@kristr.com",
                "X-Mailer: php",
                "MIME-Version: 1.0",
                "Content-type: text/html; charset=utf-8"
            ];

       echo $headers = implode("\r\n", $headers);
            $result = mail($to, $subject, $message, $headers);

            if($result){

                $sql = "INSERT INTO quote_emails (to, subject, message, email_list) VALUES(:toEmail, :subjectEmail, :messageEmail, :emailList)";

                $stmt = $connectingDB->prepare($sql);

                $stmt -> bindValue(':toEmail', $to);
                $stmt -> bindValue(':subjectEmail', $subject);
                $stmt -> bindValue(':messageEmail', $message);
                $stmt -> bindValue(':emailList', $emailList);

                $Execute = $stmt->execute(); 

               // echo '<script>window.open("archive-client-inquiry.php?request_status=Email has been sent successfully","_self")</script>'; 
            }
            else{
              //  echo '<script>window.open("archive-client-inquiry.php?request_status=Sorry there was an error! Please try again","_self")</script>'; 
            }
            
}
?>

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Send Quote to Supplier</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Supplier Quote Form</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <form action="" method="post" class="card">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Supplier Quote To Supplier</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-label">Supplier's Emails<span class="text-red">*</span></label>
                            <?php
                                // fectch record
                                global $connectingDB;
                                $list;
                                $sql = "SELECT * FROM suppliers_records";
                                $stmt = $connectingDB->query($sql);
                                echo '<textarea type="text" name="supplierEmails" class="form-control" placeholder="">';
                                while ($dataRows = $stmt->fetch()) {
                                    $supplierEmail = $dataRows['supplier_email'];
                                    echo $supplierEmail.', ';
                                } 
                            echo '</textarea>';
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-label">Subject <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="subject">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Quote<span class="text-red"></span></label>
                            <textarea type="text" id="summernote" name="quoteMessage" class="form-control"
                                placeholder="Message"><?php echo $signature; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" name="sendQuote" value="Send To Supplier" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>
<!-- CONTAINER CLOSED -->
</div>
</div>
<!--app-content closed-->
</div>

<?php require_once('include/_footer.php'); ?>