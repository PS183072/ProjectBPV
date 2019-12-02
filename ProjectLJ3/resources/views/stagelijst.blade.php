<!DOCTYPE html> <!-- resources\views\overzicht.php -->
<html lang='nl'>
<head>
    <title>Vul formulier in</title>
    @include('includes/head')
    
</head>
<body style="background-color: #e5e5e5;">
    @include('includes/navbar')
    <div class="container"> 
    <?php
    // I'm India so my timezone is Asia/Calcutta
    date_default_timezone_set('Europe/Amsterdam');

    // 24-hour format of an hour without leading zeros (0 through 23)
    $Hour = date('G');

    $userarray = explode(",", $username);
    $user = $userarray[0] . $userarray[1];
    $userarray2 = explode(" ", $user);
    
    if(!empty($request) && isset($request))
    {

        echo $request;
    }
    $name = "";
    if (count($userarray2) == 2) {
        $name = $userarray2[1] . " " . $userarray2[0];
    }
    else if (count($userarray2) == 3) {
        $name = $userarray2[1] . " " . $userarray2[2] . " " . $userarray2[0];
    }
    else if (count($userarray2) == 4) {
        $name = $userarray2[1] . " " . $userarray2[2] . " " . $userarray2[3] . " " . $userarray2[0];
    }
    else {
        $name = "Error";
    }
    if ( $Hour >= 5 && $Hour <= 11 ) {
        echo " <div class='ml-2 pt-4 pb-4'><h3>Goedemorgen " . $name ."</h3></div>"; 
    } else if ( $Hour >= 12 && $Hour <= 18 ) {
        echo " <div class='ml-2 pt-4 pb-4'><h3>Goedemiddag " . $name . "</h3></div>"; 
    } else if ( $Hour >= 19 || $Hour <= 4 ) {
        echo " <div class='ml-2 pt-4 pb-4'><h3>Goedeavond " . $name . "</h3></div>"; 
    }
    else 
    {
        echo " <div class='ml-2 pt-4'>Welkom " . $userarray[1] . "</div>"; 
    }
    ?>
  
    <div class="p-4 form-group ml-2 bg-light">
    <form action="aanvraag" method="post">
    @csrf
    <?php
    // Check hier de voorkeur    
        
    //$voorkeur2 = json_decode($voorkeur, true);
    //$vk = $voorkeur2[0]["voorkeur"];
    $DomDing = "";
    $Header = true;
   
    if($vk == -1)
    {
        $DomDing = $DomDing .  "U heeft twee keuzes gemaakt. Deze bestaan uit: </br>";
        foreach ($aanvragen as $av) {
            
            //$totaalaantalstageplekken++;
            
            $BedrijfNaam = $av->BedrijfNaam;
            $BedrijfStraat = $av->BedrijfStraat;
            $BedrijfStraatNr = $av->BedrijfStraatNr;
            $BedrijfPlaats = $av->BedrijfPlaats;
            $StageplekOmschrijving = $av->StageplekOmschrijving;
            $AanvraagDatum = $av->AanvraagDatum;
            $Keuze = $av->Eerstekeuze;
            if($Keuze == 1)
            {
                $DomDing = $DomDing .   "<div class='bg-white p-4 mb-4 mt-4' >";
                $DomDing = $DomDing .  "<b>1ste keuze</b>: </br>";
                $DomDing = $DomDing .  "Bedrijf naam: " . $BedrijfNaam . "</br>";
                $DomDing = $DomDing .  "Bedrijf adres: " . $BedrijfStraat . " " . $BedrijfStraatNr . "</br>";
                $DomDing = $DomDing .  "Omschrijving: " . $StageplekOmschrijving . "</br>";
                $DomDing = $DomDing .  "</div>";
            }
            else if($Keuze == 0)
            {
                $DomDing = $DomDing .   "<div  class='bg-white p-4'>";
                $DomDing = $DomDing .  "<b>2de keuze</b>: </br>";
                $DomDing = $DomDing .  "Bedrijf naam: " . $BedrijfNaam . "</br>";
                $DomDing = $DomDing .  "Bedrijf adres: " . $BedrijfStraat . " " . $BedrijfStraatNr . "</br>";
                $DomDing = $DomDing .  "Omschrijving: " . $StageplekOmschrijving . "</br>";
                $DomDing = $DomDing .  "</div>";
            }
            //$StageplekOmschrijving = $sp->StageplekOmschrijving;
            //$StageplekStraat = $sp->StageplekStraat;
            //$StageplekStraatNr = $sp->StageplekStraatNr;
            //$StageplekID = $sp->StageplekID;
            //$StageplekType = $sp->Type;


            //$DomDing = $DomDing .  "<tr><td>" . $BedrijfID . "</td><td>" . $StageplekOmschrijving . "</td><td>" . $StageplekStraat . " " . $StageplekStraatNr . "</td><td>" . "<input name='keus1' value=" . $StageplekID ." type='radio'></input>" . "</td><td>" . "<input name='keus2' value=" . $StageplekID ." type='radio'></input>" . "</td><td>" .  "</td></tr>";
        }
    }
    else if(empty($vk))
    {
        echo $vk;
        $DomDing = $DomDing .  "Vul alstublieft eerst het <a href='formulier'>formulier</a> in. ";  
   
    }
    else
    {
        foreach ($subtype as $sp) {
            $subtype = $sp->Naam;
        }
        // Debugging
            //echo $stageplekken;
        //
        ////// TEST ///////
            $totaalaantalstageplekken = 0;
            $DomDing = $DomDing .  "<div class='row mb-4'><div class='col-11'>Ik zie dat je hebt gekozen voor " . $subtype .".</br>";
            $DomDing = $DomDing .  "Hier is een lijst met " . $subtype ." stageplekken. Aan jou de keuze.</div>";
            $DomDing = $DomDing .  "<div class='col-1'><button class='btn btn-primary'>Save</button></div></div>";
            $DomDing = $DomDing .  "<table class='table table-condensed'>";
            $DomDing = $DomDing .  " <thead>
            <tr>
              <th scope='col'>Naam</th>
              <th scope='col'>Plaats</th>
              <th scope='col'>Adres</th>
              <th scope='col'>Postcode</th>
              <th scope='col'>Contactpersoon</th>
              <th scope='col'>Telefoon</th>
              <th scope='col'>Omschrijving</th>
              <th scope='col'>1e</th>
              <th scope='col'>2e</th>
            </tr>
          </thead><tbody>";
          if(isset($stageplekken))
          {
            $DomDing = $DomDing .  "<tr class='thead-dark'><th>" . $subtype ." </th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>";
            foreach ($stageplekken as $sp) {
                $totaalaantalstageplekken++;
                $BedrijfID = $sp->BedrijfID;
                $StageplekOmschrijving = $sp->StageplekOmschrijving;
                $StageplekID = $sp->StageplekID;
                $StageplekType = $sp->subtypeID;
                $Bedrijfnaam = $sp->BedrijfNaam;
                $Bedrijfplaats = $sp->BedrijfPlaats;
                $BedrijfContactpersoon = $sp->BedrijfContactpersoon;
                $BedrijfTel = $sp->BedrijfTel;
                $BedrijfStraat = $sp->BedrijfStraat . " " . (string) $sp->BedrijfStraatNr;
                $BedrijfPostcode = $sp->BedrijfPostcode;

                if($StageplekType == 0 && $Header == true)
                {
                    $DomDing = $DomDing .  "<tr class='thead-dark'><th>Web  </th><th></th><th></th><th></th><th></th><th></th><th></th></tr>";
                    $Header = false;
                }
                $DomDing = $DomDing .  "<tr><td>" . $Bedrijfnaam . "</td><td>" . $Bedrijfplaats . "</td><td>" . $BedrijfStraat . "</td><td>" . $BedrijfPostcode . "</td><td>" . $BedrijfContactpersoon . "</td><td>" . $BedrijfTel . "</td><td>" . $StageplekOmschrijving . "</td><td>" . "<input name='keus1' value=" . $StageplekID ." type='radio'></input>" . "</td><td>" . "<input name='keus2' value=" . $StageplekID ." type='radio'></input>" . "</td></tr>";
            }
            $DomDing = $DomDing .  "</tbody></table>";
            // $DomDing = $DomDing .  al de stageplekken waar de categorie van de student gelijk is aan de categorie van de stageplek
        
          }
            
        ////////// TEST //////////
    }
    echo $DomDing;
    

?>
    </div>
    <!--
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div> -->
    </form>
    </div>
    
    @include('includes/scripts')
    @include('includes/footer')
</body>

</html>
