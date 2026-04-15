<script setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Card from '@/Components/ui/Card.vue';

defineProps({
    auth: {
        type: Object,
        default: () => ({}),
    },
});
</script>

<template>
    <Head title="Inicio" />
    <AppLayout :auth="auth">
        <div class="space-y-6">
            <h1 class="text-3xl font-bold text-primary">Panel Principal</h1>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <Card class="p-6">
                    <div class="text-2xl font-semibold">Torneos Activos</div>
                    <p class="text-muted-foreground mt-2">Participa en los torneos disponibles</p>
                </Card>
                
                <Card class="p-6">
                    <div class="text-2xl font-semibold">Mis Grupos</div>
                    <p class="text-muted-foreground mt-2">Compite con tus amigos</p>
                </Card>
                
                <Card class="p-6">
                    <div class="text-2xl font-semibold">Pronósticos</div>
                    <p class="text-muted-foreground mt-2">Realiza tus predicciones</p>
                </Card>
                
                <Card class="p-6">
                    <div class="text-2xl font-semibold">Estadísticas</div>
                    <p class="text-muted-foreground mt-2">Revisa tu rendimiento</p>
                </Card>
            </div>
        </div>
    </AppLayout>
</template>
