<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= '/../config.php';
    $config = require_once($path);
    $apiKey = $config['google_api'];
?>
<div class="col-12-sm padding-top">
    <hr />
    <h2 class="centered">Google's Geocoding API</h2>
    <div class="description centered">
        Simple use of Google's Geocoding API.  Click the button below to show your location details.
    </div>
    <div id="address-details" class="centered padding-top">
        <div class="details-container"></div>
        <div class="button-container">
            <button id="geocode" type="button" class="call-to-action">Get My Address</button>
            <div class="loading"></div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('#geocode').on('click',function(){
            var $this = $(this);
            if ($this.hasClass('disabled')){
                return false;
            }

            $this.addClass('disabled');
            if ("geolocation" in navigator) {
                $('#address-details .details-container').html('');

                $this.addClass('disabled');
                $this.siblings('.loading').fadeIn();
                navigator.geolocation.getCurrentPosition(function(position) {
                    var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&key=<?php echo $apiKey; ?>';
                    $.get(url, function(response){
                        if (response.status !== 'OK'){

                        } else {
                            var html = buildHtml(response);
                            $('#address-details .details-container').html(html);
                        }
                        $this.removeClass('disabled');
                        $this.siblings('.loading').hide();
                    }, 'json')
                });

            } else {
                /* geolocation IS NOT available */
                $this.removeClass('disabled');
            }

        })

        function buildHtml(response){
            var lat = response.results[0].geometry.location.lat;
            var lng = response.results[0].geometry.location.lng;
            var address = response.results[0].formatted_address;

            var html = '<div class="address"><span class="bold">Your Address:</span> ' + address + '</div>';
            html += '<div class="latlng"><span class="bold">Your Latitude and Longitude:</span> ' + lat + ', ' + lng + '</div>';
            return html;
        }
    })
</script>