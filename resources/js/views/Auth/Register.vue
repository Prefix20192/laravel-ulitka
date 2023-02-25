<template>
    <div class="pages_register">
        <form @submit.prevent>
            <div class="form-field">
                <input type="name" placeholder="UserName" v-model="user.name" required/>
            </div>
            <div class="form-field">
                <input type="email" placeholder="Email" v-model="user.email" required/>
            </div>

            <div class="form-field">
                <input type="password" placeholder="Password" v-model="user.password" required/>
            </div>
            <div class="form-field">
                <input type="password" placeholder="retry password" v-model="user.password_confirmation" required/>
            </div>

            <div class="form-field">
                <my-button class="btn" @click.native.prevent="register">Register</my-button>
            </div>
            <router-link to="/login"><p class="message">Already is registered?</p> <a href="#">Sing In</a></router-link>
        </form>
    </div>
</template>

<script>

export default {
    name: "Register",
    data: () => ({
        user: {
            name: "",
            email: "",
            password: "",
            password_confirmation: ""
        }
    }),
    methods: {
       register(){
           this.$store.dispatch('registerUser', this.user)
       }
    }
}
</script>

<style scoped>
.pages_register{
    font-family: 'Lato', sans-serif;
    color: #4A4A4A;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    overflow: hidden;
    margin: 0;
    padding: 0;
    box-shadow: #1a1e21;
}
form {
    width: 350px;
    position: relative;
}
form .form-field::before {
    font-size: 20px;
    position: absolute;
    left: 15px;
    top: 17px;
    color: #888888;
    content: " ";
    display: block;
    background-size: cover;
    background-repeat: no-repeat;
}

form .form-field {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-bottom: 1rem;
    position: relative;
}
form input {
    font-family: inherit;
    width: 100%;
    outline: none;
    background-color: #fff;
    border-radius: 4px;
    border: none;
    display: block;
    padding: 0.9rem 0.7rem;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
    font-size: 17px;
    color: #4A4A4A;
    text-indent: 40px;
}
form .btn {
    outline: none;
    border: none;
    cursor: pointer;
    display: inline-block;
    margin: 0 auto;
    padding: 0.9rem 2.5rem;
    text-align: center;
    background-color: #47AB11;
    color: #fff;
    border-radius: 4px;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
    font-size: 17px;
}
</style>
