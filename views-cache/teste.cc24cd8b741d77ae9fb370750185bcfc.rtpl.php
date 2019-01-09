<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <table>
        <tr>
            <td>Teste</td>
            <td>Username</td>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars( $sessao["idalu"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $sessao["username"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        </tr>
    </table>
    
</body>
</html>