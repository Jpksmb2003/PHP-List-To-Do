<?php
    $error = '';
    $weather = '';

    if (array_key_exists('submit', $_GET)) {
        // Checking if input is empty
        if (empty($_GET['city'])) {
            $error = "Please enter your location.";
        } else {
            $city = htmlspecialchars($_GET['city']);
            $city = urlencode($city); // Encode the city name to handle spaces
            $apiKey = "Yor API Key";
            $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=".$apiKey;

            $apiData = @file_get_contents($apiUrl);

            // Check if the API call was successful
            if ($apiData) {
                $weatherArray = json_decode($apiData, true);

                // Check if the city was found
                if ($weatherArray['cod'] == 200) {
                    // Converting from Kelvin to Celsius and rounding to no decimal places
                    $tempCelsius = round($weatherArray['main']['temp'] - 273.15);
                    $feelsLikeCelsius = round($weatherArray['main']['feels_like'] - 273.15);
                    $minCelsius = round($weatherArray['main']['temp_min'] - 273.15);
                    $maxCelsius = round($weatherArray['main']['temp_max'] - 273.15);

                    // Building the weather details output
                    $weather = "<b>Weather Condition : </b><label>".$weatherArray['weather'][0]['description']."</label>";
                    $city = "<b>City : </b>".$weatherArray['name'];
                    $temp = "<b>Temperature : </b>".$tempCelsius."°C";
                    $feelsLike = "<b>Feels Like : </b>".$feelsLikeCelsius."°C";
                    $tempMin = "<b>Lowest : </b>".$minCelsius."°C";
                    $tempMax = "<b>Highest : </b>".$maxCelsius."°C";
                } else {
                    $error = "We don't have any information about this city.";
                }
            } else {
                $error = "We don't have any information about this city.";
            }
        }
    }
?>
<?php 
    $title = "Weather";
    $css = "CSS/weather.css";
    include_once 'include/header.php';
?>
    
    <div class="container">
        <h1 id="textplain">Search Global Weather</h1>
        <form action="" method="GET">
            <p><label id="textplain" for="city">" Find your city name "</label></p>
            <p><label id="textplain" for="city">" You can search in both Thai and English."</label></p>
            <p><input type="text" name="city" id="city" placeholder="Enter your city"></p>
            <button type="submit" name="submit" class="btn">Check it!</button>
            <div class="output">
                <?php
                if ($weather) {
                    echo 
                    '<div class="alert alert-success" role="alert">
                        '.$city.'<br>'
                         .$weather.'<br>'
                         .$temp.'<br>'
                         .$feelsLike.'<br>'
                         .$tempMin.'<br>'
                         .$tempMax.'<br>'.'
                    </div>';
                } else {
                    echo 
                    '<div class="cityError">
                        '. $error .'
                    </div>';
                }
                ?>
            </div>
        </form>
    </div>

<?php include ('include/footer.php') ?>
