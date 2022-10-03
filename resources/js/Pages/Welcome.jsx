import React from "react";
import { Link, Head } from "@inertiajs/inertia-react";
import ProductDisplay from "@/Components/ProductDisplay";

export default function Welcome(props) {
    return (
        <>
            <Head title="Welcome" />
            <div className="m-5">
                <div className="items-center text-xl">
                    <h1>Rachel Cox Art</h1>
                </div>
                <ProductDisplay />
            </div>
        </>
    );
}
