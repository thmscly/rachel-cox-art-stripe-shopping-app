import React from "react";
import { Link, Head } from "@inertiajs/inertia-react";
import ProductDisplay from "@/Components/ProductDisplay";

export default function Welcome(props) {
    return (
        <>
            <Head title="Welcome" />
            <div className="bg-blue-100">
                <div className="text-center text-xl p-10 mt-0 ml-0 mr-0 sticky top-0 z-50 bg-white max-w-full opacity-90">
                    <h1 className="relative text-2xl">Rachel Cox Art</h1>
                </div>
                <div className="mb-0 mr-24 ml-24 mt-10">
                    <ProductDisplay />
                </div>
            </div>
        </>
    );
}
