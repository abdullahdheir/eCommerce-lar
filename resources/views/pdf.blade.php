<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Products</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto,
                "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif,
                "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
                "Noto Color Emoji";
            ;
            padding: 5px 10px;
            background-color: #fff;
        }

        .details {
            font-size: 12px;
            color: #1f1f1f;
        }

        .new-section {
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 12px;
            color: #1f1f1f;
        }

        .new-section .details {
            margin-top: 10px;
        }

        table {
            width: 100%;
        }

        table thead tr th {
            padding: 5px;
            font-size: 14px;
            text-align: left;
        }

        table tr td {
            padding: 5px 5px;
            border-top: 1px solid #b9b9b9;
        }



        table tr:last-child td {
            border-bottom: 1px solid #b9b9b9;
        }

        table tr.detail-section td {
            border: none;
            padding-top: 8px;
            padding-bottom: 8px;
        }

    </style>
</head>

<body>
    <div class="new-section">
        <div class="details">
            <table class="table table-dark ">
                <thead>
                    <tr style="background-color: #efeff0;">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Regular Price</th>
                        <th>Sale Price</th>
                        <th>Quantity</th>
                        <th>veiws</th>
                        <th>Category Name </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->regular_price }}</td>
                            <td>{{ $product->sale_price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->veiws }}</td>
                            <td>{{ $productName[$product->id] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
