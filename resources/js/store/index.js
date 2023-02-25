import Vuex from 'vuex';
import Vue from "vue";

import middleware from './modules/middleware';
import auth from "./modules/auth";

Vue.use(Vuex)
export default new Vuex.Store({
    modules:{
        middleware,
        auth
    }
})
