<template>
    <div>
        <nav>
            <ul>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
            <div>
                <button @click="logout" v-if="loggedIn">Logout</button>
            </div>
        </nav>
    </div>
</template>

<script>

import { mapGetters, mapActions } from "vuex";
export default {
    name: "Dashboard",
    data: () => ({

    }),
    computed: {
       ...mapGetters({
           loggedIn: 'loggedIn'
       })
    },
    methods:{
        ...mapActions({
            logout: 'logout'
        })
    }
}
</script>

<style scoped>

</style>
