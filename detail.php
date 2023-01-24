<?php 
$id = $_GET['id'];
include_once "ambildata_id.php";
$obj = json_decode($data);
$titles="";
$ids="";
$murid="";
$guru="";
$pegawai="";
$alamat="";
$R_Kelas="";
$R_Lab="";
$lat="";
$long="";
foreach($obj->results as $item){
  $titles.=$item->Nama_Sekolah;
  $ids.=$item->No;
  $murid.=$item->Murid;
  $guru.=$item->Guru;
  $pegawai.=$item->Pegawai;
  $alamat.=$item->Alamat;
  $R_Kelas.=$item->R_Kelas;
  $R_Lab.=$item->R_Lab;
  $lat.=$item->latitude;
  $long.=$item->longitude;
}

$title = "Detail dan Lokasi : ".$titles;
include_once "header.php"; ?>
  <script>
     function GetMap()
    {
        map = new Microsoft.Maps.Map('#myMap', {});
        var loc = new Microsoft.Maps.Location(<?php echo $lat ?>,<?php echo $long ?>);
        pin = new Microsoft.Maps.Pushpin(loc);
       
        map.entities.push(pin);
    }
    </script>
    </script>
<script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AvE8YVO94ZYMQt3bMKe6y3TPmo_ivHym6Yu5rMBJwbovXRwy_125il03MRAuBJcN' async defer></script>
      <div class="row">
      <div class="col-md-5">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Lokasi - </strong></h4>
            </div>
            <div class="panel-body">
              <div id="myMap" style="width:100%;height:380px;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Detail - </strong></h4>
            </div>
            <div class="panel-body">
             <table class="table">
               <tr>
                 <th>Item</th>
                 <th>Detail</th>
               </tr>
               <tr>
                 <td>Nama Perusahaan</td>
                 <td><h4><?php echo $titles ?></h4></td>
               </tr>
               <tr>
                 <td>Ruang Kelas</td>
                 <td><h4><?php echo $R_Kelas ?></h4></td>
               </tr>
               <tr>
                 <td>Ruang Lab</td>
                 <td><h4><?php echo $R_Lab ?></h4></td>
               </tr>
               <tr>
                 <td>Alamat</td>
                 <td><h4><?php echo $alamat ?></h4></td>
               </tr>
               <tr>
                 <td>Pegawai</td>
                 <td><h4><?php echo $pegawai ?></h4></td>
               </tr>
               <tr>
                 <td>Guru</td>
                 <td><h4> <?php echo $guru ?></h4></td>
               </tr>
             </table>
            </div>
            </div>
          </div>

        
        </div>
      </div>
    </div>
    <?php include_once "footer.php"; ?>