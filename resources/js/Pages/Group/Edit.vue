<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
import Card from '@/Components/ui/Card.vue';

const props = defineProps({
    group: {
        type: Object,
        required: true,
    },
    tournaments: {
        type: Array,
        default: () => [],
    },
    auth: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    name: props.group.name,
    description: props.group.description || '',
    tournament_id: props.group.tournament?.id || '',
});

const submit = () => {
    form.put(route('group.update', props.group.id), {
        onSuccess: () => {},
    });
};
</script>

<template>
    <Head title="Editar Grupo" />
    <AppLayout :auth="auth">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary">Editar Grupo</h1>
            </div>

            <Card class="p-6 max-w-2xl">
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium mb-2">Nombre del Grupo</label>
                        <Input
                            id="name"
                            v-model="form.name"
                            type="text"
                            placeholder="Ej: Grupo de Amigos"
                            :class="{ 'border-red-500': form.errors.name }"
                        />
                        <p v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</p>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium mb-2">Descripción</label>
                        <textarea
                            id="description"
                            v-model="form.description"
                            rows="3"
                            placeholder="Descripción opcional del grupo"
                            :class="{ 'border-red-500': form.errors.description }"
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                        ></textarea>
                        <p v-if="form.errors.description" class="text-red-500 text-sm mt-1">{{ form.errors.description }}</p>
                    </div>

                    <div>
                        <label for="tournament_id" class="block text-sm font-medium mb-2">Torneo (Opcional)</label>
                        <select
                            id="tournament_id"
                            v-model="form.tournament_id"
                            :class="{ 'border-red-500': form.errors.tournament_id }"
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                        >
                            <option value="">Seleccionar torneo</option>
                            <option v-for="tournament in tournaments" :key="tournament.id" :value="tournament.id">
                                {{ tournament.name }}
                            </option>
                        </select>
                        <p v-if="form.errors.tournament_id" class="text-red-500 text-sm mt-1">{{ form.errors.tournament_id }}</p>
                    </div>

                    <div class="flex gap-2 pt-4">
                        <Button type="submit" :disabled="form.processing">
                            {{ form.processing ? 'Guardando...' : 'Actualizar Grupo' }}
                        </Button>
                        <Link :href="route('group.index')" class="text-sm text-muted-foreground hover:underline self-center">
                            Cancelar
                        </Link>
                    </div>
                </form>
            </Card>
        </div>
    </AppLayout>
</template>

<script>
import Input from '@/Components/ui/Input.vue';

export default {
    components: {
        Input,
    },
};
</script>
