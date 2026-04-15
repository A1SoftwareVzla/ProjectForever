<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
import Card from '@/Components/ui/Card.vue';

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
</script>

<template>
    <Head :title="team.name" />
    <AppLayout :auth="auth">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary">{{ team.name }}</h1>
                <div class="space-x-2">
                    <Link :href="route('team.edit', team.id)">
                        <Button variant="outline">Editar</Button>
                    </Link>
                    <Link :href="route('team.index')">
                        <Button variant="ghost">Volver</Button>
                    </Link>
                </div>
            </div>

            <Card class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col items-center">
                        <img 
                            v-if="team.symbol" 
                            :src="team.symbol" 
                            :alt="team.name" 
                            class="w-48 h-48 object-contain"
                        />
                        <div v-else class="w-48 h-48 bg-muted rounded-full flex items-center justify-center">
                            <span class="text-muted-foreground">Sin escudo</span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-muted-foreground">Nombre Completo</h3>
                            <p class="text-lg">{{ team.name }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-muted-foreground">Nombre Corto</h3>
                            <p class="text-lg">{{ team.short_name }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-muted-foreground">ID</h3>
                            <p class="text-lg">{{ team.id }}</p>
                        </div>
                    </div>
                </div>
            </Card>
        </div>
    </AppLayout>
</template>
