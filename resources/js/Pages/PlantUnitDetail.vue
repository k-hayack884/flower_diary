<template>
    <h1>ああああああああ</h1>
    <p>plantUnitId: {{ plantUnitId }}</p>
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
            diaries: [],
            createDate: '',
            updateDate: '',
            plantData: {
                scientific: '',
            }
        }
    },
    created() {
        console.log(this.plantUnitId);
        this.fetchPlantUnitData();


        // `this.plantUnits`が更新された後に実行
        //     this.$nextTick(() => {
        //         this.plantUnits.forEach((plantUnit, index) => {
        //             axios.get(`/api/plant/${plantUnit.plantId}`, {})
        //                 .then(res => {
        //                     console.log(res.data.plant.scientific)
        //                     Vue.set(this.plantUnits[index], 'plantData', {
        //                         scientific: res.data.plant.scientific
        //                     });
        //
        //                 })
        //                 .catch(error => {
        //                     // APIリクエストが失敗した場合の処理
        //                     console.log(error);
        //                 });
        //         });
        //     });
        // })
        // .catch(error => {
        //     // APIリクエストが失敗した場合の処理
        //     console.log(error);
    },
    methods: {
        fetchPlantUnitData() {
            console.log(this.plantUnitId);

            axios.get(`/api/plantUnit/${this.plantUnitId}`)
                .then(res => {
                    this.UserId = res.data.plantUnit.UserId;
                    this.plantId = res.data.plantUnit.plantId;
                    this.checkSeatId = res.data.plantUnit.checkSeatId;
                    this.plantName = res.data.plantUnit.plantName;
                    this.plantImage = res.data.plantUnit.plantImage;
                    this.diaries = res.data.plantUnit.diaries;
                    this.createDate = res.data.plantUnit.createDate;
                    this.updateDate = res.data.plantUnit.updateDate;
                    this.plantData = {
                        scientific: '',
                    }
                })
                .catch(error => {
                    console.log(error);
                });

        }
    }
}
</script>

<style scoped>

</style>
