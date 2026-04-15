<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
import Card from '@/Components/ui/Card.vue';

defineProps({
    tournaments: {
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
    <Head title="Torneos" />
    <AppLayout :auth="auth">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary">Torneos</h1>
                <Button as="a" :href="route('tournament.create')">Crear Torneo</Button>
            </div>

            <Card class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-3 px-4 font-medium">Nombre</th>
                                <th class="text-left py-3 px-4 font-medium">Descripción</th>
                                <th class="text-left py-3 px-4 font-medium">Estado</th>
                                <th class="text-right py-3 px-4 font-medium">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="tournament in tournaments" :key="tournament.id" class="border-b hover:bg-muted/50">
                                <td class="py-3 px-4">{{ tournament.name }}</td>
                                <td class="py-3 px-4">{{ tournament.description }}</td>
                                <td class="py-3 px-4">
                                    <span :class="['px-2 py-1 rounded-full text-xs', tournament.active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800']">
                                        {{ tournament.active ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-right space-x-2">
                                    <Link :href="route('tournament.show', tournament.id)" class="text-sm text-primary hover:underline">Ver</Link>
                                    <Link :href="route('tournament.edit', tournament.id)" class="text-sm text-blue-600 hover:underline">Editar</Link>
                                </td>
                            </tr>
                            <tr v-if="tournaments.length === 0">
                                <td colspan="4" class="py-8 text-center text-muted-foreground">No hay torneos registrados</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </Card>
        </div>
    </AppLayout>
</template>
