<template>
    <div class="flex flex-col">

    <div v-for="plantUnit in plantUnits">
        <div class="card card-side bg-base-100 shadow-xl">
            <figure><img src="../../icon/wings.webp" alt="Movie"/></figure>
            <div class="card-body">
                <h2 class="card-title">New movie is released!</h2>
                <p>Click the button to watch on Jetflix app.</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Watch</button>
                </div>
            </div>
        </div>
    </div>
    </div>

</template>

<script>
export default {
    name: "PlantUnit",
    data() {
        return {
            plantUnits: [{
                plantUnitId: '',
                UserId: '',
                plantId: '',
                checkSeatId: '',
                plantName: null,
                plantImage: '',
                diaries: [],
                createDate: '',
                updateDate: '',
            }]
        }
    },
    created() {
        axios.get('/api/plantUnit')
            .then(res => {
                const plantUnit = [];
                res.data.plantUnits.forEach((plant) => {
                    plantUnit.push({
                        plantUnitId: plant.plantUnitId,
                        UserId: plant.UserId,
                        plantId: plant.plantId,
                        checkSeatId: plant.checkSeatId,
                        plantName: plant.plantName,
                        plantImage: plant.plantImage,
                        diaries: plant.diaries,
                        createDate: plant.createDate,
                        updateDate: plant.updateDate,
                    });
                });
                this.plantUnits = plantUnit;
            })
            .catch(error => {
                // APIリクエストが失敗した場合の処理
                console.log(error);
            });
    },
    computed: {
        computedPlantUnitId() {
            return this.plantUnitId;
        }
    }
}
</script>

<style scoped>

</style>
