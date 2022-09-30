<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>
<body>
 <h1 style="text-align: center;">Order details</h1>
 Customer Name: <h3> {{$order->name}}</h3>
 Customer Email: <h3> {{$order->email}}</h3>
 Customer Phone: <h3> {{$order->phone}}</h3>
 Customer Address: <h3> {{$order->address}}</h3>
 Customer Id: <h3> {{$order->user_id}}</h3>

 Product Name: <h3> {{$order->title}}</h3>
 Product Price: <h3> {{$order->price}}</h3>
 Product Quantity: <h3> {{$order->quantity}}</h3>
 Payment Status: <h3> {{$order->payment_status}}</h3>
 Product Id: <h3> {{$order->product_id}}</h3>
 Product Image: <img src="{{asset($order->image)}}" alt="" style="height: 300px; width: 300px; padding-top: 50px;">


</body>
</html>
