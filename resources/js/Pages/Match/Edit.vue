<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
import Card from '@/Components/ui/Card.vue';

const props = defineProps({
    match: {
        type: Object,
        required: true,
    },
    fixtures: {
        type: Array,
        default: () => [],
    },
    teams: {
        type: Array,
        default: () => [],
    },
    auth: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    fixture_id: props.match.fixture?.id || '',
    local_team_id: props.match.local_team?.id || '',
    visitor_team_id: props.match.visitor_team?.id || '',
    date: props.match.date ? new Date(props.match.date).toISOString().slice(0, 16) : '',
    result: props.match.result || '',
});

const submit = () => {
    form.put(route('match.update', props.match.id), {
        onSuccess: () => {
            form.reset('result');
        },
    });
};

const formatDate = (dateString) => {
    if (!dateString) return '';
    const date = new Date(dateString);
    return date.toISOString().slice(0, 16);
};
</script>

<template>
    <Head title="Editar Partido" />
    <AppLayout :auth="auth">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary">Editar Partido</h1>
            </div>

            <Card class="p-6 max-w-2xl">
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label for="fixture_id" class="block text-sm font-medium mb-2">Jornada</label>
                        <select
                            id="fixture_id"
                            v-model="form.fixture_id"
                            :class="{ 'border-red-500': form.errors.fixture_id }"
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                        >
                            <option value="">Seleccionar jornada</option>
                            <option v-for="fixture in fixtures" :key="fixture.id" :value="fixture.id">
                                {{ fixture.name }}
                            </option>
                        </select>
                        <p v-if="form.errors.fixture_id" class="text-red-500 text-sm mt-1">{{ form.errors.fixture_id }}</p>
                    </div>

                    <div>
                        <label for="local_team_id" class="block text-sm font-medium mb-2">Equipo Local</label>
                        <select
                            id="local_team_id"
                            v-model="form.local_team_id"
                            :class="{ 'border-red-500': form.errors.local_team_id }"
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                        >
                            <option value="">Seleccionar equipo local</option>
                            <option v-for="team in teams" :key="team.id" :value="team.id">
                                {{ team.name }} ({{ team.short_name }})
                            </option>
                        </select>
                        <p v-if="form.errors.local_team_id" class="text-red-500 text-sm mt-1">{{ form.errors.local_team_id }}</p>
                    </div>

                    <div>
                        <label for="visitor_team_id" class="block text-sm font-medium mb-2">Equipo Visitante</label>
                        <select
                            id="visitor_team_id"
                            v-model="form.visitor_team_id"
                            :class="{ 'border-red-500': form.errors.visitor_team_id }"
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                        >
                            <option value="">Seleccionar equipo visitante</option>
                            <option v-for="team in teams" :key="team.id" :value="team.id" :disabled="team.id === form.local_team_id">
                                {{ team.name }} ({{ team.short_name }})
                            </option>
                        </select>
                        <p v-if="form.errors.visitor_team_id" class="text-red-500 text-sm mt-1">{{ form.errors.visitor_team_id }}</p>
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-medium mb-2">Fecha y Hora</label>
                        <input
                            id="date"
                            v-model="form.date"
                            type="datetime-local"
                            :class="{ 'border-red-500': form.errors.date }"
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                        />
                        <p v-if="form.errors.date" class="text-red-500 text-sm mt-1">{{ form.errors.date }}</p>
                    </div>

                    <div>
                        <label for="result" class="block text-sm font-medium mb-2">Resultado</label>
                        <input
                            id="result"
                            v-model="form.result"
                            type="text"
                            placeholder="Ej: 2-1"
                            :class="{ 'border-red-500': form.errors.result }"
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                        />
                        <p v-if="form.errors.result" class="text-red-500 text-sm mt-1">{{ form.errors.result }}</p>
                    </div>

                    <div class="flex gap-2 pt-4">
                        <Button type="submit" :disabled="form.processing">
                            {{ form.processing ? 'Guardando...' : 'Actualizar Partido' }}
                        </Button>
                        <Link :href="route('match.index')" class="text-sm text-muted-foreground hover:underline self-center">
                            Cancelar
                        </Link>
                    </div>
                </form>
            </Card>
        </div>
    </AppLayout>
</template>
