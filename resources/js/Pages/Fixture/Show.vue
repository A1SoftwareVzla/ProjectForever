<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/ui/Button.vue';
import Card from '@/Components/ui/Card.vue';

const props = defineProps({
    fixture: {
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
    <Head :title="fixture.name" />
    <AppLayout :auth="auth">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary">{{ fixture.name }}</h1>
                <div class="space-x-2">
                    <Link :href="route('fixture.edit', fixture.id)">
                        <Button variant="outline">Editar</Button>
                    </Link>
                    <Link :href="route('fixture.index')">
                        <Button variant="ghost">Volver</Button>
                    </Link>
                </div>
            </div>

            <Card class="p-6">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Nombre</dt>
                        <dd class="text-lg">{{ fixture.name }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Torneo</dt>
                        <dd class="text-lg">{{ fixture.tournament?.name || 'N/A' }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">ID</dt>
                        <dd class="text-lg">{{ fixture.id }}</dd>
                    </div>
                </dl>
            </Card>
        </div>
    </AppLayout>
</template>
