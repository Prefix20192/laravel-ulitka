<template>
    <div v-if="!not_found">
        <section class="content">
            <div class="scroll-wrap">
                <article class="content__item">
                    <span class="category category--full">Катигория</span>
                    <h2 class="title title--full">{{mashin.car_name}}</h2>
                    <div class="meta meta--full">
                        <img class="meta__avatar" src="assets/img/authors/1.png" alt="author01" />
                        <span class="meta__author">Водитель</span>
                        <span class="meta__date"><i class="fa fa-calendar-o"></i> Год выпуска</span>
                        <span class="meta__reading-time"> Статус {{mashin.car_status}}</span>
                    </div>
                    <p>{{ mashin.characteristic }}</p>
                </article>
            </div>
            <button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
        </section>
    </div>
</template>

<script>
import axios from "axios";
export default {

    data: () => ({
        mashin: [],
        not_found: false
    }),

    mounted() {
        this.LoadCar(this.$route.params.id);
    },
    methods:{
        LoadCar(id){
            axios.get('/api/cars/' + id)
            .then(res =>{
                this.mashin = res.data;
            }).catch(err => {
                this.not_found = true;
            })
        }
    }
}
</script>

<style scoped>

</style>
