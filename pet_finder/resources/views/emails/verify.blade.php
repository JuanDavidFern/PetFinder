<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-color: #f0f0f0;
            /* Cambia el color de fondo */
            color: #333;
            /* Cambia el color del texto */
            /* Agrega más estilos según sea necesario */
        }

        .button {
            background-color: #4CAF50;
            /* Color de fondo del botón */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Verify Your Email Address</h1>
    <p>Please click the button below to verify your email address.</p>
    <a href="{{ $url }}" class="button">Verify Email Address</a>
    <p>If you did not create an account, no further action is required.</p>
</body>

</html>
