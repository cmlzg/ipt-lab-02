<?php

require "helpers/helper-functions.php";

session_start();


$birthdate = $_SESSION['birthdate'] ?? 'N/A';
$fullname = $_SESSION['fullname'] ?? 'N/A';
$contact_number = $_SESSION['contact_number'] ?? 'N/A';
$sex = $_SESSION['sex'] ?? 'N/A';
$program = $_SESSION['program'] ?? 'N/A';
$address = $_SESSION['address'] ?? 'N/A';
$email = $_SESSION['email'] ?? 'N/A';


$birthdateDate = new DateTime($birthdate);
$today = new DateTime();
$age = $today->diff($birthdateDate)->y;


$csv_file_path = 'registrations.csv';


$file_handle = fopen($csv_file_path, 'a');


if ($file_handle !== false) {
    $csv_data = [
        $fullname,
        $birthdate,
        $age,
        $contact_number,
        $sex,
        $program,
        $address,
        $email
    ];

    
    fputcsv($file_handle, $csv_data);

   
    fclose($file_handle);
}


session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>
<body>
  
<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>Thank You Page</h1>
      </div>
      <div class="p-section--shallow">

        <table aria-label="Session Data">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Complete Name</th>
                    <td><?php echo htmlspecialchars($fullname); ?></td>
                </tr>
                <tr>
                    <th>Birthday</th>
                    <td><?php echo htmlspecialchars($birthdate); ?></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><?php echo htmlspecialchars($age); ?></td>
                </tr>
                <tr>
                    <th>Contact Number</th>
                    <td><?php echo htmlspecialchars($contact_number); ?></td>
                </tr>
                <tr>
                    <th>Sex</th>
                    <td><?php echo htmlspecialchars($sex); ?></td>
                </tr>
                <tr>
                    <th>Program</th>
                    <td><?php echo htmlspecialchars($program); ?></td>
                </tr>
                <tr>
                    <th>Complete Address</th>
                    <td><?php echo htmlspecialchars($address); ?></td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td><?php echo htmlspecialchars($email); ?></td>
                </tr>
            </tbody>
        </table>

      </div>
    </div>
  </div>
</section>

</body>
</html>
