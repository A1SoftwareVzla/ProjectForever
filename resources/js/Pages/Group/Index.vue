<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
import Card from '@/Components/ui/Card.vue';

defineProps({
    groups: {
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
    <Head title="Grupos" />
    <AppLayout :auth="auth">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary">Grupos</h1>
                <Button as="a" :href="route('group.create')">Crear Grupo</Button>
            </div>

            <Card class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-3 px-4 font-medium">Nombre</th>
                                <th class="text-left py-3 px-4 font-medium">Descripción</th>
                                <th class="text-left py-3 px-4 font-medium">Torneo</th>
                                <th class="text-left py-3 px-4 font-medium">Miembros</th>
                                <th class="text-right py-3 px-4 font-medium">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="group in groups" :key="group.id" class="border-b hover:bg-muted/50">
                                <td class="py-3 px-4">{{ group.name }}</td>
                                <td class="py-3 px-4">{{ group.description || '-' }}</td>
                                <td class="py-3 px-4">{{ group.tournament?.name || 'N/A' }}</td>
                                <td class="py-3 px-4">{{ group.users?.length || 0 }}</td>
                                <td class="py-3 px-4 text-right space-x-2">
                                    <Link :href="route('group.show', group.id)" class="text-sm text-primary hover:underline">Ver</Link>
                                    <Link :href="route('group.edit', group.id)" class="text-sm text-blue-600 hover:underline">Editar</Link>
                                </td>
                            </tr>
                            <tr v-if="groups.length === 0">
                                <td colspan="5" class="py-8 text-center text-muted-foreground">No hay grupos registrados</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </Card>
        </div>
    </AppLayout>
</template>
