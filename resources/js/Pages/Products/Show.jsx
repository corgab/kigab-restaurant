import Layout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

const Show = ({ product }) => {
    return (
        <Layout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    {product.name}
                </h2>
            }
        >
            <Head title={product.name} />
            {product ? (
                <ul>
                    <h1>{product.description}</h1>
                    <h1>{product.price}</h1>
                </ul>
            ) : (
                <h1>Prodotto non trovato</h1>
            )}
        </Layout>
    );
};

export default Show;
