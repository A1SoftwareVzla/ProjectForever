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
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    gender: 'M',
});

const submit = () => {
    form.post(route('register'));
};
</script>

<template>
    <Head title="Registrarse" />
    <AppLayout :auth="auth">
        <div class="max-w-md mx-auto space-y-6">
            <div class="text-center space-y-2">
                <h1 class="text-3xl font-bold text-primary">Crear Cuenta</h1>
                <p class="text-muted-foreground">Únete a ForecastBet gratis</p>
            </div>

            <Card class="p-6 space-y-4">
                <form @submit.prevent="submit" class="space-y-4">
                    <div class="space-y-2">
                        <label for="name" class="text-sm font-medium">Nombre</label>
                        <Input
                            id="name"
                            v-model="form.name"
                            type="text"
                            placeholder="Tu nombre"
                            :class="{ 'border-destructive': errors.name }"
                        />
                        <p v-if="errors.name" class="text-sm text-destructive">{{ errors.name }}</p>
                    </div>

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

                    <div class="space-y-2">
                        <label for="password_confirmation" class="text-sm font-medium">Confirmar Contraseña</label>
                        <Input
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            type="password"
                        />
                    </div>

                    <div class="space-y-2">
                        <label for="gender" class="text-sm font-medium">Género</label>
                        <select
                            id="gender"
                            v-model="form.gender"
                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm"
                        >
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>

                    <Button type="submit" class="w-full" :disabled="form.processing">
                        {{ form.processing ? 'Creando cuenta...' : 'Registrarse' }}
                    </Button>
                </form>
            </Card>

            <p class="text-center text-sm text-muted-foreground">
                ¿Ya tienes cuenta?
                <Link :href="route('login')" class="text-primary hover:underline">Inicia sesión</Link>
            </p>
        </div>
    </AppLayout>
</template>
