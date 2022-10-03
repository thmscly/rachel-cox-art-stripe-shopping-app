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
        <div>
            {products.map((product) => (
                <>
                    <section className="container">
                        <h1>{product.name}</h1>
                        <h4>{product.default_price}</h4>
                        <h4>{product.description}</h4>
                        <div>
                            <img
                                alt={product.description}
                                src={product.images[0]}
                                width="140"
                                height="160"
                            />
                            {/* add onsubmit to trigger setting env PRICE to product button's price.id */}
                            <form
                                action="http://localhost:4242/create-checkout-session.php"
                                method="POST"
                            >
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
