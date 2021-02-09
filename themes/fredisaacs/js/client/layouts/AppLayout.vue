<template>
    <v-app>
        <app-left-drawer/>
        <v-app-bar></v-app-bar>
        <v-main>
            <slot></slot>
        </v-main>
    </v-app>
</template>

<script>
import AppLeftDrawer from "../components/app/AppLeftDrawer";

export default {
    name: "AppLayout",
    components: {
        AppLeftDrawer
    }
}
</script>

<style scoped>

</style>
