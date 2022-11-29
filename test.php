<?php
include_once "./new_controller.php";
$credit = $_POST['credit'];
$interest = $_POST['interest'];
$last = $_POST["credit"] + (($_POST["credit"] / 100) * $_POST["interest"]);
$time = ceil($_POST['time']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kredit Kalkulyatoru</title>
    <link rel="stylesheet" href="test.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script>
         function success(){
            if((document.getElementById("credit").value==="") || (document.getElementById("interest").value==="") || (document.getElementById("time").value==="")){ 
            document.getElementById('button').disabled = true;
            }else{
                document.getElementById('button').disabled = false;
                var element = document.getElementById("button");
                element.classList.remove("btn-danger");
                element.classList.add("btn-primary");
                
            }
        }
    </script>

</head>

</script>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $credit   = $_POST['credit'];
    $interest = $_POST['interest'];
    $time    = $_POST['time'];
    $data  = calculateLoan($_POST);
} else {
    // Default dəyərlər.
    $loanAmount   = 2000;
    $interestRate = 5;
    $month        = 12;
}
?>

<!--Sol teref-->
    <div class="row no-gutters">

        <div class="col-md-6 no-gutters">
            <div class="leftside d-flex justify-content-center align-items-center">
                <div class="center left">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div class="form-group">
    <label for="credit">Kredit məbləği</label>
    <input  name="credit" type="number" class="input form-input form-control" id="credit" required placeholder="Kredit məbləğini seçin (500-100.000)" min="500" max="100000" onkeypress="success()">
  </div>

  <div class="form-group">
    <label for="interest">Faiz</label>
    <input name="interest" type="number" class="input form-input form-control" id="interest" required placeholder="Faizi seçin (10-20)" min="10" max="20" onkeypress="success()">
  </div>

  <div class="form-group">
    <label for="time">Müddət</label>
    <input  name="time" type="number" required class="input form-input form-control" id="time"  placeholder="Krediti ödəyəcəyiniz müddəti seçin (6-36)" min="6" max="36" onkeypress="success()">
  </div>

  <div class="form-group">
    
   <input value="Hesabla" name="button" type="submit"  class="button sendButton btn-danger form-button form-control" id="button">
  </div>
</form>

                </div>
            </div>
        </div>

<!--Sag teref-->

        <div class="col-md-6 no-gutters">
            <div class="rightside d-flex justify-content-center align-items-center">
            <div class="center right">

            <?php if (checkPost($_POST)) : ?>

                <h4>Kreditin məbləği: <?php echo $credit ?></h4>
                

                <h4>Faiz dərəcəsi: <?php echo $interest ?></h4>
                

                <h4>Ödəniləcək ümumi məbləğ: <?php echo $last ?></h4>
                

                <h4>Faiz üzrə ödəniləcək məbləğ: <?php echo $last-$credit ?></h4>
                

                <h4>Hər ay ödəniləcək məbləğ: <?php echo ceil($data["monthlyPay"]) ?></h4>
                <span>Qeyd: Hər ay ödəniləcək məbləğ,  yuvarlaqlaşdırılıb sizə göstəriləcəkdir.</span>
                
                <?php endif; ?>
            </div>
            </div>

        </div>
    </div>
    

<script src="script.js"></script>
   

</body>
</html>