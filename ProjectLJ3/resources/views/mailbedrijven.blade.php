<!DOCTYPE html> <!-- resources\views\overzicht.php -->
<html lang='nl'>
<head>
    <title>Bedrijven Mailen</title>
    @include('includes/head')
    
</head>
<body style="background-color: #e5e5e5;">
    @include('includes/navbar')
    <div class="container pl-4">
        <?php
            if (isset($verzonden))
            {
                echo "<h3>Mails Verzonden</h3>";
            }
            else 
            {
                echo "<h3>De knop hieronder verstuurt emails waarmee bedrijven stageplekken kunnen aanmaken</h3>
                <form method='post' action='mailbedrijven'>";
                ?>
                @csrf
                <?php
                echo "<button type='submit' class='btn btn-primary'>Verzend Emails</button>
                </form>";
            }
        ?>
    </div>
    @include('includes/scripts')
    @include('includes/footer')
</body>

</html>
