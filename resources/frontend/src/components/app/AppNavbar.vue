<template>
    <v-app-bar
        app
        clipped-right
        color="primary"
        dark>
        <v-app-bar-nav-icon @click="toggleSidebar"></v-app-bar-nav-icon>
        <v-toolbar-title>Fred Isaacs</v-toolbar-title>

        <v-spacer></v-spacer>


    </v-app-bar>
</template>

<script>
import {mapState, mapActions} from 'vuex'

export default {
    name: "AppNavbar",
    computed: mapState(['showSidebar']),
    methods: mapActions(['toggleSidebar'])
}
</script>

<style scoped>

</style>
