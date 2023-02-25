<template>
    <div id="theSidebar" class="sidebar">
        <button class="close-button fa fa-fw fa-close"></button>

        <h1><span>Реактивная</span> Улитка</h1>
        <br>

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
                        title: "Авторизация",
                        href: "/login"
                    },
                    {
                        title: "Регистрация",
                        href: "/register"
                    }
                ]
            }
        }
    }
</script>

<style scoped>

</style>
