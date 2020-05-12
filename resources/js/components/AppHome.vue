<template>
    <div>
        <Toolbar></Toolbar>
        <v-container grid-list-xs>
            <router-view></router-view>
        </v-container>


    </div>
</template>

<script>
import Toolbar from './Toolbar';

    export default {
        components: {Toolbar}
    }
</script>

<style lang="scss" scoped>

</style>
