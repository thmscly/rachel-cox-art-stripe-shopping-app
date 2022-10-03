import React, { useState } from "react";

function ProductDisplay() {
    const [products, setProducts] = useState([]);
    fetch("/products")
        .then((response) => response.json())
        .then((products) => setProducts(products));
    // need if prices.product === product.id
    // fetch('/billing')
    //     .then((response) => response.json())
    //     .then((prices) => setPrices(prices))
    return (
        <div className="grid grid-cols-3 gap-3 mx-auto inline-block">
            {products.map((product) => (
                <>
                    <section className="items-center bg-gray-200 p-8 rounded">
                        <h1>{product.name}</h1>
                        <h4>{product.default_price}</h4>
                        <h4>{product.description}</h4>
                        <div>
                            <img
                                className="items-center"
                                alt={product.description}
                                src={product.images[0]}
                                width="140"
                                height="160"
                            />
                            {/* add onsubmit to trigger setting env PRICE to product button's price.id */}
                            <form action="/product-checkout" method="GET">
                                <button id="submit" role="link">
                                    Buy
                                </button>
                            </form>
                        </div>
                    </section>
                </>
            ))}
        </div>
    );
}

export default ProductDisplay;
