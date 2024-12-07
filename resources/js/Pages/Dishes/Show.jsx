import Layout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

const Show = ({ dish }) => {
    return (
        <Layout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    {dish.name}
                </h2>
            }
        >
            <Head title={dish.name} />
            {dish ? (
                <ul>
                    <h1>{dish.description}</h1>
                    <h1>{dish.price}</h1>
                </ul>
            ) : (
                <h1>Prodotto non trovato</h1>
            )}
        </Layout>
    );
};

export default Show;
