    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!--  <script type="text/javascript" src="{{URL::asset('js/jquery-2.2.3.min.js')}}"></script> -->
    <script type="text/javascript" src="{{URL::asset('js/mdb.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/tether.js')}}"></script>
    
    <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>  
    
    <script type="text/javascript" src="{{URL::asset('js/jquery-ui.js')}}"></script>
    <script type="text/javascript">
    	$('#auto').autocomplete({
			  source: "{{route('search.autosuggest')}}",
			  focus: function(event, ui) {
			    $(this).val(ui.item.label);
			    return false;
			  },
			  select: function(event, ui) {
			    $('#auto').val(ui.item.value);
			    $(this).val(ui.item.label);
			    return false;
			  }
			});
    </script>

 