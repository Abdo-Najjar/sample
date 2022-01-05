<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <div id="app">
        <div class="nav-bar"></div>
        <div class="category">{{ $product->category->name }}</div>
        <div class="product-display">
            <div class="product-container">
                <div class="product-image">
                    <div>
                        <img class="img-preview" src="{{ optional($product->media->first())->getUrl() }}">
                        <div class="other-images">
                            @foreach ($product->media as $media)
                                <img class="slide-images" src="{{ $media->getUrl() }}" width="250px" height="200px">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <h1>{{ $product->name }} ({{ $product->price }} $) </h1>
                    <p> {{ $product->description }} </p>
                    @foreach ($product->colors as $color)
                        <div data-color="{{ optional($product->media->first())->getUrl() }}" class="color-circle"
                            style="background-color: {{ $color->value }}">
                        </div>
                    @endforeach

                    @if ($product->sizes()->count())
                        <h3>Sizes</h3>
                        @foreach ($product->sizes as $size)
                            <span class="size">{{ $size->name }}</span>
                        @endforeach
                    @endif

                    @if ($product->capacities()->count())
                        <h3>Capacities</h3>
                        @foreach ($product->capacities as $capacity)
                            <span class="size"> {{ $capacity->name }} </span>
                        @endforeach
                    @endif

                    @if ($product->extras()->count())
                        <h3>Extras</h3>
                        @foreach ($product->extras as $extra)
                            <span class="size">({{ $extra->price }} $) {{ $extra->name }} </span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="/scripts.js"></script>
</body>

</html>
