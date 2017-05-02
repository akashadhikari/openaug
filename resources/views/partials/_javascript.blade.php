<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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