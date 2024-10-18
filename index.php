<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesion de CURL $ch CURL HANDLE
$ch = curl_init(API_URL);

#Indicar que queremos recibir el resultado de la peticion y no mostrarla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

#Ejecutar la peticion y guardar el resultado
$result = curl_exec($ch);

$data = json_decode($result, true);

curl_close($ch);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP API</title>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<body>
  <main>
    <section>
      <img src="<?= $data["poster_url"]; ?>" alt="Poster de <?= $data["title"] ?>" width="250">
    </section>
    <hgroup>
      <h3><?= $data["title"] ?> se estrena en <?= $data["days_until"]; ?> días</h3>
      <p>Fecha de estreno: <?= $data["release_date"]; ?> </p>
      <p>La siguiente es: <?= $data["following_production"]["title"]; ?> </p>
    </hgroup>
  </main>
  <style>
    section {
      text-align: center;
    }

    hgroup {
      text-align: center;
    }
  </style>
</body>

</html>