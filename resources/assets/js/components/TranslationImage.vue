<template lang="html">
    <div class="transitionMainBox">
        <!-- html2canvasを使う都合上非同期でやりたいためフォームタグを外しました。 -->
        <div class="form-group">
            <label for="">入力文字</label>
            <!-- 後ほどinputのspeakに英文字だけにするバリデーションをかける -->
            <!-- また、英語の子文字以外そもそも入力できないようにする外部ライブラリを導入する -->
            <input class="form-control" v-model="speak" type="text">
        </div>
        <div class="form-group">
            <label for="">文字種選択</label>
            <select class="form-control" v-model="select_lang" @change="changeLang">
                <option disabled value="">選択してください</option>
                <option v-for="option in options" :value="option.value">
                    {{ option.text }}
                </option>
            </select>
        </div>
        <div class="form-group">
            <button class="form-control" @click='outputImage'>画像として保存する</button>
        </div>
        <div>
            <p id="transitionResult" v-bind:class="languageType" style="font-size:32px;">{{speak}}</p>
        </div>
        <!--
        結果出力用の空divを用意。これがないと画像が表示されない
        後にこの空divにv-modelを付与するかidを持たせて画像保存処理に使う。 
        書き方が全然vueらしくないがそこは調べながら後で対策を考えることにする。githubで一応privateにしているけど
        公開していいものだと個人的には思っているので、teratailとかにこちらをサンプルソースとして質問に使うかも
        -->
        <div></div>
    </div>
</template>

<script>
import html2canvas from 'html2canvas';
console.log('component-pass');
export default {
    data: function(){
        return {
            speak: '',
            changeSpeak: '',
            select_lang: '',
            options: [ // optionsの配列。今後増えること考え、この配列はデータベースに持たせるのもあり。
                { text: 'ドラゴン文字', value: 'dragon'},
                { text: 'ポケモン文字', value: 'pokemon'}
            ],
            languageType: '',
            Image: null
        }
    },
    methods: {
        changeLang: function() { 
            this.languageType = this.select_lang;
        },
        outputImage: function() {
            console.log('outputImage!');
            var dmy = document.getElementById('transitionResult');
            html2canvas(dmy).then(function(canvas){
                document.body.appendChild(canvas);
            }).catch(function(err){
                alert(err);
            });
        }
    }
}
</script>

<style lang="css" scoped>
/* 現在は実験のため直で書いているが、これらはfont.scssとしてfont集にまとめるものとする。 */
@font-face {
    font-family: 'dragonLang';
    src:url('../../fontFile/dragon-alphabet.regular.ttf');
}
.dragon {
    font-family: 'dragonLang';
}
</style>
