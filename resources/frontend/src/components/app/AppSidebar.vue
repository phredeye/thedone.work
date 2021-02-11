<template>
    <v-navigation-drawer :value="showSidebar" app clipped>
        <v-sheet>

        </v-sheet>
        <v-list>
            <v-list-item v-for="item in items" :key="item.link"
                @click="navigateTo(item.link)">
                <v-list-item-icon>
                    <v-icon>{{ item.icon }}</v-icon>
                </v-list-item-icon>
                <v-list-item-title>
                    {{item.label}}
                </v-list-item-title>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
import { mapState, mapActions } from 'vuex'

export default {
    name: "AppSidebar",
    data() {
        return {
            items: [
                {
                    icon: 'home',
                    label: 'Home',
                    link: 'home'
                },
                {
                    icon: 'clipboard-list-outline',
                    label: 'What I\'ve Done',
                    link: 'works'
                },
                {
                    icon: 'home',
                    label: 'What I Do',
                    link: 'skills'
                },
                {
                    icon: 'home',
                    label: 'Who I Am',
                    link: 'about'
                },
                {
                    icon: 'home',
                    label: 'What I Write',
                    link: 'blog'
                }
            ]
        }
    },
    computed: mapState(['showSidebar']),
    methods: {
        ...mapActions(['toggleSidebar']),
        navigateTo(link) {
            this.$router.push({
                name: link
            })
        }
    }
}
</script>

<style scoped>

</style>
