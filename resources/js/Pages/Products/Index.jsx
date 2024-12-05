import { Head } from "@inertiajs/react";
import Layout from "@/Layouts/AuthenticatedLayout";

const Index = ({ products }) => {
    if (!Array.isArray(products)) {
        products = [];
    }

    return (
        <Layout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Prodotti
                </h2>
            }
        >
            <Head title="Products" />
            {products.length > 0 ? (
                <ul>
                    {products.map((product) => (
                        <li key={product.id} className="mb-2">
                            <strong>{product.name}</strong>: €{product.price}
                        </li>
                    ))}
                </ul>
            ) : (
                <p className="text-gray-500">
                    Non ci sono prodotti disponibili.
                </p>
            )}
        </Layout>
    );
};

export default Index;
