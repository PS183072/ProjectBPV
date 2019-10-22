<!DOCTYPE html> <!-- resources\views\overzicht.php -->
<html lang='nl'>
<head>
    <title>Homepage</title>
    @include('includes/head')
    </head>
<body style="background-color: #e5e5e5;">
    <div class="container bg-light">
        <h1>
        <?php
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
        }
        ?>
        </h1>
        <form method='POST' action='enquete'>
        @csrf
        <?php
        // Maak hidden input met bedrijfid
        echo "<input type='hidden' name='uuid' value='
        "; if(!empty($_GET['uuid'])) { echo trim( $_GET['uuid'], " "); }  echo "'/>";
        ?>
        <button class="btn btn-primary" type="submit">Enquete verzenden</button>
        </form>
        <?php
            //echo $info;
        ?>
        @include('includes/scripts')
        @include('includes/footer')
    </div>
</body>

</html>