<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Equipment - Climbing Gear Rental</title>
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
        .form-container {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            padding: 2rem;
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
            <p class="lead">Add New Equipment</p>
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
        
        <div class="form-container">
            <form action="{{ route('equipment.store') }}" method="POST">
                @csrf
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Equipment Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="type" class="form-label">Equipment Type</label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                <option value="">Select Type</option>
                                <option value="Harness">Harness</option>
                                <option value="Rope">Rope</option>
                                <option value="Carabiner">Carabiner</option>
                                <option value="Helmet">Helmet</option>
                                <option value="Climbing Shoe">Climbing Shoe</option>
                                <option value="Chalk Bag">Chalk Bag</option>
                                <option value="Belay Device">Belay Device</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand') }}" required>
                            @error('brand')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" min="0" value="{{ old('quantity') }}" required>
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="rental_price" class="form-label">Rental Price (per day)</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control @error('rental_price') is-invalid @enderror" id="rental_price" name="rental_price" step="0.01" min="0" value="{{ old('rental_price') }}" required>
                                @error('rental_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="is_available" class="form-label">Availability</label>
                            <select class="form-select" id="is_available" name="is_available">
                                <option value="1" selected>Available</option>
                                <option value="0">Unavailable</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description (Optional)</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('equipment.index') }}" class="btn btn-secondary">Back to List</a>
                    <button type="submit" class="btn btn-primary">Add Equipment</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>