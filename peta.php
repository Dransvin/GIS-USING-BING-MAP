<?php
$title = "Peta Persebaran SD";
include_once "header.php";
?>

<script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AvE8YVO94ZYMQt3bMKe6y3TPmo_ivHym6Yu5rMBJwbovXRwy_125il03MRAuBJcN' async defer></script>
<script>
    var map, infobox;

    function GetMap() {
        map = new Microsoft.Maps.Map('#myMap', {});

        //Create an infobox at the center of the map but don't show it.
        infobox = new Microsoft.Maps.Infobox(map.getCenter(), {
            visible: false
        });

        //Assign the infobox to a map instance.
        infobox.setMap(map);

        //Create random locations in the map bounds.
        
var officeLocations = [
<?php
$data = file_get_contents('http://localhost/ambildata.php');
                $no=1;
                if(json_decode($data,true)){
                  $obj = json_decode($data);
                  foreach($obj->results as $item){
?>
[<?php echo $item->longitude ?>, <?php echo $item->latitude ?>,'<?php echo $item->Nama_Sekolah ?>','<?php echo $item->Alamat ?>'],
<?php 
}
} 
?>    
];



      for (var i = 0; i < officeLocations.length; i++) {
          
        var office = officeLocations[i];
        var loc = new Microsoft.Maps.Location(office[1], office[0]);
        pin = new Microsoft.Maps.Pushpin(loc);
        map.entities.push(pin);
       
            pin.metadata = {
                title:  office[2],
                description: 'Alamat : <br> ' + office[3]
            };
            //Add a click event handler to the pushpin.
            Microsoft.Maps.Events.addHandler(pin, 'click', pushpinClicked);
            //Add pushpin to the map.
            map.entities.push(pin);
        }
    }

    function pushpinClicked(e) {
        //Make sure the infobox has metadata to display.
        if (e.target.metadata) {
            //Set the infobox options with the metadata of the pushpin.
            infobox.setOptions({
                location: e.target.getLocation(),
                title: e.target.metadata.title,
                description: e.target.metadata.description,
                visible: true
            });
        }
    }
    </script>
      <div class="row">

        <div class="col-md-12">
          <div class="panel panel-info panel-dashboard centered">
            <div class="panel-heading" style="background: azure;">
              <h2 class="panel-title"><strong> - TAMPILAN PETA - </strong></h2>
            </div>
            <div class="panel-body">
              <div id="myMap" style="width:100%;height:380px;"></div>

            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
<?php include_once "footer.php"; ?>