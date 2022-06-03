<template>
    <NavBar />
    <div class="home">
        <section class="hero">
            <div class="hero-text container">
                
                <h4>One place gathers talents and capitals </h4>
                <h2>HireHub </h2>
            </div>
        </section>
    </div>
</template>

<script>
import { usePage } from '@inertiajs/inertia-vue3';
import mybg from "../assets/images/logo.png";
import NavBar from "../Shared/NavBar.vue";
import { computed } from '@vue/runtime-core';
export default {
    data() {
        return {
            mybg: mybg,
        
        };
    },

    setup() {
    const user = computed(() => usePage().props.value.auth.user)
    const company = computed(() => usePage().props.value.auth.company)
    return { user,company }
  }, 
    components: {
        NavBar,
    },
};
</script>

<style lang="scss" scoped>
.hero {
    background-image: url("../assets/images/bg.jpg");

    background-attachment: fixed;
    position: relative;
    height: 100vh;
    img {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
    .hero-text {
        padding-left: 20%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: safe;
        color: rgb(0, 198, 168);
        h4 {
            text-transform: uppercase;
            font-size: 22px;
            padding-bottom: 500px;
        }
        h2 {
            margin-left: 45%;
            font-size: 50px;
            @media (min-width: 550px) {
                font-size: 80px;
            }
        }
    }
}
</style>
