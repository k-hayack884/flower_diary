<template>
    <div v-for="waterCareData in waterCareDatas">
        <div v-show="isShowWaterSetting(waterCareData)">
            <div class="stats stats-vertical lg:stats-horizontal shadow">
                <div class="stat">
                    <div class="stat-title">植物名</div>
                    <div class="stat-value">{{ waterCareData.plantName }}</div>
                </div>

                <div class="stat">
                    <div class="stat-title">通知時間</div>
                    <div class="stat-value">{{ waterCareData.alertTime }}</div>
                </div>
                <div class="stat">
                    <div class="stat-title">水やり量</div>

                    <div class="stat-value">
                        <p v-if="waterCareData.waterAmount='a_lot'">
                            たっぷり
                        </p>
                        <p v-else-if="waterCareData.waterAmount='moderate_amount'">
                            適量
                        </p>
                        <p v-else-if="waterCareData.waterAmount='sparingly'">
                            ひかえめ
                        </p>
                    </div>
                </div>

                <div class="stat">
                    <div class="stat-title">備考欄</div>
                    <div class="stat-desc">{{ waterCareData.waterNote }}</div>
                    <div class="stat-desc">{{ waterCareData.resentCareWaterTime }}</div>

                </div>
                <div class="stat">
                    <button @click="doneWaterCared(waterCareData)">世話を完了する</button>
                </div>

            </div>
        </div>
    </div>
    <div v-for="fertilizerCareData in fertilizerCareDatas">
                <div v-show="isShowFertilizerSetting(fertilizerCareData)">
        <div class="stats stats-vertical lg:stats-horizontal shadow">
            <div class="stat">
                <div class="stat-title">植物名</div>
                <div class="stat-value">{{ fertilizerCareData.plantName }}</div>
            </div>

            <div class="stat">
                <div class="stat-title">施肥予定月</div>
                <div class="stat-value">{{ fertilizerCareData.alertMonth }}</div>
            </div>
            <div class="stat">
                <div class="stat-title">肥料名</div>
                <div class="stat-value">{{ fertilizerCareData.fertilizerName }}</div>
            </div>
            <div class="stat">
                <div class="stat-title">施肥量</div>
                <div class="stat-value">{{ fertilizerCareData.fertilizerAmount }}g</div>
            </div>

            <div class="stat">
                <div class="stat-title">備考欄</div>
                <div class="stat-desc">{{ fertilizerCareData.fertilizerNote }}</div>
                <div class="stat-desc">{{ fertilizerCareData.resentCareFertilizerTime }}</div>

            </div>
            <div class="stat">
                <button @click="doneFertilizerCared(fertilizerCareData)">世話を完了する</button>
            </div>

        </div>
    </div>
        </div>
</template>

<script>
export default {
    name: "TodayCare",
    props: ['user'],
    data() {
        return {
            successMessage: null,
            errorMessage: null,
            waterCareDatas: [],
            fertilizerCareDatas: [],
            nowDate: new Date(),
        }
    }, created() {
        // axios.get(`/api/user/${this.user.user_id}/care/water?userId=${this.user.user_id}`, {})
        //     .then((res) => {
        //         console.log(res.data[0]);
        //         const waterCareDatas = res.data.map(waterSetting => ({
        //             alertTimeId: waterSetting.alert_time_id,
        //             plantName: waterSetting.plant_name,
        //             waterSettingId: waterSetting.water_setting_id,
        //             waterAmount: waterSetting.water_setting.water_amount,
        //             waterNote: waterSetting.water_setting.water_note,
        //             wateringInterval: waterSetting.water_setting.watering_interval,
        //             resentCareWaterTime: waterSetting.resent_care_time,
        //             alertTime: waterSetting.alert_time,
        //         }));
        //         console.log(waterCareDatas);
        //
        //         this.waterCareDatas = waterCareDatas
        //     })
        //     .catch((error) => {
        //         console.log(error);
        //     });
        axios.get(`/api/user/${this.user.user_id}/care/fertilizer?userId=${this.user.user_id}`, {})
            .then((res) => {
                console.log(res.data[0]);
                const fertilizerSettingData = res.data.map(fertilizerSetting => ({
                    alertTimeId: fertilizerSetting.alert_time_id,
                    plantName: fertilizerSetting.plant_name,
                    fertilizerSettingId: fertilizerSetting.fertilizer_setting_id,
                    fertilizerNote: fertilizerSetting.fertilizer_setting.fertilizer_note,
                    fertilizerAmount: fertilizerSetting.fertilizer_setting.fertilizer_amount,
                    fertilizerName: fertilizerSetting.fertilizer_setting.fertilizer_name,
                    resentCareFertilizerTime: fertilizerSetting.resent_care_time,
                    alertMonth: fertilizerSetting.alert_month
                }));
                this.fertilizerCareDatas = fertilizerSettingData
            })
            .catch((error) => {
                console.log(error);
            });
    },
    methods: {
        isShowWaterSetting(waterSetting) {
            let diff;
            if (waterSetting.resentCareWaterTime == null) {
                diff = this.nowDate - new Date('0001-01-01 00:00:00');
            } else {
                diff = this.nowDate - new Date(waterSetting.resentCareWaterTime);
            }
            console.log(diff)
            if (diff >= (86400000 * waterSetting.wateringInterval)) {
                return true
            } else {
                return false
            }
        },
        isShowFertilizerSetting(fertilizerSetting) {
            if (fertilizerSetting.resentCareFertilizerTime == null||new Date(fertilizerSetting.resentCareFertilizerTime).getMonth() !=this.nowDate.getMonth()) {
                return true
            } else {
                return false
            }
        },
        doneWaterCared(waterSetting) {
            axios.post(`/api/care/${waterSetting.alertTimeId}/water?alertTimeId=${waterSetting.alertTimeId}`
            ).then(res => {

            }).catch(error => {
                if (error.response.status === 422) {
                    console.log(error.response.data.errors);
                    this.errors = error.response.data.errors;
                    this.isLoading = false

                } else {
                    console.log(error);
                    this.isLoading = false

                }
            });
        },
        doneFertilizerCared(fertilizerSetting) {
            axios.post(`/api/care/${fertilizerSetting.alertTimeId}/fertilizer?alertTimeId=${fertilizerSetting.alertTimeId}`
            ).then(res => {

            }).catch(error => {
                if (error.response.status === 422) {
                    console.log(error.response.data.errors);
                    this.errors = error.response.data.errors;
                    this.isLoading = false

                } else {
                    console.log(error);
                    this.isLoading = false
                }
            });
        }

    }
}
</script>

<style scoped>
.stats {
    display: flex;
    justify-content: space-between;
}
</style>
