<!DOCTYPE html> <!-- resources\views\overzicht.php -->
<html lang='nl'>
<head>
    <title>Bedrijven Mailen</title>
    @include('includes/head')
    
</head>
<body style="background-color: #e5e5e5;">
    @include('includes/navbar')
    <div class="container pl-4"> 
    <form method="get" action="mailen">
    <button type="submit">Test mail verzenden</button>
    </form>
    </div>
    @include('includes/scripts')
    @include('includes/footer')
</body>

</html>
