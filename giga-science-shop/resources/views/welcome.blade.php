@php use Illuminate\Support\Facades\DB; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giga Science Shop</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #28313b, #485461);
            color: #dcdcdc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .container {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 800px;
            box-sizing: border-box;
        }
        h1 {
            font-size: 3rem;
            color: #4cd137;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2rem;
            color: #b8b8b8;
            margin: 20px 0;
        }
        .button-container {
            margin-top: 30px;
        }
        .button-container a {
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 1.1rem;
            margin: 10px;
            transition: all 0.3s ease;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        }
        .button-container a:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }
        .button-container a:active {
            background-color: #3e8e41;
            transform: scale(0.98);
        }
        .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: #bbb;
        }

        @media screen and (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
            p {
                font-size: 1rem;
            }
            .button-container a {
                font-size: 1rem;
                padding: 12px 25px;
            }
        }

        @media screen and (max-width: 480px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 2rem;
            }
            p {
                font-size: 0.9rem;
            }
            .button-container a {
                font-size: 0.9rem;
                padding: 10px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to Giga Science Shop</h1>
        <p>This page provides links to view different parts of the database. Click the links below to explore the data.</p>

        <div class="button-container">
            <a href="{{ url('/products') }}">View Products</a>  
            <a href="{{ url('/orders') }}">View Orders</a>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Giga Science Shop | All rights reserved</p>
    </div>
</body>
</html>
