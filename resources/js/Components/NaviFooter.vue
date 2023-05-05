<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
</script>

<template>
    <footer class="text-gray-600 body-font bg-green-700">
        <div class="container lg:px-5 mx-auto flex justify-center flex-wrap">
            <div class="w-1/5 p-4">
                <div class="flex items-center justify-center rounded-lg text-center flex-col">
                    <Link :href="route('dashboard')" class="block">
                        <div class="flex justify-center">
                            <img src="../../icon/ホーム.png" style="width: 32px;height: 32px" class="flex justify-center"/>
                        </div>
                        <h2 class="title-font font-medium text-sm lg:text-xl text-gray-900">ホーム</h2>
                    </Link>
                </div>

            </div>
            <div class="w-1/5 p-4">
                <div class="flex items-center justify-center rounded-lg text-center flex-col">
                    <Link :href="route('welcome')" class="block">
                        <div class="flex justify-center">
                            <img src="../../icon/カメラ.png" style="width: 32px;height: 32px" class="flex justify-center"/>
                        </div>
                        <h2 class="title-font font-medium text-sm lg:text-xl text-gray-900">診断</h2>

                    </Link>

                </div>
            </div>
            <div class="w-1/5 p-4">
                <div class="flex items-center justify-center rounded-lg text-center flex-col">
                    <Link :href="route('welcome')" class="block">
                        <div class="flex justify-center">

                            <img src="../../icon/聴診器.png" style="width: 32px;height: 32px"/>
                        </div>
                        <h2 class="title-font font-medium text-sm lg:text-xl text-gray-900">病気判定</h2>


                    </Link>
                </div>

            </div>
            <div class="w-1/5 p-4">

                <div class="flex items-center justify-center rounded-lg text-center flex-col">
                    <Link :href="route('plantUnit')" class="block">
                        <div class="flex justify-center">

                            <img src="../../icon/チューリップ.png" style="width: 32px;height: 32px"/>
                        </div>

                        <h2 class="title-font font-medium text-sm lg:text-xl text-gray-900">myプラント</h2>
                    </Link>
                </div>

            </div>
            <div class="w-1/5 p-4">

                <div class="flex items-center justify-center rounded-lg text-center flex-col">


                    <Link :href="route('todayCare')" class="block">
                        <div class="flex justify-center">
                            <img src="../../icon/じょうろ.png" style="width: 32px;height: 32px"/>
                        </div>
                        <h2 class="title-font font-medium text-sm lg:text-xl text-gray-900">お世話</h2>
                    </Link>
                </div>

            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "NaviFooter",

}
</script>

<style scoped>
footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
}
</style>
