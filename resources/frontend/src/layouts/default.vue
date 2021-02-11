<template>
    <v-app>
        <app-sidebar></app-sidebar>
        <app-navbar></app-navbar>

        <v-main>
            <router-view/>
        </v-main>
    </v-app>
</template>

<script>
import AppSidebar from "@/components/app/AppSidebar";
import AppNavbar from "@/components/app/AppNavbar";
export default {
    name: 'App',

    components: {AppNavbar, AppSidebar},

    data: () => ({
        //
    }),
};
</script>
