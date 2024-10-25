<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 10px; /* Smaller font size */
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 10px;
            border: 1px solid #000;
        }
        h1 {
            font-size: 14px; /* Smaller heading */
            text-align: center;
            margin-bottom: 10px;
        }
        h2 {
            font-size: 12px; /* Smaller subheading */
            text-align: center;
            margin-bottom: 15px;
        }
        .details {
            margin-top: 10px;
            line-height: 1.4; /* Increase line height for better readability */
        }
        .details div {
            margin-bottom: 3px; /* Reduced spacing between details */
        }
        img {
            width: 100%; /* Full width */
            height: auto;
            margin: 10px 0;
            max-height: 200px; /* Limit height for the image */
        }
        footer {
            text-align: center;
            font-size: 8px; /* Smaller footer text */
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Production Details</h1>
        <h2>Production ID: {{ $production->id }}</h2>

        <div class="details">
            <div><strong>PS:</strong> {{ $production->ps }}</div>
            <div><strong>Buyer:</strong> {{ $production->buyer }}</div>
            <div><strong>Quantity:</strong> {{ $production->qty }}</div>
            <div><strong>Buyer PO:</strong> {{ $production->buyer_po }}</div>
            <div><strong>Style:</strong> {{ $production->style }}</div>
            <div><strong>Cap Item:</strong> {{ $production->cap_item }}</div>
            <div><strong>Shipping Via:</strong> {{ $production->ship_via }}</div>
            <div><strong>Destination:</strong> {{ $production->dest }}</div>
            <div><strong>Final Destination:</strong> {{ $production->final_dest }}</div>
            <div><strong>Washing:</strong> {{ $production->washing }}</div>
            <div><strong>Cutter Pattern:</strong> {{ $production->c_pattern }}</div>
            <div><strong>Visor 6:</strong> {{ $production->visor_6 }}</div>
            <div><strong>Eyelet Number:</strong> {{ $production->eyelet_number }}</div>
            <div><strong>Eyelet Color:</strong> {{ $production->eyelet_color }}</div>
            <div><strong>Eyelet Position:</strong> {{ $production->eyelet_position }}</div>
            <div><strong>Visor 1.5:</strong> {{ $production->visor_1_5 }}</div>
            <div><strong>Visor 0.5:</strong> {{ $production->visor_0_5 }}</div>
            <div><strong>Front Mold:</strong> {{ $production->f_mold }}</div>
            <div><strong>Back Mold:</strong> {{ $production->b_mold }}</div>
            <div><strong>Extra Stitch:</strong> {{ $production->extra_stitch }}</div>
            <div><strong>Packing:</strong> {{ $production->packing }}</div>
            <div><strong>Row:</strong> {{ $production->row }}</div>
            <div><strong>CM From Front End:</strong> {{ $production->cm_from_front_end }}</div>
            <div><strong>PS Date:</strong> {{ $production->ps_date }}</div>
            <div><strong>SD Date:</strong> {{ $production->sd_date }}</div>
        </div>

        @if ($production->image)
            <img src="{{ storage_path('app/public/' . $production->image) }}" alt="{{ $production->buyer }}" style="width: 150px; height: auto;" />
        @else
            <div>No Image Available</div>
        @endif

        <footer>
            <p>Thank you for your business!</p>
        </footer>
    </div>
</body>
</html>
