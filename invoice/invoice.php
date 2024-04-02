<?php

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign form data to variables
    $projectName = $_POST['projectName'];
    $billerName = $_POST['billerName'];
    $billerEmail = $_POST['billerEmail'];
    $billerPhone = $_POST['billerPhone'];
    $billingDate = $_POST['billingDate'];
    $dueDate = $_POST['dueDate'];
    $senderAddress = $_POST['senderAddress'];
    $receiverAddress = $_POST['receiverAddress'];
    $serviceInput = isset($_POST['serviceInput']) ? (is_array($_POST['serviceInput']) ? $_POST['serviceInput'] : [$_POST['serviceInput']]) : [];
    $amountInput = isset($_POST['amountInput']) ? (is_array($_POST['amountInput']) ? $_POST['amountInput'] : [$_POST['amountInput']]) : [];
    $bankName = $_POST['bankname'];
    $accountNumber = $_POST['accountNumber'];
    $ifsc = $_POST['ifsc'];
    $pan = $_POST['pan'];




}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Invoice</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <div>
        <div class="container">

            <div id="name" class="name"><?php echo htmlspecialchars($billerName) ?></div>

            <div class="date-section">
                <div class="date-block">
                    <span class="label">Issued</span>
                    <span id="issued-date" class="date-value"><?php echo htmlspecialchars($billingDate) ?></span>
                </div>

                <div class="date-block">
                    <span class="label">Due</span>
                    <span id="due-date" class="date-value"><?php echo htmlspecialchars($dueDate) ?></span>
                </div>
            </div>

            <div class="address-section">
                <div class="address-block">
                    <span class="label">From</span>
                    <span id="from-address" class="address-value"><?php echo htmlspecialchars($senderAddress) ?></span>
                </div>

                <div class="address-block">
                    <span class="label">To</span>
                    <span id="to-address" class="address-value"><?php echo htmlspecialchars($receiverAddress) ?></span>
                </div>
            </div>

            <div class="service-label-section">
                <div><span>Service</span></div>
                <div><span>Total</span></div>
            </div>

            <div class="divider"></div>

            <?php for ($i = 0; $i < count($serviceInput); $i++) : ?>
                <div class="service-card">
                    <div class="service-name"><?php echo htmlspecialchars($serviceInput[$i]) ?></div>
                    <div class="service-total"><?php echo htmlspecialchars($amountInput[$i]) ?></div>
                </div>
            <?php endfor; ?>

            <div class="sub-total-section">
                <div class="sub-total">
                    <div>Sub Total</div>
                    <div class="sub-total-value">Rs 00,000.00</div>
                </div>
            </div>

            <div class="total-card">
                <span class="label">Total</span>
                <span class="total-value">Rs 00,000.00</span>
            </div>

            <div class="bank-details">
                <div class="bank-detail"><?php echo htmlspecialchars($bankName) ?></div>
                <div class="bank-detail"><?php echo htmlspecialchars($accountNumber) ?></div>
                <div class="bank-detail"><?php echo htmlspecialchars($ifsc) ?></div>
                <div class="bank-detail"><?php echo htmlspecialchars($pan) ?></div>
            </div>

            <div class="message">
                <p>Thanks for collaborating and putting trust in me, If you have any question, feel free to contact me at</p>
                <a href="<?php echo htmlspecialchars($billerEmail) ?>"><?php echo htmlspecialchars($billerEmail) ?></a>
            </div>

        </div>

        <div id="three_buttons">
            <button class="edit">Edit</button>
            <button class="print">Print</button>
            <button class="Save">Save</button>
        </div>
    </div>

</body>
                <script>
                    const buttons_main = document.querySelector('#three_buttons');
                    document.querySelector('.edit').addEventListener('click', () => {
                        window.history.back();
                    });

                    document.querySelector('.print').addEventListener('click', () => {
                        buttons_main.style.display = 'none';
                        window.print();
                    });
                </script>
</html>