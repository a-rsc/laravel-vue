@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <my-translator2 prop-language="ES"></my-translator2>
            <my-translator2 prop-language="EN"></my-translator2>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    let Translator = Vue.component('my-translator2', {
        template: `<div component="my-translator2">
                    <h1>Traductor <span v-if="propLanguage == 'ES'">castellano-inglés</span><span v-else>inglés-castellano</span></h1>
                    <input type="text" id="inputText" v-model="word" v-bind:placeholder="placeholder" style="width: 20em; height: 3em;">
                    <input type="button" v-on:click="Reset" value="Restaurar">
                    <div v-for="(match, index) in AnyMatch" :key="index">
                        <span v-if="propLanguage == 'ES'">@{{ match.ES + ' -> ' + match.EN }}</span>
                        <span v-else>@{{ match.EN + ' -> ' + match.ES }}</span>
                    </div>
                </div>`
        ,
        mounted() {
            document.getElementById('inputText').focus();
        },
        data() {
            return {
                placeholder: 'Introduzca una palabra a traducir...',
                word: '',
                dictionary: [
                    {'EN':'hello', 'ES':'hola'},
                    {'EN':'hour', 'ES':'hora'},
                    {'EN':'bye', 'ES':'adiós'},
                    {'EN':'good', 'ES':'bueno'},
                    {'EN':'bad', 'ES':'malo'}
                ]
            }
        },
        computed:{
            AnyMatch() {
                let match = false;
                let words = [];
                this.dictionary.map((w) => {if (this.word != '' && w[this.propLanguage].toLowerCase().includes(this.word.toLowerCase())) words.push(w);})
                console.log(match);
                console.log(words);
                console.log(this.dictionary);
                return words; }
        },
        props: {
            propLanguage: {type: String, default: 'ES'}
        },
        methods: {
            Reset() {
                this.word = '';
                document.getElementById('inputText').focus();
            }
        }
    });

    const app = new Vue({
        el: '#app',
        beforeCreate() {
            // this.title = document.getElementsByTagName('title')[0].innerText;
        },
        created() {
            var url = window.location.pathname;
            var filename = url.substring(url.lastIndexOf('/')+1); // url filename

            // filename = filename.split('.').slice(0, -1).join('.'); // extension
            // filename = filename.substring(filename.lastIndexOf('-')+1); // lesson

            // console.log(filename);
            this.lesson = `Lección ${filename}`;
        },
        beforeMount() {
            document.getElementsByTagName('title')[0].innerText = this.title;
        },
        mounted() {
        },
        data: {
            title: 'Componente parametrizable',
            subtitle: 'Reutilizables',
            lesson: ''
        },
        components: {
            'my-translator2': Translator
        },
        methods: {
        }
    });
</script>
@endsection
