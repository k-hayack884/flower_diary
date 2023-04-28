<template>
    <div class="overflow-x-auto">
        <table class="table w-full">
            <!-- head -->
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Job</th>
                <th>Favorite Color</th>
            </tr>
            </thead>
            <tbody>
            <!-- row 1 -->
            <tr>
                <th>1</th>
                <td>Cy Ganderton</td>
                <td>Quality Control Specialist</td>
                <td>Blue</td>
            </tr>
            <!-- row 2 -->
            <tr class="hover">
                <th>2</th>
                <td>Hart Hagerty</td>
                <td>Desktop Support Technician</td>
                <td>Purple</td>
            </tr>
            <!-- row 3 -->
            <tr>
                <th>3</th>
                <td>Brice Swyre</td>
                <td>Tax Accountant</td>
                <td>Red</td>
            </tr>
            </tbody>
        </table>
    </div></template>

<script>
export default {
    name: "TodayCare",
    props: ['user'],
    data() {
        return {
            successMessage: null,
            errorMessage: null,
        }
    },created() {
        axios.get(`/api/user/${this.user.user_id}/care?userId=${this.user.user_id}`, {})
            .then((res) => {
                const waterSettingData = res.data.waterSettings.map(waterSetting => ({
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

</style>
