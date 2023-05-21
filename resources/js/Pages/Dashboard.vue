<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <div class="bg-green-100 pb-16">
        <section class="text-gray-600 body-font">
            <div class="grid grid-cols-2 gap-4 justify-items-center">
                <Link :href="route('welcome')" class="block">
                    <div class=" flex justify-center p-4 max-w-md  w-full">
                        <div class="px-4 py-6 rounded-lg text-center">
                            <img src="../../icon/カメラ.png" style="width: 128px;height: 128px"/>
                            <h2 class="title-font font-medium text-3xl text-gray-900">診断</h2>
                        </div>
                    </div>
                </Link>

                <div class="flex justify-center p-4 max-w-md  w-full">
                    <Link :href="route('welcome')" class="block">
                        <div class="px-4 py-6 rounded-lg text-center">
                            <img src="../../icon/聴診器.png" style="width: 128px;height: 128px"/>

                            <h2 class="title-font font-medium text-3xl text-gray-900">病気判定</h2>
                            <p class="leading-relaxed">実装未定</p>
                        </div>
                    </Link>
                </div>

                <Link :href="route('plantUnit')" class="block">
                    <div class="flex justify-center p-4  max-w-md w-full">
                        <div class="px-4 py-6 rounded-lg text-center">
                            <img src="../../icon/チューリップ.png" style="width: 128px;height: 128px"/>
                            <h2 class="title-font font-medium text-3xl text-gray-900">my<br>プラント</h2>
                        </div>
                    </div>
                </Link>
                <Link :href="route('todayCare')" class="block">
                    <div class="flex justify-center  max-w-md p-4 w-full">
                        <div class="px-4 py-6 rounded-lg text-center">
                            <img src="../../icon/じょうろ.png" style="width: 128px;height: 128px"/>

                            <h2 class="title-font font-medium text-3xl text-gray-900">今日の<br>お世話</h2>
                        </div>
                    </div>
                </Link>
            </div>
            <NaviFooter/>
        </section>
    </div>
</template>
<style>
object {
    width: 300px;
}
</style>
<script>

import NaviFooter from "@/Components/NaviFooter.vue";

export default {
    components: {
        NaviFooter,
    },
    props: {
        user_id: {
            type: String,
            required: true,
            default: ''
        }
    },
    data() {
        return {
            userId: this.$attrs.user.user_id
        }
    },
    methods: {}

};
</script>
