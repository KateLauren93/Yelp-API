<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">

        <title>Yelp API Results</title>

    </head>
    <body>

        <?php
        // get token
        $curl = curl_init();

        // get the search variables
        $searchReq = $_GET['search'];
        $locationReq = $_GET['location'];

        // set some options
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.yelp.com/v3/businesses/search?term=' . $searchReq . '&location=' . $locationReq,
            CURLOPT_HTTPHEADER => ['Authorization: Bearer DnUxmqxm6SaNnppYmdzWww8XKYmXLI03MYhNNC1Bk9agm9YuOKrW_8p6G6tm9_zEmsXspQ8QahVpZ-Ad0xTr6Hs1UnGn7FqP--gRujjIp501KzPpAEpPzhJ5fxyJXHYx']
        ]);

        // send the request and save response to $resp
        $resp = json_decode(curl_exec($curl));

        // close request to clear up some resources
        curl_close($curl);

        // print all responses
        // var_dump($resp->businesses);
        // var_dump($resp);

        // print certain responses
        // echo($resp->businesses[0]->name);
        ?>

        <div class="container">
            <header class="yelp-header">
                <h1>Yelp API Results</h1>
            </header>
            <section data-url="<?php if (!empty($url)) echo $url ?>">
                <?php
                if (!empty($resp)) {
                    foreach ($resp->businesses as $key => $item) {
                        echo '<h2>' . $item->name . '</h2>';
                        echo '<p>' . $item->rating . '</p>';
                        echo '<p>' . $item->price . '</p>';
                        echo '<a href="' . $item->url . '" target="_blank">Visit Yelp Website</a><br/>';
                        echo '<img src="' . $item->image_url . '" alt="' . $item->name . '" width="250px"/><br/>';
                    }
                }
                ?>
            </section>
        </div>

    </body>
