<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    products: {
        type: Object,
        default: () => ({}),
    }
});

const form = useForm({});

function destroy(id){
    if (confirm("Yakin Mau Menghapus Produk Ini?")) {
        form.delete(route("product.destroy", id));
    }
}

</script>

<template>
    <Head title="Daftar Produk"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Daftar Produk
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-71xl sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <Link :href="route('product.create')">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Tambah Produk</button>
                        </Link>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No. </th>
                                    <th scope="col" class="px-6 py-3">Nama Produk</th>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="products && products.length">
                                <tr v-for="(product, index) in products" :key="product.id" 
                                    class="bg-white border-b dark:bg-gray-900 dark:text-white whitespace-nowrap">
                                    <td scope="row" 
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ index + 1 }}
                                    </td>
                                    <td scope="row" 
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ product.name }}
                                    </td>
                                    <td scope="row" 
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <span v-if="product.status === 'Y'" class="inline-block px-2 py-1 bg-green-500 text-white rounded-full">Aktif</span>
                                        <span v-else class="inline-block px-2 py-1 bg-red-500 text-white rounded-full">Tidak Aktif</span>
                                    </td>
                                    <td scope="row" 
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <Link :href="route('product.edit', product.id)">
                                            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mx-2">
                                                    Edit
                                            </button>
                                        </Link>
                                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" @click="destroy(product.id)">
                                                Delete
                                            </button>
                                    </td>
                                </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="4" class="text-center py-4">No Data</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>