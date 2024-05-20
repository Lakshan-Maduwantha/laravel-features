<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Prescriptions</title>
    <!-- Additional CSS, meta tags, etc. -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header>
        <!-- Your header content here -->
    </header>

    <main>
        <h1>Uploaded Prescriptions</h1>
        <table>
            <thead>
                <tr>
                    <th>Prescription ID</th>
                    <th>User</th>
                    <th>Delivery Address</th>
                    <th>Delivery Time Slot</th>
                    <th>Notes</th>
                    <th>Image Path</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prescriptions as $prescription)
                    <tr>
                        <td>{{ $prescription->id }}</td>
                        <td>{{ $prescription->user->name }}</td>
                        <td>{{ $prescription->delivery_address }}</td>
                        <td>{{ $prescription->delivery_time_slot }}</td>
                        <td>{{ $prescription->notes }}</td>
                        <td>{{ $prescription->image_path }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form method="POST" action="{{ route('quotation.create', $prescription->id) }}">
            @csrf
            <input type="number" name="quotation_amount" placeholder="Quotation Amount" required>
            <textarea name="terms" placeholder="Terms (optional)"></textarea>
            <button type="submit">Create Quotation</button>
        </form>
        <form method="POST" action="{{ route('quotation.accept', $prescription->id) }}">
            @csrf
            <input type="hidden" name="quotation_id" value="{{ $prescription->quotation->id }}">
            <button type="submit" name="status" value="accepted">Accept Quotation</button>
        </form>
        <form method="POST" action="{{ route('quotation.reject', $prescription->id) }}">
            @csrf
            <input type="hidden" name="quotation_id" value="{{ $prescription->quotation->id }}">
            <button type="submit" name="status" value="rejected">Reject Quotation</button>
        </form>
        
    </main>

    <footer>
        <!-- Your footer content here -->
    </footer>

    <!-- Additional scripts, libraries, etc. -->
</body>
</html>
