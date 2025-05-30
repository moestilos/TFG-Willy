<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .product { margin-bottom: 15px; padding: 10px; border-bottom: 1px solid #eee; }
        .total { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Gracias por tu compra!</h1>
        <p>Aquí está el detalle de tus productos:</p>

        @foreach($cartItems as $item)
            <div class="product">
                @php
                    $names = [
                        'camiseta' => [
                            'Akatsuki Shadow', 'Shinigami Spirit', 'Sakura Dream', 
                            'Ronin Soul', 'Kitsune Magic', 'Kaiju Power',
                            'Samurai Code', 'Oni Mask', 'Dragon Fury', 'Zen Master'
                        ],
                        'sudadera' => [
                            'Yokai Night', 'Harajuku Style', 'Tokyo Lights', 
                            'Shinobi Shadow', 'Neo Tokyo', 'Shogun Pride',
                            'Hannya Spirit', 'Cyber Samurai', 'Geisha Art', 'Kabuki Soul'
                        ],
                        'gorra' => [
                            'Ninja Way', 'Bushido Code', 'Rising Sun', 
                            'Katana Edge', 'Lotus Dream', 'Thunder God',
                            'Cherry Blossom', 'Dragon Scale', 'Imperial Crown', 'Zen Path'
                        ]
                    ];
                    $productName = $names[$item->product_type][$item->product_number - 1];
                @endphp
                <h3>{{ $productName }}</h3>
                <p>Tipo: {{ ucfirst($item->product_type) }}</p>
                <p>Talla: {{ $item->size }}</p>
                <p>Cantidad: {{ $item->quantity }}</p>
                <p>Precio: ${{ number_format($item->price, 2) }}</p>
            </div>
        @endforeach

        <div class="total">
            <p>Total pagado: ${{ number_format($total, 2) }}</p>
        </div>
    </div>
</body>
</html>
