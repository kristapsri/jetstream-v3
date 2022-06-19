<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@Components/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@Components/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@Components/Jetstream/Button.vue';
import JetInput from '@Components/Jetstream/Input.vue';
import JetLabel from '@Components/Jetstream/Label.vue';
import JetValidationErrors from '@Components/Jetstream/ValidationErrors.vue';

const form = useForm({
    password: '',
});

const passwordInput = ref(null);

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => {
            form.reset();

            passwordInput.value.focus();
        },
    });
};
</script>

<template>
    <Head title="Secure Area" />

    <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <JetValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <JetLabel for="password" value="Password" />
                <JetInput
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                    autofocus
                />
            </div>

            <div class="flex justify-end mt-4">
                <JetButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
