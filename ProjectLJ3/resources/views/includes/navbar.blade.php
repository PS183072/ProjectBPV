<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav  navbar-right">
      <?php
      if(empty($email) || empty($username))
      {
        echo "<li class='ml-2'><a class='a-login' href='login/microsoft'>Log in als student</a></li>
        <li class='ml-2'><a class='a-login' href='#about'>Log in als bedrijf</a></li>";
      }
      else
      {
        echo "<li class='ml-2'>" . $username . "<span class='ml-2'>( " . $email . "</span> )<a class='a-login ml-2' href='logout'>Log uit</a></li>";
      }

      ?>
      
    </ul>
  </div>
  </div>
</nav>