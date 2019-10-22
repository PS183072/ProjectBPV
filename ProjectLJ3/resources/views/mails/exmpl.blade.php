@component('mail::message')
Hallo **{{$name}}**,    
De inschrijving voor stageplekken staat nu open  
Klik op de knop om te beginnen
@component('mail::button', ['url' => $link])
Inschrijven
@endcomponent    
Met vriendelijke groet,  
Summa College Eindhoven
@endcomponent