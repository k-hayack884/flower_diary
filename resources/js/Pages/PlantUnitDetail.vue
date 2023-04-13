<template>
    <h1>ああああああああ</h1>
    <p>plantUnitId: {{ plantUnitId }}</p>

    <div id="tab" class="w-full max-w-500 mx-auto">
        <ul class="flex tabMenu">
            <li class="w-auto px-4 py-2 text-white border-r border-white bg-blue-700 cursor-pointer" @click="isSelect('1')">日記</li>
            <li class="w-auto px-4 py-2 text-white border-r border-white bg-blue-700 cursor-pointer" @click="isSelect('2')">お世話</li>
            <li class="w-auto px-4 py-2 text-white bg-blue-700 cursor-pointer" @click="isSelect('3')">情報</li>
        </ul>
        <div class="w-full p-4 border border-blue-700 tabContents w-3/4">
            <div v-if="isActive === '1'">
                <div v-for="diary in diariesData" class="">
                    <div
                        class="card card-side bg-base-100 shadow-lg rounded-lg overflow-hidden m4transform hover:scale-105 transition duration-300 my-4">
                        <figure><img :src="diary.diaryImage"/></figure>
                        <div class="card-body">
                            <h2 clasoss="card-title">{{ diary.diaryContent }}</h2><a href="">編集</a>
                            <p>日記更新日: {{ diary.createDate }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else-if="isActive === '2'">
                <h2 class="mb-4 text-2xl font-bold">Tab News</h2>
            </div>
            <div v-else-if="isActive === '3'">
                <h2 class="mb-4 text-2xl font-bold">Tab Event</h2>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PlantUnitDetail",
    props: ['plantUnitId'],
    data() {
        return {
            UserId: '',
            plantId: '',
            checkSeatId: '',
            plantName: null,
            plantImage: '',
            createDate: '',
            updateDate: '',
            plantData: {
                plantName: '',
                scientific: '',
                information: '',
            },
            diaries: [],
            diariesData: [{
                diaryId: '',
                diaryContent: '',
                diaryImage: '',
                createDate: '',
                comments: {
                    commentId: '',
                    userId: '',
                    commentContent: '',
                    createDate: '',
                }
            }],
            waterSettingIds:[],
            fertilizerSettingIds:[],
            isActive: '1'
        }
    },
    created() {
        this.fetchPlantUnitData();
    },
    methods: {
        isSelect: function (num) {
            this.isActive = num;
        },
        fetchPlantUnitData() {
            console.log('fetchPlantUnitData called'); // 追加

            console.log(this.plantUnitId);

            axios.get(`/api/plantUnit/${this.plantUnitId}`)
                .then(res => {
                    this.UserId = res.data.plantUnit.UserId;
                    this.plantId = res.data.plantUnit.plantId;
                    this.checkSeatId = res.data.plantUnit.checkSeatId;
                    this.plantName = res.data.plantUnit.name;
                    this.diaries = res.data.plantUnit.diaries;
                    this.plantImage = res.data.plantUnit.plantImage;
                    this.createDate = res.data.plantUnit.createDate;
                    this.updateDate = res.data.plantUnit.updateDate;
                    this.plantData = {
                        plantName: '',
                        scientific: '',
                        information: '',
                    };
                    this.diariesData = [];
                    return axios.get(`/api/plant/${this.plantId}`, {});

                })
                .then(res => {
                    console.log(res.data.plant.scientific)
                    Vue.set(this, 'plantData', {
                        plantName: res.data.plant.plantName,
                        scientific: res.data.plant.scientific,
                        information: res.data.plant.information,
                    })
                    this.fetchDiaryData();
                    this.fetchCheckSeatData();

                })

        },
        fetchDiaryData() {
            console.log(this.diaries);
            this.diaries.forEach((diary, index) => {
                axios.get(`/api/diary/${diary}`, {})
                    .then((res) => {
                        const diaryData = {
                            diaryId: res.data.diary.diaryId,
                            diaryContent: res.data.diary.content,
                            diaryImage: res.data.diary.diaryImage,
                            createDate: res.data.diary.createDate,
                            comments:res.data.diary.comments,
                        };
                        Vue.set(this.diariesData, index, diaryData);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            });
        },
        fetchCheckSeatData(){
            axios.get(`/api/checkSeat/${this.checkSeatId}`, {})
                .then(res => {
                    this.waterSettingIds = res.data.waterSettingIds;
                    this.fertilizerSettingIds = res.data.fertilizerSettingIds;
                    console.log(this.waterSettingIds, this.fertilizerSettingIds);

                    console.log(`/api/waterSettingId/${this.waterSettingIds[0]}`);
                    return Promise.all([
                        ...this.waterSettingIds.map(waterSettingId => axios.get(`/api/waterSettingId/${waterSettingId}`, {})),
                        ...this.fertilizerSettingIds.map(fertilizerSettingId => axios.get(`/api/fertilizerSettingId/${fertilizerSettingId}`, {}))
                    ]);
                })
               .then(res => {
                   console.log(`/api/waterSettingId/${this.waterSettingIds[0]}`);
                   console.log(res);
                   const waterSettingResponses = res.slice(0, this.waterSettingIds.length);
                   const fertilizerSettingResponses = res.slice(this.waterSettingIds.length);

                   // 各レスポンスから必要な情報を取り出す
                   const waterSettings = waterSettingResponses.map(res => res.data);
                   const fertilizerSettings = fertilizerSettingResponses.map(res => res.data);

                   console.log(waterSettings);
                   console.log(fertilizerSettings);

                   // データの加工やその他の処理を行う
                   // ...
               })
        }

    }
}
</script>

<style scoped>

</style>
