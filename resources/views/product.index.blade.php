<h1>Products</h1>

@foreach ($products->data as $product)
    <ul>
        <li>
            <h2>{{ $product->name }}</h1>
            <img src="{{ $product->images[0] }}" alt="{{ $product->description }}">
            <h3>{{ $product->description }}</h3>
            <button type="submit">Add to Cart</button>
        </li>
    </ul>
@endforeach
