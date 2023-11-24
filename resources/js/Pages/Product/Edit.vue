<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    product: {
        type: Object,
        default: () => ({}),
    }
});

const form = useForm({
    id : props.product.id,
    name : props.product.name,
    status : props.product.status,
});

const submit = () => {
  form.put(route('product.update', props.product.id));
};

</script>

<template>
    <Head title="Edit Produk"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Produk
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-71xl sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form @submit.prevent="submit">
                        <div class="my-6">
                            <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Nama Produk</label>
                            <input id="name" type="text" class="mt-1 block w-full" 
                                        v-model="form.name" required autofocus
                                        autocomplete="false" />
                            <div v-if="form.errors.name" class="text-sm text-red-600">
                                    {{ form.errors.name }}
                            </div>
                        </div>
                            
                        <div class="my-6">
                            <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Status Produk</label>
                            <select v-model="form.status" id="status" class="mt-1 block w-full">
                                <option value="Y">Aktif</option>
                                <option value="N">Tidak Aktif</option>
                            </select>
                            <div v-if="form.errors.status" class="text-sm text-red-600">
                                    {{ form.errors.status }}
                            </div>
                        </div>
                        <button class="bg-sky-600 hover:bg-sky-900 text-white font-bold py-2 px-4 rounded"
                                type="submit"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Update
                        </button>
                        <Link :href="route('product.index')">
                            <button class="bg-slate-400 hover:bg-slate-800 text-white font-bold py-2 px-4 mx-2 rounded">
                                Batal
                            </button>
                        </Link>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>