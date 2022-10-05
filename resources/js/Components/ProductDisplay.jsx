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
        <div className="grid grid-cols-3 gap-6 mx-auto">
            {products.map((product) => (
                <>
                    <div className="mx-auto bg-white p-5 rounded-lg shadow-xl">
                        <h1 className="text-xl text-center p-5">
                            {product.name}
                        </h1>
                        <img
                            className="mx-auto p-1"
                            alt={product.description}
                            src={product.images[0]}
                            width="140"
                            height="160"
                        />
                        <h4 className="text-center p-2">
                            {product.default_price}
                        </h4>
                        <div>
                            {/* add onsubmit to trigger setting env PRICE to product button's price.id */}
                            <form
                                className="text-white font-bold border py-2 px-3 text-grey-darkest text-center m-3 rounded-lg bg-gradient-to-br from-blue-400 to-emerald-400 hover:opacity-80"
                                action="/create-checkout-session"
                                method="GET"
                            >
                                <button
                                    className="max-w-full"
                                    id="submit"
                                    role="link"
                                >
                                    Buy
                                </button>
                            </form>
                        </div>
                    </div>
                </>
            ))}
        </div>
    );
}

export default ProductDisplay;
