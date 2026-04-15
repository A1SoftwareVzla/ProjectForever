<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
import Card from '@/Components/ui/Card.vue';

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
    <Head title="Equipos" />
    <AppLayout :auth="auth">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary">Equipos</h1>
                <Button as="a" :href="route('team.create')">Crear Equipo</Button>
            </div>

            <Card class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-3 px-4 font-medium">Escudo</th>
                                <th class="text-left py-3 px-4 font-medium">Nombre</th>
                                <th class="text-left py-3 px-4 font-medium">Nombre Corto</th>
                                <th class="text-right py-3 px-4 font-medium">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="team in teams" :key="team.id" class="border-b hover:bg-muted/50">
                                <td class="py-3 px-4">
                                    <img v-if="team.symbol" :src="team.symbol" :alt="team.name" class="w-10 h-10 object-contain" />
                                    <span v-else class="text-muted-foreground">Sin escudo</span>
                                </td>
                                <td class="py-3 px-4">{{ team.name }}</td>
                                <td class="py-3 px-4">{{ team.short_name }}</td>
                                <td class="py-3 px-4 text-right space-x-2">
                                    <Link :href="route('team.show', team.id)" class="text-sm text-primary hover:underline">Ver</Link>
                                    <Link :href="route('team.edit', team.id)" class="text-sm text-blue-600 hover:underline">Editar</Link>
                                </td>
                            </tr>
                            <tr v-if="teams.length === 0">
                                <td colspan="4" class="py-8 text-center text-muted-foreground">No hay equipos registrados</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </Card>
        </div>
    </AppLayout>
</template>
