<!DOCTYPE html> <!-- resources\views\overzicht.php -->
<html lang='nl'>
<head>
    <title>Bedrijven Mailen</title>
    @include('includes/head')
    
</head>
<body style="background-color: #e5e5e5;">
    @include('includes/navbar')
    <div class="container pl-4 pt-4"> 
    <?php 
    if (isset($message) && !empty($message))
    {
        echo "<h1>" . $message . "</h1>";
    }
    else 
    {
        echo '<form method="get" action="mailen">
        <button class="btn btn-primary mb-4" name="MailAllen1" value="1" type="submit">Alle bedrijven mailen</button>
        <button class="btn btn-success mb-4" name="MailAllen2" value="1" type="submit">Herinneringsmail naar iedereen</button>
        <button class="btn btn-danger mb-4" name="Stop" value="1" type="submit">Stop toegang naar enquete</button>
        </form>
        <form method="post" action="mailen1">';
    }
?>
    
    @csrf
    <?php
    if (isset($message) && !empty($message))
    {
        
    }
    else {
        
        $DomDing = "";
        $DomDing = $DomDing .  "<table class='table bg-light table-condensed'>";
            $DomDing = $DomDing .  " <thead>
            <tr>
              <th scope='col'>Naam</th>
              <th scope='col'>Mail</th>
            </tr>
          </thead><tbody>";
        foreach($bedrijven as $ls)
        {
            $disabled;
            $disabled2;
            if ($ls->MailingID == "" || $ls->MailingID == null) 
            {
                $disabled = "";
                $disabled2 = "disabled";
            }
            else 
            {
                $disabled = "disabled";
                $disabled2 = "";
            }

                $BedrijfID = $ls->BedrijfID;
                $BedrijfNaam = $ls->BedrijfNaam;
                $DomDing = $DomDing .  "<tr><td>" . $BedrijfNaam . "</td><td><button class='btn btn-primary' name='mail' type='submit' value='" . $BedrijfID . "'". $disabled . ">Mail</button><button class='btn btn-success ml-4' name='mail2' type='submit' value='" . $BedrijfID . "'". $disabled2 . ">Herinneringsmail</button></td></tr>";
        }
        echo $DomDing;
    }
    ?>
    </form>
    </div>
    @include('includes/scripts')
    @include('includes/footer')
</body>

</html>
