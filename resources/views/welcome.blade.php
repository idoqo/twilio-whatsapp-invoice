<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Twilio Commerce</title>
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
                <h1 class="display-4">Twilio Commerce</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <ul class="list-group shadow">
                    @foreach ($products as $product)
                        <li class="list-group-item">
                            <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold mb-2">{{$product->name}}</h5>
                                    <p class="font-italic text-muted mb-0 small">{{$product->description}}</p>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold my-2">${{$product->price}}</h6>
                                        <a href="{{route('checkout', $product->id)}}" class="btn btn-primary">Buy</a>
                                    </div>
                                </div><img src="images/{{$product->image_path}}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    </body>
</html>
