<template>
    <div>
        <div v-if="successMessage" className="card w-32 bg-base-100 shadow-xl">
            <div className="card-body">
                <p>{{ successMessage }}</p>
                <div className="radial-progress text-primary" style="--value:70;">70%</div>
            </div>
        </div>
        <div v-if="failMessage" className="card w-32 bg-base-100 shadow-xl">
            <div className="card-body">
                <p>{{ failMessage }}</p>
                <div className="radial-progress text-primary" style="--value:70;">70%</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        successMessage: String,
        failMessage: String,
    },
    mounted() {
        if (this.successMessage || this.failMessage) {
            setTimeout(() => {
                this.successMessage = "";
                this.failMessage = "";
            }, 5000);
        }
    },
    head() {
        return {
            script: this.$page.head.filter(
                (h) => h.tag === "script" && h.attributes.src.includes("ionicons")
            ),
        };
    },
};
</script>
