<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
</head>

<body></body>

</html>
<?php
Date_default_timezone_set('Asia/Riyadh');
session_start();
$my_array = $_SESSION['my_array'];
$today = date('l');
echo $today;
//echo $my_array[$today]['temperatures'];
echo '<br>';
print_r($my_array);
$my_days = array_keys($my_array);
// print_r($my_days);
$my_days_keys = array_keys($my_array[$today]);
print_r($my_days_keys);
$now = date('h');
// $now = 1;
$temp;
?>
<section class="vh-100">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-7 col-xl-5">
        <div
          id="wrapper-bg"
          class="card text-white bg-image shadow-4-strong"
          style="background-size:cover;">
          <!-- Main current data -->
          <div class="card-header p-4 border-0">
            <div class="text-center mb-3">
              <p class="h2 mb-1" id="wrapper-name"></p>
              <p class="mb-1" id="wrapper-description"></p>
              <p class="display-1 mb-1" id="wrapper-temp"></p>
              <span class="">Pressure: <span id="wrapper-pressure"></span></span>
              <span class="mx-2">|</span>
              <span class="">Humidity: <span id="wrapper-humidity"></span></span>
            </div>
          </div>

          <!-- Hourly forecast -->
          <div class="card-body p-4 border-top border-bottom mb-2">
            <div class="row text-center">

              <?php for ($i = $now - 2; $i < $now + 4 && $i < 24; $i++) {
              ?>
                <div class="col-2">
                  <strong class="d-block mb-2"><?= $i + 1 == $now ? 'Now' : $i + 1; ?></strong>
                  <img id="wrapper-icon-hour<?= $i + 1 == $now ? '-now' : $i + 1; ?>" src="" class="" alt="" />
                  <strong class="d-block" id="wrapper-hour<?= $i + 1 == $now ? '-now' : $i + 1; ?>"></strong>
                </div>
              <?php } ?>
            </div>
          </div>

          <!-- Daily forecast -->
          <div class="card-body px-5">
            <?php for ($i = 0; $i < 7; $i++) {

            ?>
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <strong><?= $my_days[$i] ?></strong>
                </div>

                <div class="col-lg-2 text-center">
                  <img id="wrapper-icon-tomorrow" src="" class="w-100" alt="" />
                </div>

                <div class="col-lg-4 text-end">
                  <span class="wrapper-forecast-temp-tomorrow"></span>
                </div>
              </div>
            <?php } ?>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  // API call
  let queryUrl = "https://api.openweathermap.org/data/2.5/onecall?";
  let lat = "lat=52.229676&";
  let lon = "lon=21.012229&";
  let apiOptions = "units=metric&exclude=minutely,alerts&";
  let apiKey = "appid=dbb76c5d98d5dbafcb94441c6a10236e";
  let file = queryUrl + lat + lon + apiOptions + apiKey;


  // Weather main data
  let main = "<?= $my_days_keys[1] ?>";
  let description = main + 'y';
  let pressure = <?= $my_array[$today][$my_days_keys[2]] ?>;
  let humidity = <?= $my_array[$today][$my_days_keys[3]] ?>;
  let name = '<?= $_REQUEST['name'] ?>';
  document.getElementById("wrapper-bg").style.backgroundImage =
    "url('assets/" + main + ".gif')";

  document.getElementById("wrapper-description").innerHTML = description;
  document.getElementById("wrapper-pressure").innerHTML = pressure;
  document.getElementById("wrapper-humidity").innerHTML = humidity + "°C";
  document.getElementById("wrapper-name").innerHTML = name;

  // Weather hourly data

  <?php $temp = $now - 2; ?>
  for (let index = <?= $now - 2 ?>; index <= <?= $now + 4 ?>; index++) {

    alert(index);

    if (<?= $now ?> == index + 1) {
      document.getElementById("wrapper-hour-now").innerHTML = <?= $my_array[$today]['temperatures'][$temp] ?> + "°";
      document.getElementById("wrapper-temp").innerHTML = <?= $my_array[$today]['temperatures'][$temp] ?> + "°C";


    } else {
      let tempIdName = "wrapper-hour" + (index + 1);
      console.log(tempIdName);
      document.getElementById(tempIdName).innerHTML = <?= $my_array[$today]['temperatures'][$temp] ?> + "°";
    }
    <?php $temp++ ?>
  }



  document.getElementById("wrapper-time1").innerHTML = time1;
  document.getElementById("wrapper-time2").innerHTML = time2;
  document.getElementById("wrapper-time3").innerHTML = time3;
  document.getElementById("wrapper-time4").innerHTML = time4;
  document.getElementById("wrapper-time5").innerHTML = time5;

  // Weather daily/. data
  const week =
    <?php echo "[";
    foreach ($my_array as $days => $data) {
      echo round(array_sum($my_array[$days]['temperatures']) / count($my_array[$days]['temperatures']));
      if ($days != "Friday")
        echo ",";
    }
    echo "]";
    ?>

  ;

  for (let index = 0; index < 7; index++) {

    document.getElementsByClassName("wrapper-forecast-temp-tomorrow")[index].innerHTML = week[index] + "°";


  }

  // Icons
  let iconBaseUrl = "http://openweathermap.org/img/wn/";
  let iconFormat = ".webp";

  // Icons hourly

  // Hour now
  // let iconHourNow = data.hourly[0].weather[0].icon;
  // let iconFullyUrlHourNow = iconBaseUrl + iconHourNow + iconFormat;
  // document.getElementById("wrapper-icon-hour").src =
  //   iconFullyUrlHourNow;

  // Backgrounds
</script>