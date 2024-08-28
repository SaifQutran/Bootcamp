    <table border="1">

        <?php

        for ($i = 1; $i <= 50; $i++) {
            $color = $i % 5 == 0 ?
                'background-color:red;color:white;'
                : 'background-color:skyblue;color:black;';
            echo "<tr><td style='$color'>$i</td></  tr>";
        }
        ?>
    </table>