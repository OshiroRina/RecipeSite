<script setup>
import axios from "axios";
import { analysisRepository } from "@/repositories";
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { ref, reactive, onMounted, computed } from "vue";
import { DoughnutChart, BarChart } from "vue-chart-3";
import { Chart, registerables } from "chart.js";
import { getToday } from "@/common";

const props = defineProps({
    countries: Array,
    user_count: Array,
});

Chart.register(...registerables);

//ユーザー登録者 国別グラフ用データ
const dataValues = ref(props.user_count);
const dataLabels = ref(props.countries);

const graphData = reactive({
    labels: dataLabels.value,
    datasets: [
        {
            data: dataValues.value,
            title: "国別グラフ",
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

onMounted(() => {
    form.startDate = getToday();
    form.endDate = getToday();
})

const form = reactive({
    startDate: '',
    endDate: '',
});

//ユーザー登録者数 月別グラフ用データ(API取得)
const data = reactive({})

const getPeriod = async () => {
    try {
        let res = await analysisRepository.getPeriod(form.startDate, form.endDate);
        data.labels = res.labels;
        data.counts = res.counts;

        if(data.labels[0] == null){
            alert('該当データがありません');
        }
    } catch (e) {
        console.log(e.message);
    }
}

const labels = computed(() => data.labels);
const counts = computed(() => data.counts);

const chartData = reactive({
    labels: labels, //月ラベルデータ
    datasets: [
        {
            label: '登録者数',
            barPercentage: 0.5, //バーの幅
            data: counts,   //数量データ
            backgroundColor: [
                "#ffff7f",
                "#ffbf7f",
                "#bfff7f",
                "#7fffbf",
                "#A5C8ED",
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
            <div class="max-w-7xl mx-auto mb-5 sm:px-6 lg:px-8">
                <v-card class="pt-10 pb-15">
                    <div class="text-xl mx-20 mb-5 text-gray-500 font-bold">ユーザー登録者 国別グラフ</div>
                    <DoughnutChart :chartData="graphData" />
                </v-card>
                <v-card class="pt-10 pb-15 my-5">
                    <div class="text-xl mx-20 mb-5 text-gray-500 font-bold">ユーザー登録者数 月別グラフ</div>
                    <form @submit.prevent="getPeriod()">
                        <div class="flex align-center mx-20">
                            Desde : <input type="date" name="startDate" v-model="form.startDate"
                                class="px-5 mx-3 border rounded"> ～
                            Hasta : <input type="date" name="endDate" v-model="form.endDate"
                                class="px-5 mx-3 border rounded">
                            <button class="ml-5 bg-gray-400 px-3 py-1 rounded text-white hover:opacity-75">絞り込み</button>
                        </div>
                    </form>
                    <div class="mx-5 mt-10">
                        <BarChart :chartData="chartData" />
                    </div>
                </v-card>
            </div>
        </div>
    </AdminAuthenticatedLayout>
</template>
