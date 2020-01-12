<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Checkout - Twilio Commerce</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel="stylesheet"
          type="text/css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel="stylesheet"
          type="text/css">
    <base href="/">
</head>
<body>
<div class="container py-5">
    <div class="row text-center mb-5">
        <div class="col-lg-7 mx-auto">
            <p>Order Summary</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto" style="border-top: 1px solid #007bff">
            <ul class="list-group mb-2">
                <li class="list-group-item">
                    <div class="media align-items-lg-center flex-column flex-lg-row p-2">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2">{{$product->name}}</h5>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">${{$product->price}}</h6>
                            </div>
                        </div>
                        <img src="images/{{$product->image_path}}" alt="Generic placeholder image" width="200"
                             class="ml-lg-5 order-1 order-lg-2">
                    </div>
                </li>
            </ul>
            <form action="/charge" method="POST">
                {{csrf_field()}}
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{env('STRIPE_PUB_KEY')}}"
                    data-amount="{{$product->price * 100}}"
                    data-name="Stripe Demo"
                    data-description="Twilio Commerce: {{$product->description}}"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto"
                    data-currency="usd">
                </script>
            </form>
        </div>
    </div>
</div>
</body>
</html>
