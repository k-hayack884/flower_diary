<template>
    <div class="bg-green-100 pb-16">
        <LoadWait :show="isLoading"
                  class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50"></LoadWait>

        <div id="tab" class="w-full max-w-500 mx-auto">
            <ul class="flex tabMenu mt-10">
                <li class="w-auto px-4 py-2 text-white border-r border-white bg-green-700 cursor-pointer"
                    @click="isSelect('1')">日記
                </li>
                <li class="w-auto px-4 py-2 text-white border-r border-white bg-green-700 cursor-pointer"
                    @click="isSelect('2')">お世話
                </li>
                <li class="w-auto px-4 py-2 text-white bg-green-700 cursor-pointer"
                    @click="isSelect('3')">
                    情報
                </li>
            </ul>
            <div class="w-full p-4 border border-green-700 tabContents w-full lg:w-3/4">
                <div v-if="isActive === '1'">
                    <button
                        class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mb-8"
                        @click="openDiaryModal(); getIndex(null)">日記を投稿する
                    </button>
                    <div v-if="diaries.length===0" class="py-16 text-center">日記はありません</div>
                    <div v-for="(diary, index) in diaries" class="mb-4">
                        <div class="card card-side bg-base-100 shadow-lg rounded-lg overflow-hidden flex flex-col">
                            <div class="flex items-center h-200">
                                <div class="w-1/6">
                                    <div v-if="diary.diaryImage" class="w-1/8">
                                        <img :src="'data:image/png;base64,'+diary.diaryImage"
                                             class="lg:w-full lg:h-full object-cover"/>
                                    </div>
                                    <div v-else>
                                        <img src="../../icon/noImag.png" class="lg:w-full lg:h-full object-cover">
                                    </div>
                                </div>
                                <div class="w-5/6">
                                    <div class="card-body px-8 pb-0 flex-1">
                                        <p>{{ diary.diaryContent }}</p>
                                        <div class="flex mb-4 h-12 items-end">
                                            <div class="flex-1 inline-block">日記更新日: {{ diary.createDate }}</div>
                                            <button
                                                class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width"

                                                @click="openDiaryModal(); getIndex(index)">日記を編集する
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                        <div class="border border-dashed border-gray-400"></div>-->
                            <!--                        <div class="px-8 py-4 flex-1">-->
                            <!--                            <div v-if="diary.comments && diary.comments.length > 0">-->
                            <!--                                <button class="flex-1" @click="commentToggle(diary.diaryId,index)">コメント-->
                            <!--                                    {{ diary.comments.length }}-->
                            <!--                                </button>-->
                            <!--                                <div :class="{'hidden': !diary.showComment}">-->
                            <!--                                    <div v-for="comment in diary.comments" class="">-->
                            <!--                                        <div class="chat chat-start">-->
                            <!--                                            <div class="chat-image avatar">-->
                            <!--                                                <div class="w-10 rounded-full">-->
                            <!--                                                    <img :src="'data:image/png;base64,'+comment.userImage"/>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="chat-header">-->
                            <!--                                                {{ comment.userName }}-->
                            <!--                                                <time class="text-xs opacity-50"> {{ comment.createDate }}</time>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="chat-bubble">{{ comment.content }}</div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <div v-else>コメント 0</div>-->
                            <!--                        </div>-->
                        </div>
                    </div>
                </div>
                <div v-else-if="isActive === '2'">
                    <h2 class="mb-4 text-2xl font-bold">今月のお世話設定</h2>
                    <div v-if="waterSettings.length===0 && fertilizerSettings.length===0" class="py-16 text-center">
                        お世話設定がありません
                    </div>
                    <div v-else class="flex flex-col">
                        <div class="card w-full bg-base-100 shadow-xl text-black my-4">
                            <div class="card-body">
                                <h2 class="card-title">水やり設定</h2>
                                <p>水やり回数:{{ waterSettings[0].wateringInterval }}日に{{
                                        waterSettings[0].wateringTimes
                                    }}回</p>
                                <div v-if="waterSettings[0].waterAmount === 'a_lot'">
                                    <p>水やり量:たっぷり</p>
                                </div>
                                <div v-else-if="waterSettings[0].waterAmount === 'moderate_amount'">
                                    <p>水やり量:適量</p>
                                </div>
                                <div v-else-if="waterSettings[0].waterAmount === 'sparingly'">
                                    <p>水やり量:ひかえめ</p>
                                </div>
                                <p>備考:{{ waterSettings[0].note }}</p>
                            </div>
                        </div>
                        <div v-if="successMessage" id="successMessage"
                             class="fixed bottom-16 left-1/2 transform -translate-x-1/2 z-9999">
                            <div class="bg-white">
                                <div class="w-96 rounded-lg overflow-hidden shadow-md py-5 flex">
                                    <div class="flex-grow-1 my-auto">
                                        <p class="text-center ml-12">{{ successMessage }}</p>
                                    </div>
                                    <div class="flex items-center ml-auto">
                                        <div class="flex flex-col justify-between p-4">
                                            <span class="flower-loader h-150"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card w-full bg-base-100 shadow-xl text-black my-4">
                            <div class="card-body">
                                <h2 class="card-title">肥料設定</h2>
                                <ul v-for="fertilizerSetting in fertilizerSettings" class="">
                                    <li>
                                        <div class="border border-dashed"></div>
                                        <p>肥料名:{{ fertilizerSetting.fertilizerName }}</p>
                                        <p>肥料量:{{ fertilizerSetting.fertilizerAmount }}g</p>
                                        <p>備考:{{ fertilizerSetting.note }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a :href="route('checkSeat', { checkSeatId: checkSeatId })"
                       class="block">
                        <button
                            class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mb-8">
                            お世話設定
                        </button>
                    </a>
                </div>
                <div v-else-if="isActive === '3'">

                    <div v-if="Object.keys(plantData).length !== 0" class="flex flex-col items-center">
                        <div class="card w-full lg:w-2/3 bg-base-100 shadow-xl my-4">
                            <div class="card-body">
                                <h2 class="card-title">
                                    {{ plantData.plantName }}
                                </h2>
                                <p>学名:{{ plantData.scientific }}</p>
                                <div class="card-actions justify-end">
                                </div>
                            </div>
                        </div>
                        <div class="card w-full lg:w-2/3 bg-base-100 shadow-xl my-4">
                            <div class="card-body">
                                <h2 class="card-title">
                                    説明
                                </h2>
                                <p>{{ plantData.information }}</p>
                                <div class="card-actions justify-end">
                                </div>
                            </div>
                        </div>
                        <div class="card w-full lg:w-2/3 bg-base-100 shadow-xl my-4">
                            <div class="card-body">
                                <h2 class="card-title">
                                    おすすめのお世話設定
                                </h2>
                                <p>春:</p>
                                <p>夏:</p>
                                <p>秋:</p>
                                <p>冬:</p>
                                <div class="card-actions justify-end">
                                </div>
                            </div>
                        </div>
                        <div class="card w-full lg:w-2/3 bg-base-100 shadow-xl my-4">
                            <div class="card-body">
                                <h2 class="card-title">
                                    {{ plantData.plantName }}の画像
                                </h2>
                                <div class="flex mx-auto carousel rounded-box" style="width: 300px; height: 300px ;">
                                    <div class="carousel-item">
                                        <div v-for="image in plantData.plantImages">
                                            <img :src="'data:image/png;base64,'+image"
                                                 class="lg:w-full lg:h-full object-cover"
                                                 style="width: 300px; height: 300px ;"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-actions justify-end">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else>植物のデータを取得中です</div>
                </div>
            </div>
        </div>
    </div>
    <NaviFooter/>
    <DiaryModal :open-modal="isDiaryModalOpen" @closeModal="closeDiaryModal"
                v-if="arrayIndex !== null"
                :diary="diaries[arrayIndex]"
                :plant-unit-id="plantUnitId"/>

    <DiaryModal :open-modal="isDiaryModalOpen" @closeModal="closeDiaryModal"
                v-else
                :diary="reactive({
                plantUnitId:plantUnitId,
                diaryId: '',
                diaryContent: '',
                image: '',
                createDate: '',
                isCreate:true    })"
                :plant-unit-id="plantUnitId"/>
</template>

<script>
import DiaryModal from "@/Components/DiaryModal.vue";
import {reactive} from "vue";
import NaviFooter from "@/Components/NaviFooter.vue";
import LoadWait from "@/Components/LoadWait.vue";

export default {
    name: "PlantUnitDetail",
    components: {
        DiaryModal,
        LoadWait,
        NaviFooter,
    },
    props: ['plantUnitId'],
    data() {
        return {
            userId: '',
            plantId: '',
            checkSeatId: '',
            plantName: null,
            createDate: '',
            updateDate: '',
            diaries: [],
            plantData: {},
            waterSettings: [],
            fertilizerSettings: [],
            currentMonth: '',
            isActive: '1',
            showComment: false,
            isDiaryModalOpen: false,
            arrayIndex: null,
            isLoading: false,
        }
    },
    async created() {
        await this.fetchPlantUnitData();
        this.showCheckSeat();
        this.getPlantData();

        const date = new Date();
        const month = date.getMonth() + 1;
        this.currentMonth = month;
    },
    methods: {
        reactive,

        isSelect: function (num) {
            this.isActive = num;
        },
        getIndex(index) {
            this.arrayIndex = index
        },
        fetchPlantUnitData() {
            return new Promise((resolve, reject) => {
                this.isLoading = true;
                axios.get(`/api/plantUnit/${this.plantUnitId}`)
                    .then(res => {
                        this.userId = res.data.plantUnit.userId;
                        this.plantId = res.data.plantUnit.plantId;
                        this.checkSeatId = res.data.plantUnit.checkSeatId;
                        this.plantName = res.data.plantUnit.plantName;
                        // this.diaries = res.data.plantUnit.diaries;
                        this.plantImage = res.data.plantUnit.plantImage;
                        this.createDate = res.data.plantUnit.createDate;
                        this.updateDate = res.data.plantUnit.updateDate;
                        this.diariesData = [];
                        this.fetchDiaryData();
                        resolve(); // Promise の解決
                    })
                    .catch((error) => {
                        console.log(error);
                        reject(error); // Promise の拒否
                    });
            });
        },
        async fetchDiaryData() {
            this.isLoading = true
            const res = await axios.get(`/api/plantUnit/${this.plantUnitId}/diary?plantUnitId=${this.plantUnitId}`, {})
            const diaryData = res.data.diaries.map(diary => ({
                diaryId: diary.diaryId,
                diaryContent: diary.content,
                diaryImage: diary.diaryImage,
                createDate: diary.createDate,
                comments: diary.comments,
            }));
            console.log(diaryData);
            Vue.set(this.diariesData, diaryData);
            this.diaries = diaryData;
            this.isLoading = false
        },
        commentToggle(diaryId, index) {
            this.diaries[index].showComment = !this.diaries[index].showComment;
            axios.get(`/api/diary/${diaryId}/comment?diaryId=${diaryId}`, {})
                .then((res) => {
                    const commentData = res.data.comments.map(comment => ({
                        commentId: comment.commentId,
                        userId: comment.userId,
                        userName: comment.userName,
                        userImage: comment.userImage,
                        content: comment.content,
                        createDate: comment.createDate,
                    }));
                    this.diaries[index].comments = commentData;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        showCheckSeat() {
            this.isLoading = true;

            axios.all([
                axios.get(`/api/checkSeat/${this.checkSeatId}/waterSetting?checkSeatId=${this.checkSeatId}`),
                axios.get(`/api/checkSeat/${this.checkSeatId}/fertilizerSetting?checkSeatId=${this.checkSeatId}`)
            ])
                .then(axios.spread((res1, res2) => {
                    const waterSettingData = res1.data.waterSettings.map(waterSetting => ({
                        waterSettingId: waterSetting.waterSettingId,
                        months: waterSetting.months,
                        note: waterSetting.note,
                        waterAmount: waterSetting.waterAmount,
                        wateringTimes: waterSetting.wateringTimes,
                        wateringInterval: waterSetting.wateringInterval,
                        alertTimes: waterSetting.wateringInterval,
                    }));
                    const currentWaterSettings = waterSettingData.filter(setting => setting.months.includes(this.currentMonth));
                    this.waterSettings = currentWaterSettings;

                    const fertilizerSettingData = res2.data.fertilizerSettings.map(fertilizerSetting => ({
                        fertilizerSettingId: fertilizerSetting.fertilizerSettingId,
                        months: fertilizerSetting.months,
                        note: fertilizerSetting.note,
                        fertilizerAmount: fertilizerSetting.fertilizerAmount,
                        fertilizerName: fertilizerSetting.fertilizerName,
                    }));
                    this.fertilizerSettings = fertilizerSettingData;
                    const currentFertilizerSettings = fertilizerSettingData.filter(setting => setting.months.includes(this.currentMonth));
                    this.fertilizerSettings = currentFertilizerSettings;
                }))
                .catch((error) => {
                    console.log(error);
                })
                .finally(() => {
                    this.isLoading = false;
                });
        },
        getPlantData() {
            axios.get(`/api/plant/${this.plantId}`, {})
                .then(res => {
                    console.log(res.data.plant.scientific)
                    Vue.set(this, 'plantData', {
                        plantName: res.data.plant.name,
                        scientific: res.data.plant.scientific,
                        information: res.data.plant.information,
                        plantImages: res.data.plant.plantImages,
                    })
                })
        },
        openDiaryModal() {
            setTimeout(() => {
                this.isDiaryModalOpen = true;
            }, 100);
        },
        closeDiaryModal() {
            this.isDiaryModalOpen = false;
        },
    }
}
</script>

<style scoped>

.hidden {
    display: none;
}

.slide-down-enter-active,
.slide-down-leave-active {
    transition: all .5s;
}

.slide-down-enter,
.slide-down-leave-to {
    transform: translateY(-100%);
    opacity: 0;
}
</style>
