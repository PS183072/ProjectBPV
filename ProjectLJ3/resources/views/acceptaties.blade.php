<!DOCTYPE html> <!-- resources\views\overzicht.php -->
<html lang='nl'>
<head>
    <title>Accepteer Stageplekken</title>
    @include('includes/head')
    
</head>
<body style="background-color: #e5e5e5;">
@include('includes/navbar')
<div class="container">
<form action='aanvragen' method='POST'>
@csrf
    <?php
    $DomDing = "";
    $DomDing = $DomDing .  "<table class='table bg-light mt-4 table-condensed'>";
        $DomDing = $DomDing .  " <thead>
        <tr>
          <th scope='col'>Omschrijving</th>
          <th scope='col'>Type</th>
          <th scope='col'>Accepteer</th>
          <th scope='col'>Weiger</th>
        </tr>
      </thead><tbody>";
    foreach($lijst as $ls)
    {   
            $StageplekTypeString = "";
            $StageplekOmschrijving = $ls->StageplekOmschrijving;
            $StageplekID = $ls->StageplekID;
            $StageplekType = $ls->subtypeID;
            if($StageplekType == 1)
            {
                $StageplekTypeString = "Programmeren";
            }
            else
            {
                $StageplekTypeString = "Web-development";
            }
            $DomDing = $DomDing .  "<tr><td>" . $StageplekOmschrijving . "</td><td>" . $StageplekTypeString . "</td><td><button class='btn btn-success' name='btna' type='submit' value='" . $StageplekID . "'>Accepteer</button></td><td><button name='btnw' class='btn btn-danger' type='submit' value='" . $StageplekID . "'>Weiger</button></tr>";
    }
    echo $DomDing;
    ?>
    </tbody>
    </table>
    </form>
    </div>
</body>