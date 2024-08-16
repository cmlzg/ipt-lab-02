<?php

require "helpers/helper-functions.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contact_number = $_POST['contact_number'];
    $program = $_POST['program'];
    $agree = isset($_POST['agree']) ? $_POST['agree'] : '';

    if (empty($contact_number) || empty($program) || empty($agree)) {
        header('Location: step-3.php');
        exit();
    }

    $_SESSION['contact_number'] = $contact_number;
    $_SESSION['program'] = $program;
    $_SESSION['agree'] = $agree;
    header('Location: thank-you.php');
    exit();
}
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
        <h1>Registration (Step 3/3)</h1>
      </div>
      <div class="p-section--shallow">
        <form action="" method="POST">
          <fieldset>
            <label>Contact Number</label>
            <input type="text" name="contact_number" placeholder="+639123456789" required />
            <label>Program</label>
            <select name="program" required>
              <option disabled="disabled" selected="">Select an option</option>
              <option value="cs">Computer Science</option>
              <option value="it">Information Technology</option>
              <option value="is">Information Systems</option>
              <option value="se">Software Engineering</option>
              <option value="ds">Data Science</option>
            </select>

            <label class="p-checkbox--inline">
              <input type="checkbox" name="agree" required>
            </label>
            I agree to the terms and conditions...

            <br />
            <br />

            <button type="submit" class="p-button--positive">Finish</button>
          </fieldset>

        </form>


      </div>

    </div>

    <div class="col">
      <div class="p-image-container--3-2 is-cover">
        <img class="p-image-container__image" src="https://www.auf.edu.ph/home/images/ittc.jpg" alt="">
      </div>
    </div>

  </div>
</section>

</body>
</html>
