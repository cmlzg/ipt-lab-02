<?php

require "helpers/helper-functions.php";

session_start();

$birthdate = $_SESSION['birthdate'];
$birthdateDate = new DateTime($birthdate);
$today = new DateTime();
$age = $today->diff($birthdateDate)->y;

$form_data = $_SESSION;

dump_session();

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
                    <th></th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($form_data as $key => $val): ?>
                <tr>
                    <th><?php echo htmlspecialchars($key); ?></th>
                    <td><?php echo htmlspecialchars($val); ?></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <th>Age</th>
                    <td><?php echo $age; ?></td>
                </tr>
            </tbody>
        </table>


      </div>
    </div>
  </div>
</section>

</body>
</html>
