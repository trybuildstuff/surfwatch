<?php
class WeatherForcastExecutor
{
    private $API_URL = 'http://magicseaweed.com/api/06c6c6502c517fa06b1d405326fa2a24/forecast/?units=uk&spot_id=';
    
    private $locations = array(
      0 => array(
        'id' => 546,
        'name' => 'Moffat Beach'
      ),
      1 => array(
        'id' => 1008,
        'name' => 'Alex Heads'
      )
    );

    private $WIND_DEFINITION = array(
        '0,2' => 'Calm',
        '3,5' => 'Light Air',
        '6,11' => 'Light Breeze',
        '12,19' => 'Gentle Breeze',
        '20,29' => 'Moderate Breeze',
        '30,39' => 'Fresh Breeze',
        '40,50' => 'Strong Breeze',
        '51,59' => 'Near Gale',
        '60,74' => 'Gale',
        '75,87' => 'Strong Gale',
        '88,102' => 'Storm',
        '103,115' => 'Violent Storm',
        '116,99999' => 'Hurricane'
    );

    private function initSolidRatingAsHtml($solidRate){
      $imgsHtml = '';

      // Loop the solid rating on a single forecast object.
      for ($i = 0; $i < $solidRate; $i++) {
        $imgsHtml .= '<img src="imgs/star_filled.png" />';
      }

      return $imgsHtml;
    }

    private function initFadedRateAsHtml($fadedRate) {
      $imgsHtml = '';

      // Loop the faded rating on a single forecast object.
      for ($i = 0; $i < $fadedRate; $i++) {
        $imgsHtml .= '<img src="imgs/star_empty.png" />';
      }

      return $imgsHtml;
    }

    private function getWindDescriptionByKMpH($kMpH)
    {
        foreach ($this->WIND_DEFINITION as $key => $value) {
          $minCutPos = strpos($key, ',');
          $min = substr($key, 0, $minCutPos);
          $max = substr($key, $minCutPos + 1, strlen($key));
          if (in_array($kMpH, range($min, $max))) {
              return $value;
          }
        }
    }

    private function initRequestUrl($location) {
      $url = $this->API_URL . $location['id'];
      return $url;
    }

    private function getAPIData($location){
      $requestUrl = $this->initRequestUrl($location);
      // init CURL      
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $requestUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $output = curl_exec($ch);
      $curl_error = curl_error($ch);
      curl_close($ch);

      $output = json_decode($output);
      return $output;
    }

    function roundUpToAny($n,$x=10) {
        return round(($n+$x/2)/$x)*$x;
    }
    
    private function getHtmlForLocation($location){
      
      $dataObject = $this->getAPIData($location);

      $html = '';

      $locationName = $location['name'];
      
      foreach ($dataObject as $val) {
          
          $swellUnit = $val->swell->unit;
          $swellDirection = $this->roundUpToAny($val->swell->components->combined->direction);
          $swellCompassDirection = $val->swell->components->combined->compassDirection;
          
          $windDirection = $val->wind->direction;
          $windKpHSpeed = round(1.609344 * $val->wind->speed);
          $windDescription = $this->getWindDescriptionByKMpH($windKpHSpeed);
          
          $localTime = date('g:i a', $val->localTimestamp);

          $weatherTemp = $val->condition->temperature;
          $weatherState = $val->condition->weather;

          $fadedRating = $this->initFadedRateAsHtml($val->fadedRating);
          $solidRating = $this->initSolidRatingAsHtml($val->solidRating);

          $html .= "<tr class=''>
                      <td class='text' data-title='Location'>" . $locationName . "</td>
                      <td class='text' data-title='Surf Height'>" . $val->swell->minBreakingHeight . $swellUnit . " - " . $val->swell->maxBreakingHeight . $swellUnit . " </td>
                      <td class='text' data-title='Tide Times'>3.7ft at " . $localTime . "</td>
                      <td class='text' data-title='Wind Direction'><div class='msw-ssa msw-ssa-$windDirection'></div> " . $windDescription . " " . $val->wind->compassDirection . "</td>
                      <td class='text' data-title='Swells'><div class='msw-swa msw-swa-$swellDirection'></div> " . $swellCompassDirection . "</td>
                      <td class='text' data-title='Weather'>$weatherTemp&deg; <div class='msw-sw msw-sw-$weatherState'></div> </td>
                      <td class='text' data-title='Surf Rating'>$fadedRating $solidRating</td>
                   </tr>";
      
      }

      return $html;
    }

    public function __constructor()
    {
        
    }

    public function getExecutedJob(){
      $locationsHTML = '';

      foreach($this->locations as $location){
        $locationsHTML .= $this->getHtmlForLocation($location); 
      }

      return $locationsHTML;
    }

}
