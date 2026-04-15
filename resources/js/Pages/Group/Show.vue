<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
import Card from '@/Components/ui/Card.vue';

const props = defineProps({
    group: {
        type: Object,
        required: true,
    },
    auth: {
        type: Object,
        default: () => ({}),
    },
});
</script>

<template>
    <Head :title="group.name" />
    <AppLayout :auth="auth">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary">{{ group.name }}</h1>
                <div class="space-x-2">
                    <Link :href="route('group.edit', group.id)">
                        <Button variant="outline">Editar</Button>
                    </Link>
                    <Link :href="route('group.index')">
                        <Button variant="ghost">Volver</Button>
                    </Link>
                </div>
            </div>

            <Card class="p-6">
                <div class="space-y-6">
                    <!-- Información básica -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-sm font-medium text-muted-foreground">Nombre</h3>
                            <p class="text-lg">{{ group.name }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-muted-foreground">Torneo</h3>
                            <p class="text-lg">{{ group.tournament?.name || 'N/A' }}</p>
                        </div>

                        <div class="md:col-span-2">
                            <h3 class="text-sm font-medium text-muted-foreground">Descripción</h3>
                            <p class="text-lg">{{ group.description || 'Sin descripción' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-muted-foreground">Token de Invitación</h3>
                            <code class="bg-muted px-2 py-1 rounded">{{ group.token_invitation || 'No generado' }}</code>
                        </div>
                    </div>

                    <!-- Miembros -->
                    <div class="border-t pt-4 mt-4">
                        <h3 class="text-lg font-semibold mb-4">Miembros ({{ group.users?.length || 0 }})</h3>
                        <div v-if="group.users && group.users.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div 
                                v-for="user in group.users" 
                                :key="user.id"
                                class="flex items-center gap-3 p-3 border rounded-md"
                            >
                                <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                    <span class="text-primary font-semibold">{{ user.name?.charAt(0).toUpperCase() }}</span>
                                </div>
                                <div>
                                    <p class="font-medium">{{ user.name }}</p>
                                    <p class="text-sm text-muted-foreground">{{ user.email }}</p>
                                </div>
                            </div>
                        </div>
                        <p v-else class="text-muted-foreground">No hay miembros en este grupo</p>
                    </div>
                </div>
            </Card>
        </div>
    </AppLayout>
</template>
