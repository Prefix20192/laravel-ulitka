import axios from "axios";

const state = {
    userDetails: {},
    isLoggedIn: true,
    errors: [],
    invalidCredentials: ''
}

const actions = {
    registerUser({}, user){
        return new Promise((resolve, reject) => {
            axios
                .post('/api/register',{
                name: user.name,
                email: user.email,
                password: user.password,
                password_confirmation: user.password_confirmation
            })
                .then(response => {
                    /*console.log(response.data);*/
                    if(response.data){
                        window.location.replace('/login')
                        resolve(response)
                    }else{
                        reject(response)
                    }
                }) .catch((error) => {
                        reject(error);
                    })
        })
    },
    LoginUser(ctx, payload){
        console.log("Start login promise");
        return new Promise((resolve, reject) => {
            axios
                .post('/api/login', payload)
                .then(response => {
                    console.log(response);
                    if(response.data.access_token){
                        localStorage.setItem('token', response.data.access_token);
                        window.location.replace('/dashboard');
                    }
                }).catch((error) => {
                    if(error.response.data.error){
                        ctx.commit('setInvalidCredentials', error.response.data.error)
                    }else if(error.response.status === 422){
                        ctx.commit('setErrors', error.response.data.errors);
                    }
                    /*reject(error)*/
                    })
        })
    },
    logout(ctx){
        return new Promise((resolve) => {
            localStorage.removeItem('token');
            ctx.commit('setLoggedIn', false)
            resolve(true)
            window.location.replace('login')
        })
    },

    setLoggedInstate(ctx){
        return new Promise((resolve) => {
            if(localStorage.getItem('token')){
                ctx.commit('setLoggedIn', true)
                resolve(true)
            }else{
                ctx.commit('setLoggedIn', false)
                resolve(false)
            }
        })
    }
}

const mutations = {
    setLoggedIn(state, payload){
        state.isLoggedIn = payload
    },
    setErrors(state, payload){
        state.errors = errors;
    },
    setInvalidCredentials(state, invalidCredentials)
    {
        state.invalidCredentials = invalidCredentials
    }
}

const getters = {
    loggedIn(state){
        return state.isLoggedIn
    },
    userDetails(state){
        return state.userDetails
    },
    errors(state)
    {
        return state.errors
    },
    invalidCredentials(state)
    {
        return state.invalidCredentials
    }
}


export default {
    namespace: true,
    state,
    actions,
    mutations,
    getters
}
