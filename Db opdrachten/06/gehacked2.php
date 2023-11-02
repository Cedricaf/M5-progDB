<?php
try {
    $envSettings = [];
    if (file_exists(dirname(__FILE__).'/.env')) {
        $envSettings = parse_ini_file(dirname(__FILE__).'/.env'); 
    }

    $databaseServer = $envSettings['DB_HOST'];
    $user = $envSettings['DB_USER'];
    $password = $envSettings['DB_PASSWORD'];
    $schema = $envSettings['DB_SCHEMA_NAME'];

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("Failed to connect: " . $conn->connect_error);
    }

    $query = "SELECT user, leeftijd FROM prepstatements";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->bind_param("si",$naam, $leeftijd);

    while ($stmt->fetch()) {
        ?>
        <section>
            <h1><?php echo $naam; ?></h1>
            <p>Leeftijd van Leerling <?php echo $leeftijd; ?></p>
        </section>
        <?php
    }

    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo "Caught Exception: " . $e->getMessage() . "\n";
}
?>
