<template>
<NavBar/>
    <form @submit.prevent="submit">
        <div class="asdf">
            <td>
                <Link :class="{'font-bold':$page.url==='/login/Company'}" class="Company" :href="route('loginasCompany')">Company</Link>
            </td>
            <td>
                <Link :class="{'font-bold':$page.url==='/login/Employee'}" class="Employee" :href="route('loginasEmployee')">Employee</Link>
            </td>
        </div>
        <h3 style="margin-left: 10px">Login to Hirehub</h3>

        <div class="input">
            <input
                type="email"
                id="email"
                onblur="this.placeholder = 'Enter your E-mail'"
                placeholder="Enter your E-mail"
                v-model="form.email"
            />
        </div>
        <div class="input">
            <input
                type="password"
                id="password"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter your Password'"
                placeholder="Enter your Password"
                v-model="form.password"
            />
        </div>

        <button @click="changewhich1" v-if="$page.url=='/login/Company'" style="margin-left: 50px">Login Company</button>
        <button @click="changewhich" v-else-if="$page.url=='/login/Employee'" style="margin-left: 50px">Login Employee</button>
        <button v-else style="margin-left: 50px">Login</button>
    </form>
</template>
<script setup>
import { reactive } from "vue";
import { ref } from "vue";
import NavBar from "@/Shared/NavBar.vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";


const form = reactive({
    email: "",
    password: "",
});

let which = "login/Employee";

let changewhich = () => {
    which = "login/Employee";
    console.log(which);
};
let changewhich1 = () => {
    which = "login/Company";
     console.log(which);
};

defineProps({});
let submit = () => {
    if(which=='login/Company'){
        Inertia.post(route('company.login'), {
            email: form.email,
            password: form.password,
        });
    }
    else{
        Inertia.post(route('login.user'), {
            email: form.email,
            password: form.password,
        });
    }
    
};
</script>

<style lang="scss" scoped>
form {
    gap: 20px;
    margin: 0 auto;
    width: clamp(200px, 40%, 280px);
    padding: 20px;
    box-sizing: border-box;
    box-shadow: 0px 14px 20px 12px #00000012;
    border-radius: 8px;
    .asdf {
        border: none;
        border-radius: 20px;
        padding: 12px 12px;
        display: flex;
        background: #00000012;
        justify-content: space-between;
        align-items: center;
        .Employee {
            border: none;
            border-radius: 20px;
            width: 100px;  
            padding: 2px 5px;
            background-color: #00000012;
            color: black;
            text-align: center;
        }
        .Company {
            border: none;
            border-radius: 20px;
            width: 100px;
            padding: 2px 5px;
            background-color: #00000012;
            color: black;
        }
    }
    h3 {
        font-size: 22px;
        font-weight: 400;
        margin: 0;
    }
    .input {
        position: relative;
        input {
            border: 2px solid #232327;
            border-radius: 8px;
            background-color: #232327;
            outline: none;
            color: #bdbdbd;
            padding: 10px 12px;
            margin: 8px;   
            box-sizing: border-box;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .placeholder {
            position: absolute;
            width: calc(100% - 24px);
            top: 10px;
            left: 12px;
            pointer-events: none;
            overflow: hidden;
            span {
                transition: all 0.3s ease;
                font-size: 14px;
            }
        }
    }
  
  
    button {
        border-radius: 20px;
        padding: 10px 12px;
        background-color: red;
        color: white;
    }
    .err {
        color: wheat;
        font-size: 12px;
        margin-top: 10px;
    }

    

    Link{
        color: white;
        text-decoration: none;
    }
}
</style>
