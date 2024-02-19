<template>
    <h1>Список гостей</h1>
    <table class="w-75">
        <thead>
        <tr>
            <th class="p-lg-2">Телефон</th>
            <th class="p-lg-2">Имя</th>
            <th class="p-lg-2">Дата рождения</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in users" :key="user.id">
            <td>{{ user.phone }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.birthday }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "List",
    data() {
        return {
            users: []
        }
    },
    mounted() {
        this.getUsers();
    },
    methods: {
        getUsers() {
            axios.get(`/api/user/`)
                .then(res => {
                    this.users = res.data;
                })
        },
    }
}
</script>

<style scoped>

</style>
