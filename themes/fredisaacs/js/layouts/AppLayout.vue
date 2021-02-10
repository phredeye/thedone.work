<template>
    <v-app>
        <app-left-drawer/>
        <v-app-bar fixed app clipped flat elevate-on-scroll color="transparent">
            <v-app-bar-nav-icon @click="toggleLeftDrawer"></v-app-bar-nav-icon>
            <v-toolbar-title>
                <slot name="title"/>
            </v-toolbar-title>
        </v-app-bar>
        <v-main>
            <slot/>
        </v-main>
    </v-app>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import AppLeftDrawer from "@/components/app/AppLeftDrawer";

export default {
    name: "AppLayout",
    props: {
        site: {
            type: Object
        }
    },
    components: {
        AppLeftDrawer
    },
    computed: mapState(['showLeftDrawer']),
    methods: mapActions(['toggleLeftDrawer'])
}
</script>

<style scoped>

</style>
