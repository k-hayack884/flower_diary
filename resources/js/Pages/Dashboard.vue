<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

    </AppLayout>
</template>

<script>

export default {
    props: {
        userId: null,
        value: {
            type: String,
            default: null
        }
    },
    data() {
        return {}
    },
    // created: async function () {
    //     this.getWeather();
    // },
    // メインの関数（ここでは定義しているだけでボタンクリックされたら実行）
    // awaitを使うとき（非同期）はasync
    methods: {}

};
</script>
