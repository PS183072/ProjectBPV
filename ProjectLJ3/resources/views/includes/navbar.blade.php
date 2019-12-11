<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
      </li>
  <?php
  if(isset($rol))
  {
    if($rol == 1)
    {
      echo "<li class='nav-item'>
      <a class='nav-link' href='mailbedrijven'>Mail bedrijven</a>
    </li>
    <li class='nav-item'>
      <a class='nav-link' href='aanvragen'>Stageplekken Aanvragen</a>
    </li>";
    }
    else if($rol == 0)
    {
      echo "
      <li class='nav-item'>
          <a class='nav-link' href='stagelijst'>Stagelijst</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='formulier'>Formulier</a>
        </li>
      ";
    }
  }
  ?>
      
    </ul>
    <ul class="navbar-nav  navbar-right">
      <?php
      if(empty($email) || empty($username))
      {
        echo "<li class='ml-2'><a class='a-login' href='./login/microsoft'>Log in als student</a></li>";
      }
      else
      {
        echo "<li class='ml-2'><span class='ml-2'> " . $username . "</span> <a class='a-login ml-2' href='logout'>Uitloggen <i class='fas fa-sign-out-alt'></i></a></li>";
      }

      ?> 
    </ul>
  </div>
  </div>
</nav>