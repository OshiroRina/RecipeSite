<script setup>
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { ref, reactive } from "vue";
import { DoughnutChart } from "vue-chart-3";
import { Chart, registerables } from "chart.js";

const props = defineProps({
    countries: Array,
    user_count: Array
});

// console.log(props.countries)

Chart.register(...registerables);

//ユーザー登録者 国別グラフ用データ
const dataValues = ref(props.user_count);
const dataLabels = ref(props.countries);

const graphData = reactive({
    labels: dataLabels.value,
    datasets: [
        {
            data: dataValues.value,
            title:"国別グラフ",
            backgroundColor: [
                "#ffff7f",
                "#ffbf7f",
                "#bfff7f",
                "#7fffbf",
                "#A5C8ED",
            ],
        },
    ],
});

</script>
<template>
    <AdminAuthenticatedLayout>
        <Head title="分析" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <v-card class="pt-10 pb-15">
                <div class="text-xl mx-20 mb-5 text-gray-500 font-bold">ユーザー登録者 国別グラフ</div>
                <DoughnutChart :chartData="graphData"/>
            </v-card>
            </div>
        </div>
    </AdminAuthenticatedLayout>
</template>
