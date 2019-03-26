<?php

// get token
$curl = curl_init();

// get the search variables
$searchReq = $_GET['search'];
$locationReq = $_GET['location'];

// set some options
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => CURLOPT_URL => 'https://api.yelp.com/v3/businesses/search?term=' . $searchReq . '&location=' . $locationReq,
    CURLOPT_HTTPHEADER => ['Authorization: Bearer DnUxmqxm6SaNnppYmdzWww8XKYmXLI03MYhNNC1Bk9agm9YuOKrW_8p6G6tm9_zEmsXspQ8QahVpZ-Ad0xTr6Hs1UnGn7FqP--gRujjIp501KzPpAEpPzhJ5fxyJXHYx']
]);

// send the request and save response to $resp
$resp = json_decode(curl_exec($curl));

// close request to clear up some resources
curl_close($curl);

// print all responses
// var_dump($resp->businesses);

// print certain responses
// echo($resp->businesses[0]->name);

?>

<!-- php loop to display results -->
<div id="results" data-url="<?php if (!empty($url)) echo $url ?>">
    <?php
    if (!empty($array)) {
        foreach ($array['businesses'] as $key => $item) {
            echo '<img id="' . $item['id'] . '" src="' . $item['image_url'] . '" alt=""/><br/>';
        }
    }
    ?>
</div>

<?php

?>
