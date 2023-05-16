<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import ActionSection from '@/Components/ActionSection.vue';
import DangerButton from '@/Components/DangerButton.vue';
import DialogModal from '@/Components/DialogModal.vue';
import InputError from '@/Components/InputError.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const deleteUser = () => {
    form.delete(route('current-user.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <ActionSection>
        <template #title>
            アカウントの削除
        </template>

        <template #description>
            アカウントを削除します
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                アカウントが削除されると、そのリソースとデータはすべて完全に削除され、二度と戻りませんので注意してください。
            </div>

            <div class="mt-5">
                <DangerButton @click="confirmUserDeletion"
                              class="btn btn-outline-success bg-gradient-to-br from-red-300 to-red-800 hover:bg-gradient-to-tl text-white rounded px-12 my-4 button-width"
                >
                    削除する
                </DangerButton>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <DialogModal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    アカウントの削除
                </template>

                <template #content>
                    アカウントを削除してもよろしいですか? アカウントが削除されると、ユーザーが保持するデータはすべて完全に削除されます。 アカウントを完全に削除することを確認するため、パスワードを入力してください。
                    <div class="mt-4">
                        <TextInput
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Password"
                            @keyup.enter="deleteUser"
                        />

                        <InputError :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <SecondaryButton @click="closeModal">
                        取り消す
                    </SecondaryButton>

                    <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        削除を確定する
                    </DangerButton>
                </template>
            </DialogModal>
        </template>
    </ActionSection>
</template>
