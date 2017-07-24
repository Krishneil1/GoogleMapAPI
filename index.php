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
            <div class='col-xs-6'><input type='text' class='form-control address-field' id='address'></div>
         </div>
         <div class='row'>
            <div class='col-xs-4 text-right'>Suburb</div>
            <div class='col-xs-6'><input type='text' class='form-control suburb-field' id='suburb'></div>
         </div>
         <div class='row'>
            <div class='col-xs-4 text-right'>State</div>
            <div class='col-xs-6'><input type='text' class='form-control state-field' id='state'></div>
         </div>
         <div class='row'>
            <div class='col-xs-4 text-right'>Post Code</div>
            <div class='col-xs-6'><input type='text' class='form-control postcode-field' id='postcode'></div>
         </div>
      </div>
      <script src='https://code.jquery.com/jquery-1.12.4.min.js'></script>
      <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places'></script>
   </body>
</html>