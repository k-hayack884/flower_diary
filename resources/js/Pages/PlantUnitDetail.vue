<template>
    <h1>ああああああああ</h1>
    <p>plantUnitId: {{ plantUnitId }}</p>
    <figure><img :src="'data:image/png;base64,'+plantImage" /> </figure>
    <div id="tab" class="w-full max-w-500 mx-auto">
        <ul class="flex tabMenu">
            <li class="w-auto px-4 py-2 text-white border-r border-white bg-blue-700 cursor-pointer"
                @click="isSelect('1')">日記
            </li>
            <li class="w-auto px-4 py-2 text-white border-r border-white bg-blue-700 cursor-pointer"
                @click="isSelect('2')">お世話
            </li>
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
                            <div v-if="diary.comments && diary.comments.length > 0">
                            <button @click="commentToggle(diary)">コメント {{ diary.comments.length }}</button>
                                <div :class="{'hidden': !showComment}">
ほげ
                                </div>
                            </div>
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
            userId: '',
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
            diariesData: [
                {
                    diaryId: '',
                    diaryContent: '',
                    diaryImage: '',
                    createDate: '',
                    comments: []
                }
            ],
            waterSettingIds: [],
            fertilizerSettingIds: [],
            currentMonth: 5,
            isActive: '1',
            showComment: false
        }
    },
    created() {
        this.fetchPlantUnitData();
        const date = new Date();
        const month = date.getMonth() + 1; // 0-11の月の値を1-12に変換するために+1する
        this.currentMonth = 5;
    },
    methods: {
        isSelect: function (num) {
            this.isActive = num;
        },
        fetchPlantUnitData() {
            axios.get(`/api/plantUnit/${this.plantUnitId}`)
                .then(res => {
                    this.userId = res.data.plantUnit.userId;
                    this.plantId = res.data.plantUnit.plantId;
                    this.checkSeatId = res.data.plantUnit.checkSeatId;
                    this.plantName = res.data.plantUnit.plantName;
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
                    // this.fetchCheckSeatData();

                })

        },
        // api/plantunit/{plantunitId}/image
        async fetchDiaryData() {
            console.log(this.diaries);
            // for (const diary of this.diaries) {
            //     const index = this.diaries.indexOf(diary);
                const res=await axios.get(`/api/plantUnit/${this.plantUnitId}/diary?plantUnitId=${this.plantUnitId}`, {})
                    // .then((res) => {
                        const diaryData = {
                            diaryId: res.data.diary.diaryId,
                            diaryContent: res.data.diary.content,
                            diaryImage: res.data.diary.diaryImage,
                            createDate: res.data.diary.createDate,
                            comments: res.data.diary.comments,
                        };
                        Vue.set(this.diariesData, index, diaryData);
                        if (index === this.diaries.length - 1) {
                            this.showCommentsLength();
                        }
                    // })
                    // .catch((error) => {
                    //     console.log(error);
                    // });
            // }
        },
        // fetchCheckSeatData() {
        //     axios.get(`/api/checkSeat/${this.checkSeatId}`, {})
        //         .then(res => {
        //             this.waterSettingIds = res.data.waterSettingIds;
        //             this.fertilizerSettingIds = res.data.fertilizerSettingIds;
        //             return Promise.all([
        //                 ...this.waterSettingIds.map(waterSettingId => axios.get(`/api/waterSetting/${waterSettingId}`, {})),
        //                 ...this.fertilizerSettingIds.map(fertilizerSettingId => axios.get(`/api/fertilizerSetting/${fertilizerSettingId}`, {}))
        //             ]);
        //         })
        //
        //         .then(res => {
        //             const waterSettingResponses = res.slice(0, this.waterSettingIds.length);
        //             const fertilizerSettingResponses = res.slice(this.waterSettingIds.length);
        //             // 各レスポンスから必要な情報を取り出す
        //             const waterSettings = waterSettingResponses.map(res => res.data);
        //             const fertilizerSettings = fertilizerSettingResponses.map(res => res.data);
        //
        //             // let currentMonthSetting;
        //             // for (const setting of waterSettings) {
        //             //     if (setting.months.includes(this.currentMonth)) {
        //             //         currentMonthSetting = setting;
        //             //         break;
        //             //     }
        //             // }
        //             // console.log(currentMonthSetting)
        //
        //             // データの加工やその他の処理を行う
        //             // ...
        //         })
        //         .catch(error => {
        //             console.log(error);
        //         });
        // },
        commentToggle(diary) {
            this.showComment = !this.showComment;
            console.log(diary.comments)
            diary.comments.forEach((comment, index) => {
                axios.get(`/api/comment/${comment}`, {})
                    .then((res) => {
                        const commentData = {
                            commentId: res.data.comment.commentId,
                            userId: res.data.comment.userId,
                            userImage: res.data.comment.userImage,
                            content: res.data.comment.content,
                            createDate: res.data.comment.createDate,
                        };
                        Vue.set(diary.comments, index, commentData);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            });


        },
        showCommentsLength() {
            // 日記データにコメントデータが全て含まれるのを待つために、setTimeoutを使う
            setTimeout(() => {
                console.log(this.diariesData.map(diary => diary.comments.length));
            }, 500);
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
