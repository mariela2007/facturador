<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Exportar PDF - Clientes</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    font-size: 14px;
    color: #333;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
    padding: 10px;

    /* Fondo de pantalla para PDF */
    background-image: url("fondo.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
}

        table {
            border-collapse: collapse;
            width: 100%;           /* Que ocupe todo el ancho del contenedor */
            margin-top: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        thead {
            background-color:rgb(28, 76, 107); /* azul oscuro */
            color: white;
        }

        th, td {
            padding: 10px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9; /* filas pares con fondo gris claro */
        }

        tbody tr:hover {
            background-color: #d1e7fd; /* resaltado al pasar el mouse */
        }

        h1 {
            color:rgb(201, 49, 49);
            font-size: 24px;
            margin-bottom: 0;
            text-align: center;  /* Centrar título */
        }
    </style>
</head>
<body>
    <h1>Listado de Clientes</h1>
    
    <table>
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Género</th>
                <th>Tipo de Documento</th>
                <th>Número de Documento</th>
                <th>Teléfono</th>
                <th>Dirección</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombres }}</td>
                    <td>{{ $cliente->pri_ape }}</td>
                    <td>{{ $cliente->seg_ape }}</td>
                    <td>{{ $cliente->genero }}</td>
                    <td>{{ $cliente->docu_tip }}</td>
                    <td>{{ $cliente->docu_num }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->direccion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
