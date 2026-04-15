<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
import Card from '@/Components/ui/Card.vue';
import Input from '@/Components/ui/Input.vue';

const props = defineProps({
    team: {
        type: Object,
        required: true,
    },
    auth: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    name: props.team.name,
    short_name: props.team.short_name,
    symbol: null,
});

const submit = () => {
    form.put(route('team.update', props.team.id), {
        onSuccess: () => {
            form.reset('symbol');
        },
    });
};
</script>

<template>
    <Head title="Editar Equipo" />
    <AppLayout :auth="auth">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary">Editar Equipo</h1>
            </div>

            <Card class="p-6 max-w-2xl">
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium mb-2">Nombre del Equipo</label>
                        <Input
                            id="name"
                            v-model="form.name"
                            type="text"
                            placeholder="Ej: Real Madrid"
                            :class="{ 'border-red-500': form.errors.name }"
                        />
                        <p v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</p>
                    </div>

                    <div>
                        <label for="short_name" class="block text-sm font-medium mb-2">Nombre Corto</label>
                        <Input
                            id="short_name"
                            v-model="form.short_name"
                            type="text"
                            placeholder="Ej: RMA"
                            :class="{ 'border-red-500': form.errors.short_name }"
                        />
                        <p v-if="form.errors.short_name" class="text-red-500 text-sm mt-1">{{ form.errors.short_name }}</p>
                    </div>

                    <div>
                        <label for="symbol" class="block text-sm font-medium mb-2">Escudo</label>
                        <div v-if="team.symbol" class="mb-2">
                            <img :src="team.symbol" :alt="team.name" class="w-16 h-16 object-contain" />
                        </div>
                        <input
                            id="symbol"
                            type="file"
                            accept="image/*"
                            @change="form.symbol = $event.target.files[0]"
                            :class="{ 'border-red-500': form.errors.symbol }"
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                        />
                        <p v-if="form.errors.symbol" class="text-red-500 text-sm mt-1">{{ form.errors.symbol }}</p>
                    </div>

                    <div class="flex gap-2 pt-4">
                        <Button type="submit" :disabled="form.processing">
                            {{ form.processing ? 'Guardando...' : 'Actualizar Equipo' }}
                        </Button>
                        <Link :href="route('team.index')" class="text-sm text-muted-foreground hover:underline self-center">
                            Cancelar
                        </Link>
                    </div>
                </form>
            </Card>
        </div>
    </AppLayout>
</template>
