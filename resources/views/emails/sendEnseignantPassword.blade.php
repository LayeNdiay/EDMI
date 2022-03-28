<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email de reception de compte</title>
</head>
<body>
    <p>
        Bonjour docteur {{$data->prenom}}   {{$data->name}}<br>
        Voici vos informations de connexion<br>
        <strong>login : {{$data->email}}  </strong> <br> 
        <strong>mot de passe  : {{$password}}  </strong>  
    </p>
</body>
</html>