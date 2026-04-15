<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
import Card from '@/Components/ui/Card.vue';

defineProps({
    matches: {
        type: Array,
        default: () => [],
    },
    auth: {
        type: Object,
        default: () => ({}),
    },
});

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('es-ES', { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
};
</script>

<template>
    <Head title="Partidos" />
    <AppLayout :auth="auth">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary">Partidos</h1>
                <Button as="a" :href="route('match.create')">Crear Partido</Button>
            </div>

            <Card class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-3 px-4 font-medium">Fecha</th>
                                <th class="text-left py-3 px-4 font-medium">Local</th>
                                <th class="text-left py-3 px-4 font-medium">Visitante</th>
                                <th class="text-left py-3 px-4 font-medium">Resultado</th>
                                <th class="text-left py-3 px-4 font-medium">Jornada</th>
                                <th class="text-right py-3 px-4 font-medium">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="match in matches" :key="match.id" class="border-b hover:bg-muted/50">
                                <td class="py-3 px-4">{{ formatDate(match.date) }}</td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-2">
                                        <img v-if="match.local_team?.symbol" :src="match.local_team.symbol" :alt="match.local_team.name" class="w-6 h-6 object-contain" />
                                        {{ match.local_team?.name || 'N/A' }}
                                    </div>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-2">
                                        <img v-if="match.visitor_team?.symbol" :src="match.visitor_team.symbol" :alt="match.visitor_team.name" class="w-6 h-6 object-contain" />
                                        {{ match.visitor_team?.name || 'N/A' }}
                                    </div>
                                </td>
                                <td class="py-3 px-4 font-medium">{{ match.result || '-' }}</td>
                                <td class="py-3 px-4">{{ match.fixture?.name || '-' }}</td>
                                <td class="py-3 px-4 text-right space-x-2">
                                    <Link :href="route('match.show', match.id)" class="text-sm text-primary hover:underline">Ver</Link>
                                    <Link :href="route('match.edit', match.id)" class="text-sm text-blue-600 hover:underline">Editar</Link>
                                </td>
                            </tr>
                            <tr v-if="matches.length === 0">
                                <td colspan="6" class="py-8 text-center text-muted-foreground">No hay partidos registrados</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </Card>
        </div>
    </AppLayout>
</template>
