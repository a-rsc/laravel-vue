@extends('layouts.app')

@section('title', 'Eventos')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <h1>@{{ title }}</h1>

        <input type="text" id="inputText" v-on:keyup.enter="onEnterPressed" v-model="inputText">
        <h2 ref="message"></h2>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Podemos empezar a escuchar eventos añadiendo al input la directiva v-on seguido de que evento queremos escuchar para reaccionar invocando a un método concreto.</p>
            <p>De esta forma, cada vez que modifiquemos el contenido del input se modificará la propiedad y se renderizará inmediatamente. Sin embargo, ¿cómo haríamos si queremos que se modifique solamente cuando se finalice su edición? ¿Cuándo detectamos que se ha acabado la edición?</p>
            <p>En este caso vamos a interpretar que se acaba de editar el valor cuando se pulsa la tecla Enter. Para ello tendremos que detectar esta pulsación y esto lo podemos conseguir con la directiva v-on diciendo que ejecutaremos una acción justo cuando se deje de presionar (modificador keyup) la tecla Enter (modificador enter)</p>
            <p>Escuchar eventos de teclado suele ser una práctica muy común para interceptar eventos según ocurran. Para invocar determinadas acciones, hemos probado el evento keyup. Además, podemos establecer un modificador concreto a invocar tras la captura del evento "haber pulsado una tecla", por ejemplo, capturar una tecla en concreto, la tecla escape o incluso definir alias para las F del teclado. Esto último se realizaría mediante la configuración en Vue de los códigos de tecla: "Vue.config.keyCodes.f"</p>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    const app = new Vue({
        el: '#app',
        mounted() {
            document.getElementById('inputText').focus();
        },
        data: {
            title: 'Escuchando evento teclado [Enter]',
            subtitle: 'Escuchando eventos',
            lesson: 'Lección 11',
            inputText: ''
        },
        methods: {
            onEnterPressed() {
                this.$refs.message.innerText = this.inputText;
                this.$refs.message.style.color = 'deeppink';
            }
        }
    });
</script>
@endsection
