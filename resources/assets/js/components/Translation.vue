<template lang="html">
    <div class="transitionMainBox">
        <form class="" action="index.html" method="post">
            <input v-model="speak">
            <button :click="changeLang"></button>
        </form>
        <div class="transitionResult">
            <p v-model="changeSpeak"></p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data: function() {
        return {
            speak: '',
            changeSpeak: ''
        }
    },
    methods: {
        changeLang: function() {
            var params = new URLSearchParams();
            params.append('speak', this.speak);
            axios.post('url', params)
            .then(function(res) {
                this.changeSpeak = res.data.changeSpeak
            })
        }
    }
}
</script>

<style lang="css" scoped>
</style>
