<template>
<div component="my-translator">
    <h1>Traductor castellano-inglés</h1>
    <input type="text" id="inputText" v-model="word" v-bind:placeholder="placeholder" style="width: 20em; height: 3em;">
    <input type="button" v-on:click="Reset" value="Restaurar">
    <div v-for="(match, index) in AnyMatch" :key="index">
        <span>{{ `${match.ES} -> ${match.EN}` }}</span>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
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
    }
</script>
