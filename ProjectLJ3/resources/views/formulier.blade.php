<!DOCTYPE html> <!-- resources\views\overzicht.php -->
<html lang='nl'>
<head>
    <title>Vul formulier in</title>
    @include('includes/head')
    
</head>
<body style="background-color: #e5e5e5;">
    @include('includes/navbar')
    <div class="container pl-4"> 
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
        echo " <div class='pt-4 pb-4'><h3>Goedemorgen " . $name ."</h3></div>"; 
    } else if ( $Hour >= 12 && $Hour <= 18 ) {
        echo " <div class=' pt-4 pb-4'><h3>Goedemiddag " . $name . "</h3></div>"; 
    } else if ( $Hour >= 19 || $Hour <= 4 ) {
        echo " <div class=' pt-4 pb-4'><h3>Goedeavond " . $name . "</h3></div>"; 
    }
    else 
    {
        echo " <div class=' pt-4'>Welkom " . $userarray[1] . "</div>"; 
    }
    ?>
    <p>Voor dat je een stageplek kan kiezen hebben we wat gegevens nodig</p>
   
    <form class="bg-light" method="post" action="formulier">
    @csrf
    
    <div class="col-lg-6">
        
        <div class="row pt-4" >
            <div class="col-lg-3">
            <h1></h1>
                    <p>Postcode: </p>

            </div>
            <div class="col-lg-9">
                <input type="text" name="postcode" class="form-control"/>
            </div>
        </div>
       
        <div class="row pt-2" >
            <div class="col-lg-3">
                    <p>Voorkeur stage: </p>

            </div>
            <div class="col-lg-9">
                <select name="optionSelect" class="form-control">
                    <option  name='options' value='0' id='options1'>Web</option>
                    <option  name='options' value='1' id='options2'>Programmeren</option>
                </select>
            </div>
        </div>
        <div class="row pt-2" >
            <div class="col-lg-9">
                
            </div>
            <div class="col-lg-3">
                <button type="submit" class="btn btn-primary">Verzenden</button>
            </div>
        </div>
        <div class="row pt-3" >
        </div>
        
        </div>
    </div>
  
    </form>
    </div>
    <!--
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div> -->
    
    </form>
    </div>
    </div>
    @include('includes/scripts')
    @include('includes/footer')
</body>

</html>
