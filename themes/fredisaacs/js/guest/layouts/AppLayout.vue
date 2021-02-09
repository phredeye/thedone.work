<template>
    <v-app>
        <app-left-drawer/>
        <v-app-bar>
            <v-toolbar-title>{{ app.title }}</v-toolbar-title>
        </v-app-bar>
        <v-main>
            <slot></slot>
        </v-main>
    </v-app>
</template>

<script>
import AppLeftDrawer from "../components/app/AppLeftDrawer";

export default {
    name: "AppLayout",
    props: {
        app: {
            type: Object
        }
    },
    components: {
        AppLeftDrawer
    }
}
</script>

<style scoped>

</style>
