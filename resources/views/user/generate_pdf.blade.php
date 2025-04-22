{{-- resources/views/generate_pdf.blade.php --}}
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Booking Item #{{ $item->id }}</title>
  <style>
    body { font-family: DejaVu Sans, sans-serif; }
    .container { padding: 1rem; }
    .header { display: flex; gap: 1rem; margin-bottom: 1rem; }
    .header img { width: 100px; height: 100px; object-fit: cover; border-radius: 8px; }
    .details h2 { margin: 0; font-size: 1.25rem; }
    .details p { margin: .25rem 0; font-size: .9rem; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <img src="{{ public_path('storage/' . $item->variant->product->image) }}"
           alt="{{ $item->variant->product->name }}">
      <div class="details">
        <h2>{{ $item->variant->product->name }}</h2>
        <p><strong>Variant:</strong> {{ $item->variant->title }}</p>
        <p>{{ $item->variant->product->short_description }}</p>
        <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</p>
        <p><strong>Unit Price:</strong> ${{ number_format($item->unit_price, 2) }}</p>
      </div>
    </div>
  </div>
</body>
</html>
