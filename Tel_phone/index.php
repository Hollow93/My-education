<?php

error_reporting(E_ALL);
mb_internal_encoding('utf-8');

echo 'Hellow world';

echo '<br/>';

$phone = file_get_contents('phone.json');

$tel_phone = json_decode($phone, true);



?>

<html>
<head>

</head>

<body>
<table style="border: 1px solid black">

    <?php for ($i = 0;
               $i < 4;
               $i++) { ?>
        <tr>
            <td><?php echo ' Фамилия: ' . $tel_phone[$i]['Фамилия'] ?>  </td>

            <td><?php echo ' Имя: ' . $tel_phone[$i]['Имя'] ?>  </td>

            <td><?php echo ' Телефон: ' . $tel_phone[$i]['Телефон'] ?>  </td>
        </tr>

    <?php } ?>




</table>
</body>
</html>
