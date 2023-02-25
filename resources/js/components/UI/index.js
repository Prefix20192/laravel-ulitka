import MyButton from "./MyButton.vue";
import Myinput from "./Myinput.vue";
export default {
    install(Vue) {
        Vue.component("my-button", MyButton);
        Vue.component("my-input", Myinput);
    }
}
