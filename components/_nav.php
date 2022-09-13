<?php

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark " >
<div class="container-fluid">
  <a class="navbar-brand" href="/phpprojects">Navbar</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/phpprojects">Home</a>
      </li>';
      if (isset($_SESSION['loggedin'])) {        
        echo '
        <li class="nav-item">
        <a class="nav-link" href="/phpprojects/components/_logout.php">Logout</a>
        </li>';
        }
        else{
            
            echo '        
          <li class="nav-item">
          <a class="nav-link" href="/phpprojects/components/_signin.php">Signin</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="/phpprojects/components/_login.php">Login</a>
          </li>';
        }
        echo '
    </ul>
 </div>
</div>
</nav>
'

?>