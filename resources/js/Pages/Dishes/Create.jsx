import { Head, useForm } from "@inertiajs/react";
import Layout from "@/Layouts/AuthenticatedLayout";

const Create = () => {
    const { data, setData, post, progress, errors } = useForm({
        name: "",
        description: "",
        price: "",
        category: "",
        image_path: null,
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setData(name, value);
    };

    const handleFileChange = (e) => {
        setData("image_path", e.target.files[0]);
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        post(route("dishes.store"), {
            preserveScroll: true,
        });
    };

    return (
        <Layout
            header={
                <h2 className="text-2xl font-bold text-gray-700 mb-6">
                    Crea un nuovo piatto
                </h2>
            }
        >
            <Head title="Crea il tuo piatto" />
            <div className="max-w-4xl mx-auto mt-8">
                <form
                    onSubmit={handleSubmit}
                    className="space-y-6 bg-white p-6 shadow rounded-lg"
                >
                    {/* Nome */}
                    <div>
                        <label className="block text-sm font-medium text-gray-700">
                            Nome del piatto
                        </label>
                        <input
                            type="text"
                            name="name"
                            value={data.name}
                            onChange={handleChange}
                            className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        />
                        {errors.name && (
                            <p className="mt-2 text-sm text-red-600">
                                {errors.name}
                            </p>
                        )}
                    </div>

                    {/* Descrizione */}
                    <div>
                        <label className="block text-sm font-medium text-gray-700">
                            Descrizione
                        </label>
                        <textarea
                            name="description"
                            value={data.description}
                            onChange={handleChange}
                            className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            rows="3"
                        ></textarea>
                        {errors.description && (
                            <p className="mt-2 text-sm text-red-600">
                                {errors.description}
                            </p>
                        )}
                    </div>

                    {/* Prezzo */}
                    <div>
                        <label className="block text-sm font-medium text-gray-700">
                            Prezzo (€)
                        </label>
                        <input
                            type="number"
                            name="price"
                            value={data.price}
                            onChange={handleChange}
                            className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            step="0.01"
                            min="0"
                            required
                        />
                        {errors.price && (
                            <p className="mt-2 text-sm text-red-600">
                                {errors.price}
                            </p>
                        )}
                    </div>

                    {/* Categoria */}
                    <div>
                        <label className="block text-sm font-medium text-gray-700">
                            Categoria
                        </label>
                        <select
                            name="category"
                            value={data.category}
                            onChange={handleChange}
                            className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        >
                            <option value="">Seleziona una categoria</option>
                            <option value="Antipasti">Antipasti</option>
                            <option value="Primi">Primi</option>
                            <option value="Secondi">Secondi</option>
                            <option value="Dessert">Dessert</option>
                        </select>
                        {errors.category && (
                            <p className="mt-2 text-sm text-red-600">
                                {errors.category}
                            </p>
                        )}
                    </div>

                    {/* Immagine */}
                    <div>
                        <label className="block text-sm font-medium text-gray-700">
                            Immagine del piatto
                        </label>
                        <input
                            type="file"
                            name="image_path"
                            onChange={handleFileChange}
                            className="mt-1 block w-full text-sm text-gray-600 rounded-md border border-gray-300 shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100"
                        />
                        {errors.image_path && (
                            <p className="mt-2 text-sm text-red-600">
                                {errors.image_path}
                            </p>
                        )}
                        {progress && (
                            <div className="mt-2 text-sm text-gray-600">
                                Caricamento: {progress.percentage}%
                            </div>
                        )}
                    </div>

                    {/* Submit */}
                    <div>
                        <button
                            type="submit"
                            className="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Salva
                        </button>
                    </div>
                </form>
            </div>
        </Layout>
    );
};

export default Create;
