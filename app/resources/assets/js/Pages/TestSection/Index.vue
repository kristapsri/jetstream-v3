<script setup>
import AppLayout from '@Layouts/AppLayout.vue';
</script>
<template>
    <AppLayout title="Test section">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Test section
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                You have an administrator role if you can see this section
            </div>
        </div>
    </AppLayout>
</template>
