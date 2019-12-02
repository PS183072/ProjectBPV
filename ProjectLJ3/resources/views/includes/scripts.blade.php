<script integrity="" src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    $(".datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        defaultDate: new Date(2000, 00, 01)
    });
</script>

<script>
var original = document.getElementsByClassName('copyDiv')[0];
function Duplicate() {
  var clone = original.cloneNode(true); 
  original.parentNode.appendChild(clone);
}
function RemoveDuplicate() {
  if (document.getElementsByClassName('copyDiv').length > 1) {
    var select = document.getElementById('parentDiv');
    select.removeChild(select.lastChild);
  }
}
</script>

<script>
  $('input[name="keus1"]').click(function () {
    if (this.value == $('input[name=keus2]:checked').val()) {
      $('input[name=keus2]').prop('checked', false);
    }
  });
  $('input[name="keus2"]').click(function () {
    if (this.value == $('input[name=keus1]:checked').val()) {
      $('input[name=keus1]').prop('checked', false);
    }
  });
</script> 

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwj-rDnilqlih6lYTzFxKRvL3sXEMtUko&libraries=places&callback=initAutocomplete"
         async defer></script>