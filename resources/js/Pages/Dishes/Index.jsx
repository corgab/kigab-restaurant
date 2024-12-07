import { Head } from "@inertiajs/react";
import Layout from "@/Layouts/AuthenticatedLayout";

const Index = ({ dishes }) => {
    if (!Array.isArray(dishes)) {
        dishes = [];
    }

    return (
        <Layout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Prodotti
                </h2>
            }
        >
            <Head title="Dishes" />
            {dishes.length > 0 ? (
                <ul>
                    {dishes.map((dish) => (
                        <li key={dish.id} className="mb-2">
                            <strong>{dish.name}</strong>: €{dish.price}
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
