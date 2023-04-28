<template>
    <div v-for="waterCareData in waterCareDatas">
        <div class="stats stats-vertical lg:stats-horizontal shadow">
            <div class="stat">
                <div class="stat-title">植物名</div>
                <div class="stat-value">{{waterCareData.plantName}}</div>
            </div>

            <div class="stat">
                <div class="stat-title">通知時間</div>
                <div class="stat-value">{{waterCareData.alertTime}}</div>
            </div>
            <div class="stat">
                <div class="stat-title">水やり量</div>

                <div class="stat-value">
                    <p v-if ="waterCareData.waterAmount='a_lot'">
たっぷり
                    </p>
                    <p v-else-if="waterCareData.waterAmount='moderate_amount'">
                        適量
                    </p>
                    <p v-else-if ="waterCareData.waterAmount='sparingly'">
                        ひかえめ
                    </p>
                </div>
            </div>

            <div class="stat">
                <div class="stat-title">備考欄</div>
                <div class="stat-desc">{{ waterCareData.waterNote }}</div>
            </div>
            <div class="stat">
                <div class="stat-value">ボタン（予定）</div>
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
            waterCareDatas:[]
        }
    }, created() {
        axios.get(`/api/user/${this.user.user_id}/care?userId=${this.user.user_id}`, {})
            .then((res) => {
                console.log(res.data[0]);
                const waterCareDatas = res.data.map(waterSetting => ({
                    alertTimeId: waterSetting.alert_time_id,
                    plantName:waterSetting.plant_name,
                    waterSettingId: waterSetting.water_setting_id,
                    waterAmount: waterSetting.water_setting.water_amount,
                    waterNote: waterSetting.water_setting.water_note,
                    alertTime: waterSetting.alert_time,
                }));
                console.log(waterCareDatas);

                this.waterCareDatas = waterCareDatas
            })
            .catch((error) => {
                console.log(error);
            });
        // axios.get(`/api/checkSeat/${this.checkSeatId}/fertilizerSetting?checkSeatId=${this.checkSeatId}`, {})
        //     .then((res) => {
        //         const fertilizerSettingData = res.data.fertilizerSettings.map(fertilizerSetting => ({
        //             fertilizerSettingId: fertilizerSetting.fertilizerSettingId,
        //             checkSeatId: this.checkSeatId,
        //             months: fertilizerSetting.months,
        //             note: fertilizerSetting.note,
        //             fertilizerAmount: fertilizerSetting.fertilizerAmount,
        //             fertilizerName: fertilizerSetting.fertilizerName,
        //         }));
        //         this.fertilizerSettings = fertilizerSettingData
        //     })
        //     .catch((error) => {
        //         console.log(error);
        //     });
    }
}
</script>

<style scoped>
.stats {
    display: flex;
    justify-content: space-between;
}
</style>
