<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        Geachte {{ $name }},      
        <br/>
        <br/>
        Wij sturen deze mail omdat we U willen herinneren dat U uitgenodigd bent om een stageplek aan te vragen bij het Summa College.
        Deze aanvraag kunt U versturen via deze link: 
        <br/>
        <?php echo "<a href='http://localhost:8000/enquete?uuid=" . $uuid ."' >Klik hier om een stageverzoek in te dienen</a>";
        ?>
        <br/>
        <br/>
        Met vriendelijke groet,     
        <br/>
        Summa College Eindhoven
    </body>
</html>