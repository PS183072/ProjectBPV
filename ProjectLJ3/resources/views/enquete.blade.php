<!DOCTYPE html> <!-- resources\views\overzicht.php -->
<html lang='nl'>
<head>
    <title>Homepage</title>
    @include('includes/head')
    </head>
<body style="background-color: #e5e5e5;">
    <div class="container bg-light mt-4">
        <h3 class="pt-2 pb-2">
        <?php
        session_start();
        $_SESSION['uuid'] = "";
        $BedrijfID = "";
        if(isset($succ69) && !empty($succ69))
        {
            if($succ69 == 1)
            {
                echo "Succes";
            }
            else
            {
                echo "Mislukt";
            }
            echo "</h3>";
        }
        else
        {
            echo "Hallo, ";
            
            foreach($info as $info)
                {
                    $Bedrijfnaam = $info->BedrijfNaam;
                    echo $Bedrijfnaam;
                    $BedrijfID = $info->BedrijfID;
                }
                echo "</h3>";
                
            echo "
            <form method='POST' action='enquete'>";
            ?>
            @csrf
            <?php
            // Maak hidden input met bedrijfid
            if(isset($_GET['uuid']) && !empty($_GET['uuid']))
            {
                $_SESSION["uuid"] = trim( $_GET['uuid'], " ");
            }
            echo '
            <p>Aantal stageplekken</p>
            <div class="form-group">
            <input class="form-control mb-2" value="0" min="0" name="AantalStageplekken" type="number"/>
            <p>Omschrijving</p>
            <textarea name="beschrijving" class="form-control mb-2" type="textarea"></textarea>
            <p>Type stage</p>
            <select name="optionSelect" class="form-control ">
                <!-- TODO: opties uit db halen -->
                <option  name="options" value="0" id="options1">Web</option>
                <option  name="options" value="1" id="options2">Programmeren</option>
            </select>
            </div>
            <button class="btn btn-primary mb-4" type="submit">Enquete verzenden</button>
            </form>
            ';
        }
        ?>
        
        
        <?php
            //echo $info;
        ?>
        @include('includes/scripts')
        @include('includes/footer')
    </div>
</body>

</html>