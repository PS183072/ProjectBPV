<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        Geachte {{ $name }},      
        <br/>
        <br/>
        Bij deze willen we U uitnodigen om een stageplek aan te vragen via de link hieronder:     
        <br/>
        <?php echo "<a href='http://localhost:8000/enquete?uuid=" . $uuid ."' >Klik hier om de enquete in te vullen</a>";
        ?>
        <br/>
        <br/>
        Met vriendelijke groet,     
        <br/>
        Summa College Eindhoven
    </body>
</html>