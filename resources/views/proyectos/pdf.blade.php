<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de Proyectos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f3f3f3;
        }
    </style>
</head>
<body>
    <h2>Listado de Proyectos</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre del Proyecto</th>
                <th>Cliente</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $proyecto)
            <tr>
                <td>{{ $proyecto->nombre }}</td>
                <td>{{ $proyecto->cliente ? $proyecto->cliente->nombres : 'Sin asignar' }}</td>
                <td>{{ $proyecto->fecha_inicio }}</td>
                <td>{{ $proyecto->fecha_fin }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
