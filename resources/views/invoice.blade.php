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
        .header img{
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .header{
            text-align: center;
        }
        .no-margin{
            margin: 0;
        }
        .left{
            float: left;
        }
        .right{
            float: right;
        }
        .roow{
            margin: -2px;
        }
        .margin-20{
            margin-right: 20px;
        }
        .centre{
            text-align: center;
        }
        .clearfix{
            clear: both;
        }
        .fees-content{
            padding: 30px 0px 30px 0px;
        }
        .amount span{
            float: right;
        }

        .signarea p{
            text-align: right;
            margin-top: 60px;
        }

    </style>
</head>
<body>
<div class="body">
    <div class="header">
        <h3 class="no-margin">Twilio Commerce</h3>
        <h5 class="no-margin">supersales@example.com</h5>
    </div>
    <div class="content">
        <div class="roow">
            <div class="left">
                <p>Invoice Number:- TWC-{{$product->id}}</p>
            </div>
            <div class="right">
                <p class="margin-20">Date: 22nd May 2018 </p>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="centre">
            <h3>Invoice</h3>
        </div>
        <div>
            <p>Name:- John Doe</p>
        </div>
        <hr/>
        <div class="fees-content">
            <p class="amount">Course Fees
                <span> 3000</span>
            </p>
            <p class="amount">GST
                <span> 100</span>
            </p>
        </div>
        <hr/>
        <p><a href="#">Pay with Stripe</a></p>
    </div>
</div>
</body>
</html>
