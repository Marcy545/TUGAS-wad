<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Climbing Equipment List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 2.5em;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .status-available {
            color: #28a745;
            font-weight: bold;
        }
        .status-unavailable {
            color: #dc3545;
            font-weight: bold;
        }
        .alert-info {
            background-color: #17a2b8;
            color: white;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            text-align: center;
        }
        .no-data-message {
            font-size: 1.2em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Climbing Equipment List</h1>

        @if(count($equipment) > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Rental Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipment as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->brand }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->rental_price, 2) }}</td>
                            <td class="{{ $item->is_available ? 'status-available' : 'status-unavailable' }}">
                                {{ $item->is_available ? 'Available' : 'Unavailable' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert-info">No equipment found.</div>
        @endif
    </div>
</body>
</html>
