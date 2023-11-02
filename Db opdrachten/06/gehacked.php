<?php

    try{

        $conn = mysqli_connect($host, $user, $password, $database)
        or die("failed to connect: " . mysqli_connect_error());

        $query="SELECT * FROM prepstatements";
        $result=mysqli_query($conn, $query);

        if(mysqli_num_rows($result)> 0){
            while($row= $result->fetch_assoc()){
                $naam= $row["user"];

                ?>
                <section>
                    <h1><?php echo $naam["naam"]?></h1>
                    <p>Leeftijd van Leerling <?php $naam["leeftijd"];?></p>
                </section>

                <?php
            }

            
        }
        else{

        }
        $conn->close();
    }
    catch(Exception $e){
            echo "Caught Exception", $e->getMessage(), "\n";
    }
    $conn->close();
    

?>

