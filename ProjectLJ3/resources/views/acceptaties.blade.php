<!DOCTYPE html> <!-- resources\views\overzicht.php -->
<html lang='nl'>
<head>
    <title>Accepteer Stageplekken</title>
    @include('includes/head')
    
</head>
<body style="background-color: #e5e5e5;">
<div class="container">
    <?php
    $DomDing = "";
    $DomDing = $DomDing .  "<table class='table table-condensed'>";
        $DomDing = $DomDing .  " <thead>
        <tr>
          <th scope='col'>Omschrijving</th>
          <th scope='col'>Type</th>
        </tr>
      </thead><tbody>";
    foreach($lijst as $ls)
    {   
            $StageplekTypeString = "";
            $StageplekOmschrijving = $ls->StageplekOmschrijving;
            $StageplekID = $ls->StageplekID;
            $StageplekType = $ls->Type;
            if($StageplekType == 1)
            {
                $StageplekTypeString = "Programmeren";
            }
            else
            {
                $StageplekTypeString = "Web-development";
            }
            $DomDing = $DomDing .  "<tr><td>" . $StageplekOmschrijving . "</td><td>" . $StageplekTypeString . "</tr>";
    }
    echo $DomDing;
    ?>
    </div>
</body>