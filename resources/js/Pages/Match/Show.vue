<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
import Card from '@/Components/ui/Card.vue';

const props = defineProps({
    match: {
        type: Object,
        required: true,
    },
    auth: {
        type: Object,
        default: () => ({}),
    },
});

const formatDate = (dateString) => {
    if (!dateString) return 'Fecha no definida';
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
    <Head title="Detalle del Partido" />
    <AppLayout :auth="auth">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary">Detalle del Partido</h1>
                <div class="space-x-2">
                    <Link :href="route('match.edit', match.id)">
                        <Button variant="outline">Editar</Button>
                    </Link>
                    <Link :href="route('match.index')">
                        <Button variant="ghost">Volver</Button>
                    </Link>
                </div>
            </div>

            <Card class="p-6">
                <div class="space-y-6">
                    <!-- Encabezado del partido -->
                    <div class="text-center">
                        <h2 class="text-xl font-semibold mb-2">{{ match.fixture?.name || 'Jornada' }}</h2>
                        <p class="text-muted-foreground">{{ formatDate(match.date) }}</p>
                    </div>

                    <!-- Marcador -->
                    <div class="grid grid-cols-3 gap-4 items-center">
                        <!-- Equipo Local -->
                        <div class="flex flex-col items-center">
                            <img 
                                v-if="match.local_team?.symbol" 
                                :src="match.local_team.symbol" 
                                :alt="match.local_team.name" 
                                class="w-24 h-24 object-contain mb-2"
                            />
                            <div v-else class="w-24 h-24 bg-muted rounded-full flex items-center justify-center mb-2">
                                <span class="text-muted-foreground">Sin escudo</span>
                            </div>
                            <h3 class="font-bold text-lg">{{ match.local_team?.name || 'N/A' }}</h3>
                            <p class="text-sm text-muted-foreground">{{ match.local_team?.short_name }}</p>
                        </div>

                        <!-- Resultado -->
                        <div class="text-center">
                            <div class="text-4xl font-bold text-primary mb-2">
                                {{ match.result || 'VS' }}
                            </div>
                            <p v-if="!match.result" class="text-sm text-muted-foreground">Por jugar</p>
                        </div>

                        <!-- Equipo Visitante -->
                        <div class="flex flex-col items-center">
                            <img 
                                v-if="match.visitor_team?.symbol" 
                                :src="match.visitor_team.symbol" 
                                :alt="match.visitor_team.name" 
                                class="w-24 h-24 object-contain mb-2"
                            />
                            <div v-else class="w-24 h-24 bg-muted rounded-full flex items-center justify-center mb-2">
                                <span class="text-muted-foreground">Sin escudo</span>
                            </div>
                            <h3 class="font-bold text-lg">{{ match.visitor_team?.name || 'N/A' }}</h3>
                            <p class="text-sm text-muted-foreground">{{ match.visitor_team?.short_name }}</p>
                        </div>
                    </div>

                    <!-- Información adicional -->
                    <div class="border-t pt-4 mt-4">
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-muted-foreground">ID del Partido</dt>
                                <dd class="text-lg">{{ match.id }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-muted-foreground">Jornada</dt>
                                <dd class="text-lg">{{ match.fixture?.name || 'No asignada' }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </Card>
        </div>
    </AppLayout>
</template>
