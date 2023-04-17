<template>
    <div class="flex justify-center">
        <div class="flex flex-col w-3/4">

            <div v-for="plantUnit in plantUnits" class="">
                <div
                    class="card card-side bg-base-100 shadow-lg rounded-lg overflow-hidden m4transform hover:scale-105 transition duration-300 my-4">
                    <figure><img :src="'data:image/png;base64,'+plantUnit.plantImage" /> </figure>
                    <div class="card-body">
                        <h2 clasoss="card-title">{{ plantUnit.plantName }}</h2><a href="">名前変更</a>
                        {{ plantUnit.plantData.scientific }}
                        <p>日記更新日: {{ plantUnit.createDate }}</p>

                        <div class="card-actions justify-end">
                            <a :href="route('plantUnitDetail', { plantUnitId: plantUnit.plantUnitId })"
                                  class="block">
                                <button class="btn btn-primary">詳細</button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PlantUnit",
    props: ['user'],
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
                plantData: {
                    scientific: '',
                }
            }],
        }
    },
    created() {
        console.log(this.user.user_id)
        axios.get(`/api/${this.user.user_id}/plantUnit`)
            .then(res => {
                const plantUnits = res.data.plantUnits.map(plant => ({
                    plantUnitId: plant.plantUnitId,
                    userId: plant.userId,
                    plantId: plant.plantId,
                    checkSeatId: plant.checkSeatId,
                    plantName: plant.plantName,
                    plantImage: plant.plantImage,
                    diaries: plant.diaries,
                    createDate: plant.createDate,
                    updateDate: plant.updateDate,
                    plantData: {
                        scientific: '',
                    }
                }));
                this.plantUnits = plantUnits;
                console.log(this.plantUnits[3].plantImage);

                // `this.plantUnits`が更新された後に実行
                this.$nextTick(() => {
                    this.plantUnits.forEach((plantUnit, index) => {
                        axios.get(`/api/plant/${plantUnit.plantId}`, {})
                            .then(res => {
                                console.log(res.data.plant.scientific)
                                Vue.set(this.plantUnits[index], 'plantData', {
                                    scientific: res.data.plant.scientific
                                });

                            })
                            .catch(error => {
                                // APIリクエストが失敗した場合の処理
                                console.log(error);
                            });
                    });
                });
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
