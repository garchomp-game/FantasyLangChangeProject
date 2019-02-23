<template lang="html">
    <div class="transitionMainBox">
        <form class="" action="index.html" method="post">
            <p>{{speak}}</p>
            <input v-model="speak" type="text">
            <select v-model="select_lang">
                <option v-for="option in options" v-bind:value="option.value">
                    {{ option.text }}
                </option>
            </select>
            <button :click="changeLang"></button>
        </form>
        <div class="transitionResult">
            <p v-model="changeSpeak" :class="languageType"></p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
console.log('component-pass');
export default {
    data: function(){
        return {
            speak: '',
            changeSpeak: '',
            select_lang: '',
            options: [
                { text: 'ドラゴン文字', value: 'dragon'},
                { text: 'ポケモン文字', value: 'pokemon'}
            ],
            languageType: '',
        }
    },
    methods: {
        changeLang: function() {
            switch (this.select_lang) {
                case 'dragon':
                    this.languageType = 'dragon';
                    break;
                case 'pokemon':
                    this.languageType = 'pokemon';
                    break;
            }
        }
    }
}
</script>

<style lang="css" scoped>
</style>
