<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
import Card from '@/Components/ui/Card.vue';
import Input from '@/Components/ui/Input.vue';

defineProps({
    auth: {
        type: Object,
        default: () => ({}),
    },
    errors: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'));
};
</script>

<template>
    <Head title="Iniciar Sesión" />
    <AppLayout :auth="auth">
        <div class="max-w-md mx-auto space-y-6">
            <div class="text-center space-y-2">
                <h1 class="text-3xl font-bold text-primary">Iniciar Sesión</h1>
                <p class="text-muted-foreground">Ingresa tus credenciales para acceder</p>
            </div>

            <Card class="p-6 space-y-4">
                <form @submit.prevent="submit" class="space-y-4">
                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium">Email</label>
                        <Input
                            id="email"
                            v-model="form.email"
                            type="email"
                            placeholder="tu@email.com"
                            :class="{ 'border-destructive': errors.email }"
                        />
                        <p v-if="errors.email" class="text-sm text-destructive">{{ errors.email }}</p>
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="text-sm font-medium">Contraseña</label>
                        <Input
                            id="password"
                            v-model="form.password"
                            type="password"
                            :class="{ 'border-destructive': errors.password }"
                        />
                        <p v-if="errors.password" class="text-sm text-destructive">{{ errors.password }}</p>
                    </div>

                    <Button type="submit" class="w-full" :disabled="form.processing">
                        {{ form.processing ? 'Iniciando sesión...' : 'Iniciar Sesión' }}
                    </Button>
                </form>
            </Card>

            <p class="text-center text-sm text-muted-foreground">
                ¿No tienes cuenta?
                <Link :href="route('register')" class="text-primary hover:underline">Regístrate</Link>
            </p>
        </div>
    </AppLayout>
</template>
