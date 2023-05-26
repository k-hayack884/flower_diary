<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue';
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import {Inertia} from "@inertiajs/inertia";

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
const logout = () => {
    Inertia.post(route('logout'));
};

</script>

<template>

    <!--    <AppLayout title="Profile">-->
    <div class="bg-green-100  pb-16">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight sm:px-6 lg:px-8 py-10">
            ユーザー設定
        </h2>
        <SectionBorder/>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <UpdateProfileInformationForm :user="$page.props.user"/>
                    <SectionBorder/>
                </div>

                <div v-if="$page.props.jetstream.canUpdatePassword">
                    <UpdatePasswordForm class="mt-10 sm:mt-0"/>
                    <SectionBorder/>
                </div>
                <div class="md:grid md:grid-cols-3 md:gap-6 mt-10 sm:mt-0">
                    <div class="md:col-span-1 flex justify-between">
                        <div class="px-4 sm:px-0"><h3 class="text-lg font-medium text-gray-900"> ログアウト </h3>
                            <p class="mt-1 text-sm text-gray-600"> ログアウトをします </p></div>

                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class=" bg-white shadow sm:rounded-lg">
                            <div class="mt-5"></div>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow ">
                            <form method="POST" @submit.prevent="logout">
                                <button
                                    class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-12 my-4 button-width">
                                    ログアウト
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <SectionBorder/>
                <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                    <DeleteUserForm class="mt-10 sm:mt-0"/>
                </template>
            </div>
        </div>
    </div>
    <NaviFooter/>
    <!--    </AppLayout>-->


</template>
<script>
import NaviFooter from "@/Components/NaviFooter.vue";
import LoadWait from "@/Components/LoadWait.vue";

export default {
    components: {
        LoadWait,
        NaviFooter,
    },
}
</script>
