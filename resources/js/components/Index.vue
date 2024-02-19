<template>
    <div>
        <div class="d-flex justify-content-between">
            <router-link :to="{name:'statistics'}">Статистика</router-link>
            <router-link :to="{name:'user.list'}">Список пользователей</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "Index",
}
</script>

<style scoped>

</style>
