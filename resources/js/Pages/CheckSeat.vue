Comment.vue
<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import FertilizerSettingModal from "@/Components/FertilizerSettingModal.vue";
import WaterSettingModal from "@/Components/WaterSettingModal.vue";
import {reactive} from "vue";
</script>
<template>
    <div class="bg-green-100 pb-16">

        <LoadWait :show="isLoading"
                  class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50"></LoadWait>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">お世話の設定</h1>
                </div>
                <h1 class="relative py-1">
                <span
                    class="absolute font-bold font-fontawesome content-'\\f00c Check' bg-green-500 text-white left-0 bottom-full rounded-t-md px-4 py-2 text-sm leading-tight tracking-widest"> 水やり</span>
                    <span
                        class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-green-600 to-transparent"></span>
                </h1>
                <div class="flex flex-wrap m-4">
                    <div v-for="(waterSetting,index) in waterSettings" class="w-full sm:w-1/2 lg:w-1/3 p-4 ">
                        <div class="p-4 h-104 w-auto">
                            <div class="border border-gray-200 rounded-lg text-center p-6 bg-white">
                                <div
                                    class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 ">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                    </svg>
                                </div>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">水やり設定{{
                                        index + 1
                                    }}</h2>
                                <div class="mx-8">
                                    <ul class="text-left">
                                        <li>
                                            設定月:{{ waterSetting.months }}
                                        </li>
                                        <li v-if="waterSetting.waterAmount === 'a_lot'">
                                            <p>水やり量:たっぷり</p>
                                        </li>
                                        <li v-else-if="waterSetting.waterAmount === 'moderate_amount'">
                                            <p>水やり量:適量</p>
                                        </li>
                                        <li v-else-if="waterSetting.waterAmount === 'sparingly'">
                                            <p>水やり量:ひかえめ</p>
                                        </li>
                                        <li>
                                            水やり間隔:{{ waterSetting.wateringInterval }}日に{{
                                                waterSetting.wateringTimes
                                            }}回
                                        </li>
                                        <li>
                                            備考:{{ waterSetting.note }}
                                        </li>
                                        <li>
                                            通知時間:{{ waterSetting.alertTimes }}
                                        </li>
                                    </ul>
                                </div>
                                <button @click="openWaterModal(); getIndex(index)"
                                        class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8">
                                    設定する
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <button @click="openWaterModal(),getIndex(null)"
                        class="flex mx-auto btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8"
                >
                    作成する
                </button>
                <WaterSettingModal :open-modal="isWaterModalOpen" @closeModal="closeWaterModal"
                                   v-if="waterSettings[arrayIndex]"
                                   :waterSetting="waterSettings[arrayIndex]"/>

                <WaterSettingModal :open-modal="isWaterModalOpen" @closeModal="closeWaterModal"
                                   @add-water-setting="addWaterSetting"
                                   v-else
                                   :waterSetting="reactive({
                                        checkSeatId:checkSeatId,
                                        waterSettingId: '',
                                        months: [],
                                        note: '',
                                        waterAmount: 'moderate_amount',
                                        wateringTimes: 1,
                                        wateringInterval: 1,
                                        alertTimes:[],
                                        isCreate:true
                                    })
                "/>
                <div class="mt-16"></div>
                <h1 class="relative py-1">
                    <span
                        class="absolute font-bold font-fontawesome content-'\\f00c Check' bg-green-500 text-white left-0 bottom-full rounded-t-md px-4 py-2 mt-4 text-sm leading-tight tracking-widest"> 肥料</span>
                    <span
                        class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-green-600 to-transparent"></span>
                </h1>
                <div class="flex flex-wrap m-4">
                    <div v-for="(fertilizerSetting,index) in fertilizerSettings" class="w-full sm:w-1/2 lg:w-1/3 p-4">
                        <div class="p-4 h-104 w-auto">
                            <div class="border border-gray-200 p-6 rounded-lg text-center bg-white">
                                <div
                                    class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                    </svg>
                                </div>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">肥料設定{{
                                        index + 1
                                    }}</h2>
                                <div class="mx-8">
                                    <ul class="text-left">
                                        <li>
                                            肥料名:{{ fertilizerSetting.fertilizerName }}
                                        </li>
                                        <li>
                                            設定月:{{ fertilizerSetting.months }}
                                        </li>
                                        <li>
                                            肥料量:{{ fertilizerSetting.fertilizerAmount }}g
                                        </li>
                                        <li>
                                            備考:{{ fertilizerSetting.note }}
                                        </li>
                                    </ul>
                                </div>
                                <button @click="openFertilizerModal(); getIndex(index)"
                                        class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8"
                                >
                                    設定する
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
                <button @click="openFertilizerModal(),getIndex(null)"
                        class="flex mx-auto btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8"
                >
                    作成する
                </button>
                <FertilizerSettingModal :open-modal="isFertilizerModalOpen" @closeModal="closeFertilizerModal"
                                        v-if="arrayIndex !== null"
                                        :fertilizerSetting="fertilizerSettings[arrayIndex]"/>
                <FertilizerSettingModal :open-modal="isFertilizerModalOpen" @closeModal="closeFertilizerModal"
                                        @add-fertilizer-setting="addFertilizerSetting"
                                        v-else
                                        :fertilizerSetting="reactive({
                                        checkSeatId:checkSeatId,
                                        fertilizerSettingId: '',
                                        months: [],
                                        note: '',
                                        fertilizerAmount: 1,
                                        fertilizerName: '',
                                        isCreate:true
                                         })
                "/>
            </div>
            <NaviFooter/>
        </section>
    </div>
</template>
<script>


import LoadWait from "@/Components/LoadWait.vue";
import NaviFooter from "@/Components/NaviFooter.vue";

export default {
    components: {
        WaterSettingModal,
        LoadWait,
        FertilizerSettingModal,
        NaviFooter,

    },
    name: "CheckSeat.vue",
    props: ['checkSeatId'],
    data() {
        return {
            isWaterModalOpen: false,
            isFertilizerModalOpen: false,
            waterSettings: [],
            fertilizerSettings: [],
            arrayIndex: null,
            successMessage: null,
            errorMessage: null,
            isLoading: false,
        }
    },
    created() {
        this.isLoading = true;
        axios.all([
            axios.get(`/api/checkSeat/${this.checkSeatId}/waterSetting?checkSeatId=${this.checkSeatId}`),
            axios.get(`/api/checkSeat/${this.checkSeatId}/fertilizerSetting?checkSeatId=${this.checkSeatId}`)
        ])
            .then(axios.spread((res1, res2) => {
                const waterSettingData = res1.data.waterSettings.map(waterSetting => ({
                    waterSettingId: waterSetting.waterSettingId,
                    checkSeatId: this.checkSeatId,
                    months: waterSetting.months,
                    note: waterSetting.note,
                    waterAmount: waterSetting.waterAmount,
                    wateringTimes: waterSetting.wateringTimes,
                    wateringInterval: waterSetting.wateringInterval,
                    alertTimes: waterSetting.alertTimes,
                }));
                this.waterSettings = waterSettingData

                const fertilizerSettingData = res2.data.fertilizerSettings.map(fertilizerSetting => ({
                    fertilizerSettingId: fertilizerSetting.fertilizerSettingId,
                    checkSeatId: this.checkSeatId,
                    months: fertilizerSetting.months,
                    note: fertilizerSetting.note,
                    fertilizerAmount: fertilizerSetting.fertilizerAmount,
                    fertilizerName: fertilizerSetting.fertilizerName,
                }));
                this.fertilizerSettings = fertilizerSettingData
            }))
            .catch((error) => {
                this.isLoading = false;
                console.log(error);
            })
            .finally(() => {
                this.isLoading = false;
            });

    },
    mounted() {
        this.successMessage = "{{ session('success') }}";
    },
    methods: {
        addWaterSetting(setting) {
            const {
                alertTimes,
                checkSeatId,
                months,
                note,
                waterAmount,
                waterSettingId,
                wateringInterval,
                wateringTimes
            } = setting;
            this.waterSettings.push({
                alertTimes, // alertTimesが存在しない場合は空の配列を使用
                checkSeatId,
                months,
                note,
                waterAmount,
                waterSettingId,
                wateringInterval,
                wateringTimes,
                isCreate: false,
            });
        },
        addFertilizerSetting(setting) {
            const {checkSeatId,
                    months,
                    note,
                    fertilizerAmount,
                    fertilizerSettingId,
                    fertilizerName} = setting;
            this.fertilizerSettings.push({
                checkSeatId,
                months,
                note,
                fertilizerAmount,
                fertilizerSettingId,
                fertilizerName,
                isCreate: false,
            });
        },
        getIndex(index) {
            this.arrayIndex = index
        },
        openWaterModal() {
            setTimeout(() => {
                this.isWaterModalOpen = true;
            }, 100);
        },
        closeWaterModal() {
            this.isWaterModalOpen = false;
        },
        openFertilizerModal() {
            setTimeout(() => {
                this.isFertilizerModalOpen = true;
            }, 100);
        },
        closeFertilizerModal() {
            this.isFertilizerModalOpen = false;
        },
    }
}


</script>

<style scoped>

</style>
