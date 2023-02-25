<template>
    <div v-if="!not_found" class="scroll-wrap">
        <img src="" />
        <span class="category ">Катигория</span>
        <h2 class="title ">{{car_view_show.car_name}}</h2>
        <div class="meta">
            <img class="meta__avatar" src="assets/img/authors/1.png" alt="author01" />
            <span class="meta__author">Водитель</span>
            <span class="meta__date"><i class="fa fa-calendar-o"></i> Год выпуска</span>
            <span class="meta__reading-time"> Статус {{car_view_show.car_status}}</span>
        </div>
        <p>{{ car_view_show.characteristic }}</p>
    </div>
</template>

<script>
import axios from "axios";
export default {

    data: () => ({
        car_view_show: [],
        not_found: false
    }),

    mounted() {
        this.LoadCar(this.$route.params.id);
    },
    methods:{
        LoadCar(id){
            axios.get('/api/cars/' + id)
            .then(res =>{
                this.car_view_show = res.data;
            }).catch(err => {
                this.not_found = true;
            })
        }
    }
}
</script>

<style scoped>
.scroll-wrap {
    overflow-y: hidden;
    position: absolute;
    width: 50%;
    height: 50%;
    left: 390px;
    top: 243px;
}
</style>
