<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
</script>

<template>
    <footer class="text-gray-600 body-font bg-green-700">
        <div class="container lg:px-5 mx-auto flex justify-center flex-wrap">
            <div class="w-1/5 p-4">
                <Link :href="route('dashboard')" class="block">
                    <div class="flex items-center justify-center rounded-lg text-center flex-col">
                        <img src="../../icon/ホーム.png" style="width: 64px;height: 64px" class="flex justify-center"/>
                        <h2 class="title-font font-medium text-sm lg:text-xl text-gray-900">ホーム</h2>
                    </div>
                </Link>
            </div>
            <div class="w-1/5 p-4">
                <Link :href="route('welcome')" class="block">
                    <div class="flex items-center justify-center rounded-lg text-center flex-col">
                        <img src="../../icon/カメラ.png" style="width: 64px;height: 64px" class="flex justify-center"/>
                        <h2 class="title-font font-medium text-sm lg:text-xl text-gray-900">診断</h2>
                    </div>
                </Link>
            </div>
            <div class="w-1/5 p-4">
                <Link :href="route('welcome')" class="block">
                    <div class="flex items-center justify-center rounded-lg text-center flex-col">
                        <img src="../../icon/聴診器.png" style="width: 64px;height: 64px"/>
                        <h2 class="title-font font-medium text-sm lg:text-xl text-gray-900">病気判定</h2>
                    </div>
                </Link>
            </div>
            <div class="w-1/5 p-4">
                <Link :href="route('plantUnit')" class="block">
                    <div class="flex items-center justify-center rounded-lg text-center flex-col">
                        <img src="../../icon/チューリップ.png" style="width: 64px;height: 64px"/>
                        <h2 class="title-font font-medium text-sm lg:text-xl text-gray-900">my<br>プラント</h2>
                    </div>
                </Link>
            </div>
            <div class="w-1/5 p-4">
                <Link :href="route('todayCare')" class="block">
                    <div class="flex items-center justify-center rounded-lg text-center flex-col">
                        <img src="../../icon/じょうろ.png" style="width: 64px;height: 64px"/>
                        <h2 class="title-font font-medium text-sm lg:text-xl text-gray-900">今日の<br>お世話</h2>
                    </div>
                </Link>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "NaviFooter"
}
</script>

<style scoped>

</style>
