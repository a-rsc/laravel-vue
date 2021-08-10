@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <my-translator></my-translator>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    let Translator = Vue.component('my-translator', {
        template: `<div component="my-translator">
                    <h1>Traductor castellano-inglés</h1>
                    <input type="text" id="inputText" v-model="word" v-bind:placeholder="placeholder" style="width: 20em; height: 3em;">
                    <input type="button" v-on:click="Reset" value="Restaurar">
                    <div v-for="match in AnyMatch">
                        <span>@{{ match.ES + ' -> ' + match.EN }}</span>
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
                this.dictionary.map((w) => {if (this.word != '' && w.ES.toLowerCase().includes(this.word.toLowerCase())) words.push(w);})
                // this.dictionary.map((w) => {if (this.word != '' && w['ES'].toLowerCase().includes(this.word.toLowerCase())) words.push(w);})
                console.log(match);
                console.log(words);
                console.log(this.dictionary);
                return words; }
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
            title: 'Componente',
            subtitle: 'Componente',
            lesson: ''
        },
        components: {
            'my-translator': Translator
        },
        methods: {
        }
    });
</script>
@endsection
