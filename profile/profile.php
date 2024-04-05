<?php

include '../db/db.php';
session_start();
$username = "";
const invoicearray = [];

if (isset($_SESSION['user_id']) && $_GET['user'] == $_SESSION['user_id']) {
    $username = $_GET['user'];
    $userinfo = [];

    $stmt = $pdo->prepare("SELECT name,email FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $userinfo = $stmt->fetch();
    if (!$user) {
        die("User not found");
    }


    $stmt = $pdo->prepare("SELECT * FROM allproject WHERE username = ?");
    $stmt->execute([$username]);
    $invoices = $stmt->fetchAll();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./profile.css">
    <title>Document</title>
</head>

<body>

    <header>
        <h6 class="heading_userid">Welcome <?php echo $username; ?></h6>
        <button class="LogoutBtn">Logout</button>
    </header>
    <!-- <a href="../../authentication/logout/logout.html">Logout</a> -->

    <main>
        <img src="../images/img/profile.png" alt="">
        <div>
            <h6><?php echo $userinfo['name']; ?></h6>
            <h4><?php echo $username; ?></h4>
            <h6><?php echo $userinfo['email']; ?></h6>
        </div>
    </main>

    <div>
        <button class="createbtn"><img alt="">Create</button>
    </div>

    <section id="invoices">
        <h3>Invoices</h3>
        <div class="invoiceList">
            <?php foreach ($invoices as $invoice) : ?>
                <div class="invoice">
                    <h6><?php echo $invoice['projectname']; ?></h6>
                    <div>
                        <button data-username="<?php echo $invoice['username']; ?>" data-projectname="<?php echo $invoice['projectname']; ?>" class="viewbtn">View</button>
                        <button data-username="<?php echo $invoice['username']; ?>" data-projectname="<?php echo $invoice['projectname']; ?>" data-projectid="<?php echo $invoice['projectid']; ?>" class="deletebtn">delete</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>



</body>
<script>
    function HandleCreateBtnClick() {
        window.location.href = "../form/inputForm.php?user=<?php echo $username ?>";
    }

    document.querySelector('.createbtn').addEventListener('click', HandleCreateBtnClick);

    document.querySelector('.LogoutBtn').addEventListener('click', function() {
        window.location.href = "../authentication/login/login.html";
    });
</script>


<script src="../profile/deletefolder/deletefolder.js"></script>
<script src="../profile/viewFolder/viewfolder.js"></script>
<!-- <script> </script> -->

</html>