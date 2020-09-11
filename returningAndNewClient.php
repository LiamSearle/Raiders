<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="stylesheet.css">

  <style>
          /* Style the tab */
      .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        position: absolute;
        top: 20px;
      }

      /* Style the buttons that are used to open the tab content */
      .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
      }

      /* Change background color of buttons on hover */
      .tab button:hover {
        background-color: #ddd;
      }

      /* Create an active/current tablink class */
      .tab button.active {
        background-color: #ccc;
      }

      /* Style the tab content */
      .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
      }
  </style>
</head>
<body>
<div class="navbar">
    <!-- <a class="logo"><img src="images/logo.png" alt=""></a> -->
    <a class="active" href="#"><i class="fas fa-home"></i> Home</a> 
    <a href="#"><i class="fas fa-user"></i> Client</a> 
    <a href="#"><i class="fas fa-address-book"></i> Bookings</a> 
    <div class="button">
        <input type="submit" name="submit" value="Log Out">
    </div>
  </div>
  <div>
    <!-- Tab links -->
<div class="tab">
  <button class="tablinks" onclick="showClient(event, 'return')">Returning Client</button>
  <button class="tablinks" onclick="showClient(event, 'new')">New Client</button>
  
</div>

<!-- Tab content -->
<div id="return" class="tabcontent">
  <h3>This is for returning Clients</h3>
  <p>Bla bla bla.</p>
</div>

<div id="new" class="tabcontent">
  <h3>This is for new Clients</h3>
  <p>Whatever.</p>
</div>

  </div>

<script>
  function showClient(evt, clientType) {
  // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(clientType).style.display = "block";
    evt.currentTarget.className += " active";
  }
</script>

</body>
</html>