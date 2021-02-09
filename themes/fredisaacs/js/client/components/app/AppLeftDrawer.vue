<template>
    <v-navigation-drawer :value="showLeftDrawer">
        <v-sheet
            color="grey lighten-4"
            class="pa-4">

            <v-avatar
                class="mb-4"
                color="grey darken-1"
                size="64">
            </v-avatar>

            <div>{{ currentUser.name }}</div>
        </v-sheet>

        <v-divider></v-divider>

        <v-list>
<!--            <v-list-item-->
<!--                v-for="[icon, text] in links"-->
<!--                :key="icon"-->
<!--                link-->
<!--            -->
<!--                <v-list-item-icon>-->
<!--                    <v-icon>{{ icon }}</v-icon>-->
<!--                </v-list-item-icon>-->

<!--                <v-list-item-content>-->
<!--                    <v-list-item-title>{{ text }}</v-list-item-title>-->
<!--                </v-list-item-content>-->
<!--            </v-list-item>-->
        </v-list>
    </v-navigation-drawer>
</template>

<script>
import {mapState, mapActions} from 'vuex'

export default {
    name: "AppLeftDrawer",
    props: {
        currentUser: {
            type: Object,
            default: {
                name: '',
                email: ''
            }
        },
        links: Array
    },
    computed: mapState(['showLeftDrawer'])
}
</script>

<style scoped>

</style>
