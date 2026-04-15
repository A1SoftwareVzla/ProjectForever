<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
import Card from '@/Components/ui/Card.vue';
import Input from '@/Components/ui/Input.vue';

const form = useForm({
    name: '',
    description: '',
    active: true,
    symbol: null,
    image: null,
    teams: [],
});

const submit = () => {
    form.post(route('tournament.store'));
};

defineProps({
    teams: {
        type: Array,
        default: () => [],
    },
    auth: {
        type: Object,
        default: () => ({}),
    },
});
</script>

<template>
    <Head title="Crear Torneo" />
    <AppLayout :auth="auth">
        <div class="space-y-6">
            <h1 class="text-3xl font-bold text-primary">Crear Torneo</h1>

            <Card class="p-6">
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Nombre</label>
                        <Input v-model="form.name" type="text" required />
                        <div v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Descripción</label>
                        <textarea v-model="form.description" class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"></textarea>
                        <div v-if="form.errors.description" class="text-red-500 text-sm mt-1">{{ form.errors.description }}</div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Equipos</label>
                        <select v-model="form.teams" multiple class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2">
                            <option v-for="team in teams" :key="team.id" :value="team.id">{{ team.name }}</option>
                        </select>
                        <div v-if="form.errors.teams" class="text-red-500 text-sm mt-1">{{ form.errors.teams }}</div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Símbolo</label>
                        <input type="file" @input="form.symbol = $event.target.files[0]" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm" />
                        <div v-if="form.errors.symbol" class="text-red-500 text-sm mt-1">{{ form.errors.symbol }}</div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Imagen</label>
                        <input type="file" @input="form.image = $event.target.files[0]" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm" />
                        <div v-if="form.errors.image" class="text-red-500 text-sm mt-1">{{ form.errors.image }}</div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="active" v-model="form.active" class="rounded border-gray-300" />
                        <label for="active" class="text-sm font-medium">Activo</label>
                    </div>

                    <div class="flex space-x-2">
                        <Button type="submit" :disabled="form.processing">Guardar</Button>
                        <Link :href="route('tournament.index')" as="button" variant="outline">Cancelar</Link>
                    </div>
                </form>
            </Card>
        </div>
    </AppLayout>
</template>

<script>
import { Link } from '@inertiajs/vue3';
export default {
    components: { Link },
};
</script>
