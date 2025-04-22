<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Climbing Gear Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 2rem;
        }
        .equipment-header {
            background-color: #343a40;
            color: white;
            padding: 1.5rem 0;
            margin-bottom: 2rem;
            border-radius: 5px;
        }
        .table-container {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            padding: 1.5rem;
        }
        .status-badge {
            font-size: 0.8rem;
            padding: 0.35em 0.65em;
        }
        .navbar-custom {
            background-color: #212529;
            padding: 0.5rem 1rem;
            margin-bottom: 1.5rem;
            border-radius: 5px;
        }
        .user-info {
            color: white;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="equipment-header text-center">
            <h1>Climbing Gear Rental System</h1>
            <p class="lead">Inventory Management</p>
        </div>
        
        <nav class="navbar-custom d-flex justify-content-between align-items-center">
            <div class="user-info">
                Welcome, {{ Auth::user()->name }}
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
            </form>
        </nav>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Equipment Inventory</h2>
            <a href="{{ route('equipment.create') }}" class="btn btn-primary">
                Add New Equipment
            </a>
        </div>
        
        <div class="table-container">
            @if(count($equipment) > 0)
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Price/Day</th>
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
                                <td>
                                    @if($item->is_available)
                                        <span class="badge bg-success status-badge">Available</span>
                                    @else
                                        <span class="badge bg-danger status-badge">Unavailable</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">
                    No equipment available yet. Add some using the "Add New Equipment" button.
                </div>
            @endif
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>