<template>
    <h1>Статистика</h1>
    <div>
        <label>Начальная дата:</label>
        <input @change.prevent="getStatistics" type="date" v-model="startDate">

        <label>Конечная дата:</label>
        <input  @change.prevent="getStatistics" type="date" v-model="endDate">
    </div>
    <table class="w-75">
        <thead>
        <tr>
            <th class="p-lg-2">Название рассылки</th>
            <th class="p-lg-2">Статус</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="statistic in statistics" :key="statistic.id">
            <td>{{ statistic.sender_id }}</td>
            <td>{{ statistic.status_name }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "Statistics",
    data() {
        return {
            statistics: [],
            startDate: '2024-02-17',
            endDate: '2024-02-19'
        }
    },
    mounted() {
        this.getStatistics();
    },
    methods: {
        getStatistics() {
            axios.get(`/api/statistics/?start_date=${this.startDate}&end_date=${this.endDate}`)
                .then(res => {
                    console.log(res)
                    this.statistics = res.data;
                })
        },
    }

}
</script>

<style scoped>

</style>
