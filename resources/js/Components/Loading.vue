<template>
    <div class="modal mx-auto w-full text-center">
    </div>
    <div class="circle">
            <v-progress-circular
                :indeterminate="isLoading"
                :size="100"
                color="grey"
                class="m-t"
            ></v-progress-circular>
    </div>
</template>
<style>
.modal {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgb(162, 159, 159);
    opacity: 0.5;
    z-index: 1000;
}
.circle {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background:rgba(255,0,0,0);
    z-index: 2000;
}
</style>
<script>
export default {
    data() {
        return {
            isLoading: true,
            value: 60,
        };
    },
    mounted() {
        this.interval = setInterval(() => {
            this.createIncrease();
        }, 100);
    },

    methods: {
        createIncrease() {
            if (this.value <= 100) this.value++;
            else this.value = 0;
        },
    },
};
</script>
