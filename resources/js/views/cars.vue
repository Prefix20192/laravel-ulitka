<template>
    <div id="theGrid" class="main">
        <section class="grid">
            <header class="top-bar">
                <h2 class="top-bar__headline">Последние авто</h2>
                <div class="filter">
                    <span>Сортировка:</span>
                    <span class="dropdown">Попульрные</span>
                </div>
            </header>
            <a class="grid__item" href="#" v-for="cars in vehicle">
                <h2 class="title title--preview">{{cars.car_name}}</h2>
                <div class="loader"></div>
                <span class="category">Катигория</span>
                <div class="meta meta--preview">
                    <img class="meta__avatar" src="assets/img/authors/1.png" alt="author01" />
                    <span class="meta__date"><i class="fa fa-calendar-o"></i> Год выпуска</span>
                    <span class="meta__reading-time"> Статус: {{cars.car_status}}</span>
                </div>
            </a>
            <footer class="page-meta">
                <span>Открыть еще..</span>
            </footer>
        </section>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data: () => ({
        vehicle: []
    }),
    mounted() {
        this.LoadCar()
    },
    methods:{
        LoadCar() {
            axios.get('/api/cars')
                .then(res => {
                    this.vehicle = res.data;
                })
        }
    }
}
</script>

<style scoped>

</style>
