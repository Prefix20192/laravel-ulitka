<template>
    <div id="theSidebar" class="sidebar">
        <button class="close-button fa fa-fw fa-close"></button>

        <h1><span>Реактивная</span> Улитка</h1>
        <nav class="codrops-demos" v-for="link in links">
            <a class="current-demo" :href="link.href">{{ link.title }}</a>
        </nav>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                links:[
                    {
                        title: "Главная",
                        href: "/"
                    },
                    {
                        title: "Админ-панель",
                        href: "/admin"
                    }
                ]
            }
        }
    }
</script>

<style scoped>

</style>
