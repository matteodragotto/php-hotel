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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>PHP Hotels</title>
</head>



<body>

  <h1 class="text-center">Lista Hotel</h1>

  <div class='p-4'>


    <form action='' method="GET" class="d-flex justify-content-center align-items-center gap-5 ">

      <div class="form-check ">
        <label class="form-check-label" for="exampleCheck1">Parcheggio?</label>
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name='parking'>

      </div>

      <div class="d-flex align-items-center">
        <label for="voteSearch" class="form-label">Voto</label>
        <input type="number" class="form-control m-1" id="voteSearch" name='vote' min=1 max=5>
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <table class='table'>
      <thead>
        <tr>
          <th scope='col'>Nome</th>
          <th scope='col'>Descrizione</th>
          <th scope='col'>Parcheggio</th>
          <th scope='col'>Voto</th>
          <th scope='col'>Distanza dal centro</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $parking = isset($_GET['parking']) && $_GET['parking'] === 'on';
        $vote = isset($_GET['vote']) ? (int)$_GET['vote'] : null;
        foreach ($hotels as $hotel) {
          if ($parking && !$hotel['parking']) {
            continue;
          }

          if ($vote && $hotel['vote'] !== $vote) {
            continue;
          }

          echo "<tr>";
          echo "<td>" . $hotel['name'] . "</td>";
          echo "<td>" . $hotel['description'] . "</td>";
          echo "<td>" . ($hotel['parking'] ? "Si" : "No") . "</td>";
          echo "<td>" . $hotel['vote'] . "</td>";
          echo "<td>" . $hotel['distance_to_center'] . " km</td>";
          echo "</tr>";
        }

        ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>



</html>