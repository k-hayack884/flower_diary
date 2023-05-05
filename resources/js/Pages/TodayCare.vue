<template>

    <LoadWait :show="isLoading" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50"></LoadWait>

    <div class="container px-5 py-6 mx-auto">
        <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">今日のお世話</h1>
            <p class="text-center ml-12">{{ successMessage }}</p>

        </div>
        <h1 class="relative py-1">
                <span
                    class="absolute font-bold font-fontawesome content-'\\f00c Check' bg-green-500 text-white left-0 bottom-full rounded-t-md px-4 py-2 text-sm leading-tight tracking-widest"> 水やり</span>
            <span class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-green-600 to-transparent"></span>
        </h1>
        <div v-if="waterCareDatas.length===0" class="py-16 text-center">本日の水やり設定はありません</div>
        <div v-for="(waterCareData,index) in waterCareDatas">

            <div class=" text-center flex justify-center items-center mt-4 hidden lg:block">
                <div v-show="waterCareData.isShow"
                     class="inline-block rounded-lg overflow-hidden shadow-lg lg:w-3/4 text-center">
                    <div class="grid grid-cols-5 gap-4 px-6 my-4">
                        <div class="h-16">
                            <p class="text-sm">植物名</p>
                            <p class="text-lg　font-bold">{{ waterCareData.plantName }}</p>
                        </div>
                        <div class="h-16">
                            <p class="text-sm">通知時間</p>
                            <p class="text-xl　font-bold">{{ waterCareData.alertTime }}</p></div>
                        <div class="h-16">
                            <div v-if="waterCareData.waterAmount === 'a_lot'">
                                <p class="text-sm">水やり量</p>
                                <p class="text-xl　font-bold">たっぷり</p>
                            </div>
                            <div v-else-if="waterCareData.waterAmount === 'moderate_amount'">
                                <p class="text-sm">水やり量</p>
                                <p class="text-xl　font-bold">適量</p>
                            </div>
                            <div v-else-if="waterCareData.waterAmount === 'sparingly'">
                                <p class="text-sm">水やり量</p>
                                <p class="text-xl　font-bold">ひかえめ</p>
                            </div>
                        </div>
                        <div class="h-16">
                            <p class="text-sm">備考</p>
                            <p class="text-sm　font-bold">{{ waterCareData.waterNote }}</p>
                        </div>
                        <div class=" h-16">
                            <button
                                class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-12 my-4"
                                @click="doneWaterCared(waterCareData);switchWater(index)">世話を完了する！
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap m-4">
                <div class="p-4 h-104 w-full lg:hidden">
                    <div class="border border-gray-200 rounded-lg text-center p-6">
                        <div
                            class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 ">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </div>
                        <ul>
                            <li>
                                植物名:{{ waterCareData.plantName }}
                            </li>
                            <li>
                                通知時間:{{ waterCareData.alertTime }}
                            </li>
                            <li v-if="waterCareData.waterAmount === 'a_lot'">
                                <p>水やり量:たっぷり</p>
                            </li>
                            <li v-else-if="waterCareData.waterAmount === 'moderate_amount'">
                                <p>水やり量:適量</p>
                            </li>
                            <li v-else-if="waterCareData.waterAmount === 'sparingly'">
                                <p>水やり量:ひかえめ</p>
                            </li>

                            <li>
                                備考:{{ waterCareData.waterNote }}
                            </li>
                            <li>
                                通知時間:{{ waterCareData.alertTime }}
                            </li>

                        </ul>
                        <button
                            class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-12 my-4"
                            @click="doneWaterCared(waterCareData);switchWater(index)">世話を完了する！
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="relative py-1">
                <span
                    class="absolute font-bold font-fontawesome content-'\\f00c Check' bg-green-500 text-white left-0 bottom-full rounded-t-md px-4 py-2 mt-2 text-sm leading-tight tracking-widest"> 肥料</span>
            <span class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-green-600 to-transparent"></span>
        </h1>

        <div v-if="fertilizerCareDatas.length===0" class="py-16 text-center">本日の肥料設定はありません</div>

        <div v-for="fertilizerCareData in fertilizerCareDatas">

            <div class=" text-center flex justify-center items-center mt-4 hidden lg:block">
                <div v-show="fertilizerCareData.isShow"
                     class="inline-block rounded-lg overflow-hidden shadow-lg lg:w-3/4 text-center">
                    <div class="grid grid-cols-5 gap-4 px-6 my-4">
                        <div class="h-16">
                            <p class="text-sm">植物名</p>
                            <p class="text-lg　font-bold">{{ fertilizerCareData.plantName }}</p>
                        </div>
                        <div class="h-16">
                            <p class="text-sm">肥料名</p>
                            <p class="text-xl　font-bold">{{ fertilizerCareData.fertilizerName }}</p>
                        </div>
                        <div class="h-16">
                            <p class="text-sm">施肥量</p>
                            <p class="text-xl　font-bold">{{ fertilizerCareData.fertilizerAmount }}</p>
                        </div>
                        <div class="h-16">
                            <p class="text-sm">備考</p>
                            <p class="text-sm　font-bold">{{ fertilizerCareData.fertilizerNote }}</p>
                        </div>
                        <div class=" h-16">
                            <button
                                class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-12 my-4"
                                @click="doneFertilizerCared(fertilizerCareData);switchFertilizer(index)">
                                世話を完了する！
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap m-4">
                <div class="p-4 h-104 w-full lg:hidden">
                    <div class="border border-gray-200 rounded-lg text-center p-6">
                        <div
                            class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 ">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </div>
                        <ul>
                            <li>
                                植物名:{{ fertilizerCareData.plantName }}
                            </li>
                            <li>
                                肥料名:{{fertilizerCareData.fertilizerName}}
                            </li>
                            <li>
                                施肥量:{{fertilizerCareData.fertilizerAmount}}
                            </li>
                            <li>
                                備考:{{ fertilizerCareData.fertilizerAmount }}
                            </li>
                        </ul>
                        <button
                            class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-12 my-4"
                            @click="doneFertilizerCared(fertilizerCareData);switchFertilizer(index)">
                            世話を完了する！
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div v-if="successMessage" id="successMessage" class="fixed bottom-0 left-1/2 transform -translate-x-1/2 z-9999">
        <div class="bg-white">
            <div class="w-96 rounded-lg overflow-hidden shadow-md py-5 flex">
                <div class="flex-grow-1 my-auto">
                    <p class="text-center ml-12">{{ successMessage}}</p>
                </div>
                <div class="flex items-center ml-auto">
                    <div class="flex flex-col justify-between p-4">
                        <span class="flower-loader h-150"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <NaviFooter/>

</template>

<script>
import LoadWait from "@/Components/LoadWait.vue";
import NaviFooter from "@/Components/NaviFooter.vue";

export default {
    name: "TodayCare",
    components: {
        LoadWait,
        NaviFooter,
    },
    props: ['user'],
    data() {
        return {
            successMessage: null,
            errorMessage: null,
            waterCareDatas: [],
            fertilizerCareDatas: [],
            nowDate: new Date(),
            isLoading:false,
        }
    },created() {
        this.isLoading = true
        this.successMessage = null;

        // axiosの処理が完了するまで待つ
        axios.all([
            axios.get(`/api/user/${this.user.user_id}/care/water?userId=${this.user.user_id}`),
            axios.get(`/api/user/${this.user.user_id}/care/fertilizer?userId=${this.user.user_id}`)
        ])
            .then(axios.spread((res1, res2) => {
                const waterCareDatas = res1.data.waterCares.map(waterSetting => ({
                    alertTimeId: waterSetting.alertTimeId,
                    plantName: waterSetting.plantName,
                    waterAmount: waterSetting.waterAmount,
                    waterNote: waterSetting.waternote,
                    alertTime: waterSetting.alertTime,
                    isShow: true,
                }));
                this.waterCareDatas = waterCareDatas;

                const fertilizerSettingData = res2.data.fertilizerCares.map(fertilizerSetting => ({
                    alertTimeId: fertilizerSetting.alertTimeId,
                    plantName: fertilizerSetting.plantName,
                    fertilizerNote: fertilizerSetting.fertilizerNote,
                    fertilizerAmount: fertilizerSetting.fertilizerAmount,
                    fertilizerName: fertilizerSetting.fertilizerName,
                    alertMonth: fertilizerSetting.alertMonth,
                    isShow: true,
                }));
                this.fertilizerCareDatas = fertilizerSettingData;
            }))
            .catch((error) => {
                console.log(error);
            })
            .finally(() => {
                this.isLoading = false;
            });
    },
    methods: {
        doneWaterCared(waterSetting) {
            this.isLoading = true

            axios.post(`/api/care/${waterSetting.alertTimeId}/water?alertTimeId=${waterSetting.alertTimeId}`
            ).then(res => {
                console.log(res.data);
                console.log(res.data.original.successMessage);

                this.successMessage = res.data.original.successMessage;
                this.isLoading = false
            }).catch(error => {
                if (error.response.status === 422) {
                    console.log(error.response.data.errors);
                    this.errors = error.response.data.errors;
                    this.isLoading = false
                    waterSetting.isshow = true;
                } else {
                    console.log(error);
                    this.isLoading = false
                    waterSetting.isshow = true;

                }
            });
        },
        doneFertilizerCared(fertilizerSetting) {
            this.isLoading = true
            axios.post(`/api/care/${fertilizerSetting.alertTimeId}/fertilizer?alertTimeId=${fertilizerSetting.alertTimeId}`
            ).then(res => {

            }).catch(error => {
                if (error.response.status === 422) {
                    console.log(error.response.data.errors);
                    this.errors = error.response.data.errors;
                    this.isLoading = false
                    fertilizerSetting.isshow = true;

                } else {
                    console.log(error);
                    this.isLoading = false
                    fertilizerSetting.isshow = true;
                }
            });
        },
        switchWater(index) {
            this.waterCareDatas[index].isShow = false;
        },
        switchFertilizer(index) {
            this.fertilizerCareDatas[index].isShow = false;
        },


    },
    watch:{
        successMessage(value) {
            if (value) {
                setTimeout(() => {
                    this.successMessage = null;
                }, 3000);
            }
        }
    },
}
</script>

<style scoped>
.stats {
    display: flex;
    justify-content: space-between;
}
</style>
