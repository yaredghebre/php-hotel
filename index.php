<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];


// <!-- FUNZIONI PER I FILTRI -->

$filtered_hotels = $hotels;
if (isset($_GET["parking"]) && $_GET["parking"] === "1") {
    $temp_hotels[] = $hotels;

    foreach ($filtered_hotels as $hotel) {
        if ($hotel["parking"]) {
            $temp_hotels[] = $hotel;
        }
    }

    $filtered_hotels = $temp_hotels;
}

if (isset($_GET["vote"]) && $_GET["vote"] !== "") {
    $temp_hotels = [];
    foreach($filtered_hotels as $hotel) {
        if($hotel["vote"] >= $_GET["vote"]) {
            $temp_hotels[] = $hotel;
        }
    }

    $filtered_hotels = $temp_hotels;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>PHP Hotel</title>
</head>

<body>
    <!-- FORM -->
    <form action="index.php" method="GET">
        <div class="d-flex align-items-end gap-2">
            <div>
                <label for="parking">Parcheggio</label>
                <select name="parking" id="parking" class="form-select">
                    <option value="">All</option>
                    <option value="1" <?php echo(isset($_GET["parking"]) && $_GET["parking"] === "1") ? "selected" : "" ?>>Con Parcheggio</option>
                </select>
            </div>
            <div>
                <label for="vote">Voto</label>
                <input type="number" id="vote" name="vote" class="form-control" max="5" min="1" value="<?php echo $_GET["vote"] ?? '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cerca</button>
        </div>
    </form>

    <!-- TABELLA -->
    <h1>Lista degli Hotel: </h1>
    <div class="container-fluid">
        <table class="table table-hover">
            <thead>
                <tr class="table-warning">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to Center</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($filtered_hotels as $index => $hotel) { ?>
                    <tr>
                        <th class="table-success" scope="row"><?php echo $index + 1; ?> </th>
                        <td class="table-info"><?php echo $hotel['name']; ?></td>
                        <td class="table-info"><?php echo $hotel['description']; ?></td>
                        <td class="table-info"><?php echo $hotel['parking'] ? 'Yes' : 'No'; ?></td>
                        <td class="table-info"><?php echo $hotel['vote']; ?></td>
                        <td class="table-info"><?php echo $hotel['distance_to_center']; ?> km</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>