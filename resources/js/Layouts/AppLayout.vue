<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    auth: {
        type: Object,
        default: () => ({}),
    },
});
</script>

<template>
    <div class="min-h-screen bg-background">
        <nav class="border-b bg-card">
            <div class="container mx-auto px-4">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <Link :href="route('home')" class="text-xl font-bold text-primary">
                            ForecastBet
                        </Link>
                        <template v-if="auth.user">
                            <Link :href="route('tournament.index')" class="ml-6 text-sm font-medium text-muted-foreground hover:text-foreground">
                                Torneos
                            </Link>
                            <Link :href="route('group.index')" class="ml-4 text-sm font-medium text-muted-foreground hover:text-foreground">
                                Grupos
                            </Link>
                            <Link :href="route('forecast.index')" class="ml-4 text-sm font-medium text-muted-foreground hover:text-foreground">
                                Pronósticos
                            </Link>
                        </template>
                    </div>
                    <div class="flex items-center space-x-4">
                        <template v-if="auth.user">
                            <span class="text-sm text-muted-foreground">{{ auth.user.name }}</span>
                            <Link
                                :href="route('logout')"
                                method="post"
                                as="button"
                                class="text-sm font-medium text-muted-foreground hover:text-foreground"
                            >
                                Cerrar Sesión
                            </Link>
                        </template>
                        <template v-else>
                            <Link :href="route('login')" class="text-sm font-medium text-muted-foreground hover:text-foreground">
                                Iniciar Sesión
                            </Link>
                            <Link :href="route('register')" class="text-sm font-medium text-primary hover:underline">
                                Registrarse
                            </Link>
                        </template>
                    </div>
                </div>
            </div>
        </nav>

        <main class="container mx-auto px-4 py-8">
            <slot />
        </main>
    </div>
</template>
