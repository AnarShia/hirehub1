<template>
<NavBar/>
    <form @submit.prevent="submit">
        <div class="asdf">
            <td>
                <Link :class="{'font-bold':$page.url==='/register/Company'}" class="Company" :href="route('registerasCompany')">Company</Link>
            </td>
            <td>
                <Link :class="{'font-bold':$page.url==='/register/Employee'}" class="Employee" :href="route('registerasEmployee')">Employee</Link>
            </td>
        </div>
        <h3 style="margin-left: 13%">Register to Hirehub</h3>

        <div class="input">
            <input
                type="name"
                id="name"
                onblur="this.placeholder = 'Enter your Name'"
                placeholder="Enter your Name"
                v-model="form.name"
            />
        </div>
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
                onblur="this.placeholder = 'Enter your password'"
                placeholder="Enter your password"
                v-model="form.password"
            />
        </div>
         <div class="input">
            <input
                type="password"
                id="password_confirmation"
                onblur="this.placeholder = 'Enter your password again'"
                placeholder="Enter your password again"
                v-model="form.password_confirmation"
            />
        </div>
        <div class="input">
            <input
                type="country"
                id="country"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter your country'"
                placeholder="Enter your country"
                v-model="form.country"
            />
        </div>
         <div class="input">
            <input
                type="city"
                id="city"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter your city'"
                placeholder="Enter your city"
                v-model="form.city"
            />
        </div>
        
        <button @click="changewhich1" v-if="$page.url=='/register/Company'" style="margin-left: 50px">Register Company</button>
        <button @click="changewhich" v-else-if="$page.url=='/register/Employee'" style="margin-left: 50px">Register Employee</button>
        <button v-else style="margin-left: 35%">Register</button>
    </form>
</template>
<script setup>
import { reactive } from "vue";
import { ref } from "vue";
import NavBar from "@/Shared/NavBar.vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";


const form = reactive({
   name: "",
    email: "",
    password: "",
    password_confirmation: "",
    country: "",
    city: "",
});

let which = "register/Employee";

let changewhich = () => {
    which = "register/Employee";
    console.log(which);
};
let changewhich1 = () => {
    which = "register/Company";
     console.log(which);
};
defineProps({
   
});
let submit = () => {
    if(which=='register/Company'){
        Inertia.post(route('company.register'), {
            email: form.email,
            password: form.password,
            password_confirmation: form.password_confirmation,
            name: form.name,
            country: form.country,
            city: form.city,

        });
    }
    else{
        Inertia.post(route('register.user'), {
            email: form.email,
            password: form.password,
            password_confirmation: form.password_confirmation,
            name: form.name,
            country: form.country,
            city: form.city,
        });
    }
    
};
</script>

<style lang="scss" scoped>
form {
    gap: 20px;
    margin: 40px auto;
    width: clamp(200px, 40%, 280px);
    padding: 20px;
    box-sizing: border-box;
    box-shadow: 0px 14px 20px 12px #c9f4e8;
    border-radius: 8px;
    .asdf {
        border: none;
        border-radius: 20px;
        padding: 12px 12px;
        display: flex;
        background: #f8000012;
        justify-content: space-between;
        align-items: center;
        .Employee {
            border: none;
            border-radius: 20px;
            width: 100px;  
            padding: 2px 5px;
            background-color: #97cfd66a;
            color: black;
            text-align: center;
        }
        .Company {
            border: none;
            border-radius: 20px;
            width: 100px;
            padding: 2px 5px;
            background-color: #97cfd66a;
            color: black;
        }
    }
    h3 {
        font-size: 22px;
        font-weight: 400;
        margin: 10px;
    }
    .input {
        position: relative;
        input {
            border: 2px solid #232327;
            border-radius: 8px;
            background-color: #232327;
            outline: none;
            color: rgb(0, 183, 255);
            padding: 10px 12px;
            margin: 8px; 
            margin-left: 13%;  
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
        margin-left: 50%;
        padding: 10px 12px;
        background-color: rgb(0, 183, 255);
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
