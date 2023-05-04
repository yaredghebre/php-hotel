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
    <form class="mb-5 m-2" action="index.php" method="GET">
        <label for="filter">Seleziona un filtro</label>
        <select name="filter" id="filter">
            <option value="">Tutti</option>
            <option value="parking"> Con Parcheggio</option>
            <option value="vote">Voto da 3 stelle in su</option>
        </select>

        <button type="submit">Invia</button>
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
                <?php foreach ($hotels as $index => $hotel) { 
                    if ($_GET['filter'] === 'parking' && $hotel['parking'] !== true) {
                        continue;
                    };

                    if ($_GET['filter'] === 'vote' && $hotel['vote'] <= 3) {
                        continue;
                    };
                ?>
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