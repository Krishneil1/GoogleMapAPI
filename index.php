<!doctype html>
<html>
   <head>
      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' type='text/css' />
      <title>Discovery Rentals Test</title>
   </head>
   <body>
      <div class='container'>
         <div class='row'>
            <h1>Discovery Test</h1>
            <p>This test will assess how well you can work with a Google API.</p>
            <p>As an address is typed into the address field (top field), the Google Maps API should be queried to return a list of addresses which match the string entered.</p>
            <p>This should be done as the user is typing - eg: an autocomplete field.</p>
            <p>When an autocomplete option is clicked, the address should be parsed and the other fields should automatically be filled with the relevant data. (eg: suburb, state, post code).</p>
            <h2>Example</h2>
            <p>User enters: "3 Dennis", a list of available options appears:</p>
            <ul>
               <li>3 Dennis Road, Springwood, Queensland, Australia</li>
               <li>3 Dennis Close, Calamvale, Queensland, Australia</li>
               <li>3 Dennis Vale Drive, Daisy Hill, Queensland, Australia</li>
               <li>etc.</li>
            </ul>
            <p>The google maps API has been included, and the documentation can be found at:<a href='https://developers.google.com/maps/documentation/javascript/tutorial'>https://developers.google.com/maps/documentation/javascript/tutorial</a>
         </div>
         <div class='row'>
            <div class='col-xs-4 text-right'>Address</div>
            <div class='col-xs-6'><input type='text' class='form-control address-field' id='street_number'></div>
			<input id="route" style="display:none"/>
		 </div>
         <div class='row'>
            <div class='col-xs-4 text-right'>Suburb</div>
            <div class='col-xs-6'><input type='text' class='form-control suburb-field' id='locality'></div>
         </div>
         <div class='row'>
            <div class='col-xs-4 text-right'>State</div>
            <div class='col-xs-6'><input type='text' class='form-control state-field' id='administrative_area_level_1'></div>
         </div>
         <div class='row'>
            <div class='col-xs-4 text-right'>Post Code</div>
            <div class='col-xs-6'><input type='text' class='form-control postcode-field' id='postal_code'></div>
         </div>
      </div>
      <script src='https://code.jquery.com/jquery-1.12.4.min.js'></script>
      <script>

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
		route:'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'long_name',
        postal_code: 'short_name',
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('street_number')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
		document.getElementById('street_number').value = document.getElementById('street_number').value+' '+document.getElementById('route').value;
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_Qf8TYV9CLEngR4Fioj-S9_QVX9amC7Y&libraries=places&callback=initAutocomplete"
        async defer></script>
   </body>
</html>