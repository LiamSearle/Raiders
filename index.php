<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">
  <title>Employees</title>

  <style>
    .column {
      /*controls column in aboutus page*/
      float: left;
      width: 50%;
      margin-bottom: 16px;
      padding: 0px 8px;
    }
  </style>
</head>

<body>
  <div class="topright">
    <a href="navigationbar.html"><img src="images/firstpage.png" style="width:42px;height:42px;"></a>
  </div>
  <img src="images/small_logo.png" height="110px">
  <div>
    <fieldset>


      <div class="row">
        <div class="column">
          <div class="card">
            <div class="container">
              <img src="images/admin.jpg" height="100px">
              <a href=raiders.php>
                <h2>Administration</h2>
              </a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="column">
            <div class="card">
              <div class="container">
                <img src="images/icon.png" height="100px">
                <a href=depotadminlogin.php>
                  <h2>Depot Admin</h2>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <div class="container">
              <img src="images/driver.png" height="100px">
              <a href=driverlogin.php>
                <h2>Driver</h2>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <div class="container">
            <img src="images/hr.png" height="100px">
            <a href=hrlogin.php>
              <h2>Human Resources</h2>
            </a>
          </div>
        </div>
      </div>
  </div>



  </fieldset>
  </div>


</body>

</html>