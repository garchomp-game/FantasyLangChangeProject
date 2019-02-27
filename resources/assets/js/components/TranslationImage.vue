<template lang="html">
    <div class="transitionMainBox">
        <!-- html2canvasを使う都合上非同期でやりたいためフォームタグを外しました。 -->
        <div class="form-group">
            <label for="">入力文字</label>
            <!-- 後ほどinputのspeakに英文字だけにするバリデーションをかける -->
            <!-- また、英語の子文字以外そもそも入力できないようにする外部ライブラリを導入する -->
            <input class="form-control" pattern="^[a-zA-Z1-9?! ]+" @input="speak=opt(speak, $event)" :value="speak" type="text">
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
            <button class="form-control" @click='outputImage(languageType, speak)'>画像として保存する</button>
        </div>
        <div style="width:500px;">
            <p id="transitionResult" v-bind:class="languageType" style="font-size:32px;">{{speak}}</p>
        </div>
</div>
</template>

<script>
import html2canvas from 'html2canvas';
export default {
    data: function(){
        return {
            speak: '',
            changeSpeak: '',
            select_lang: '',
            options: [ // optionsの配列。今後増えること考え、この配列はデータベースに持たせるのもあり。
                { text: 'ドラゴン文字', value: 'dragon-alphabet'},
                { text: 'ポケモン(アンノーン文字)', value: 'pokemon-annno-nn'}
            ],
            languageType: ''
        }
    },
    methods: {
        // プルダウンが変更されるたびに発火する。スタイリングを変えることで文字種の見た目を変更
        changeLang: function() { 
            this.languageType = this.select_lang;
        },
        // 画像を保存する処理を実装。
        outputImage: function(languageType, speak) {
            console.log('outputImage!');
            var dmy = document.getElementById('transitionResult');
            html2canvas(dmy).then(function(canvas){
                var filename = languageType + '(' + speak + ')' + '.png';
                saveAs(canvas.toDataURL(), filename);
            }).catch(function(err){
                alert(err);
            });
            // 実際に保存している場所。どうにかして共通化できないかが悩みどころ
            function saveAs(uri, filename) {
                var link = document.createElement('a');
                if (typeof link.download === 'string') {
                    link.href = uri;
                    link.download = filename;
                    
                    //Firefox requires the link to be in the body
                    document.body.appendChild(link);
                    
                    //simulate click
                    link.click();
                    
                    //remove the link when done
                    document.body.removeChild(link);
                } else {
                    window.open(uri);
                }
            }
            
        },
        // 文字入力されるたびに入力文字をチェック
        opt:function(oldVal,e){
            var re = new RegExp(e.target.pattern);
            var result = re.exec(e.target.value);
            console.log(oldVal);
            return e.target.value = (result)?result[0]:null;
        }
    }
}
</script>

<style lang="css" scoped>

</style>
