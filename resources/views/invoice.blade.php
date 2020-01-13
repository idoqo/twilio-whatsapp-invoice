<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Bill</title>
    <style>
        body{
            max-width: 46%;
            padding: 1.5%;
            border: 1px solid black;
        }
    </style>
</head>
<body>
<div class="body">
    <div style="text-align: center">
        <h3 style="margin: 0;">Twilio Commerce</h3>
        <h5 style="margin: 0;">supersales@example.com</h5>
    </div>
    <div class="content">
        <div style="margin: -2px;">
            <div style="float: left;">
                <p>Invoice Number:- TWC-{{$product->id}} </p>
            </div>
            <div style="float: right;">
                <p style="margin-right: 20px;">
                    Date: {{\Carbon\Carbon::now()->toFormattedDateString()}}
                </p>
            </div>
        </div>
        <div style="clear: both;"></div>
        <div class="centre" style="text-align: center;">
            <h3>Invoice</h3>
        </div>
        <div>
            <p>Name: {{$user->name}}</p>
        </div>
        <hr/>
        <div style="padding: 30px 0px 30px 0px;">
            <p class="amount">{{$product->name}}
                <span style="float: right;"> {{$product->price}}</span>
            </p>
        </div>
        <hr/>
        <p><a href="#">Pay with Stripe</a></p>
    </div>
</div>
</body>
</html>
