<script setup>
import { Link, Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
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
        <div class="space-y-8">
            <div class="text-center space-y-4">
                <h1 class="text-4xl font-bold text-primary">Bienvenido a ForecastBet</h1>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                    La plataforma definitiva para hacer pronósticos deportivos con tus amigos. 
                    Compite en grupos, sigue torneos y demuestra quién es el mejor pronosticador.
                </p>
                <div class="flex justify-center gap-4 pt-4">
                    <Link v-if="!auth.user" :href="route('register')">
                        <Button size="lg">Comenzar Ahora</Button>
                    </Link>
                    <Link v-if="!auth.user" :href="route('login')">
                        <Button variant="outline" size="lg">Iniciar Sesión</Button>
                    </Link>
                    <Link v-if="auth.user" :href="route('tournament.index')">
                        <Button size="lg">Ver Torneos</Button>
                    </Link>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6 pt-8">
                <Card class="p-6 space-y-4">
                    <div class="text-3xl">🏆</div>
                    <h3 class="text-xl font-semibold">Torneos</h3>
                    <p class="text-muted-foreground">
                        Participa en torneos de fútbol y compite por la gloria.
                    </p>
                </Card>

                <Card class="p-6 space-y-4">
                    <div class="text-3xl">👥</div>
                    <h3 class="text-xl font-semibold">Grupos</h3>
                    <p class="text-muted-foreground">
                        Crea o únete a grupos con tus amigos y compite entre ustedes.
                    </p>
                </Card>

                <Card class="p-6 space-y-4">
                    <div class="text-3xl">📊</div>
                    <h3 class="text-xl font-semibold">Estadísticas</h3>
                    <p class="text-muted-foreground">
                        Sigue tu rendimiento y compara con otros jugadores.
                    </p>
                </Card>
            </div>
        </div>
    </AppLayout>
</template>
