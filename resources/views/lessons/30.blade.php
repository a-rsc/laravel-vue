@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>

            <h2>Condicional</h2>
            <p v-if="step === 0">@{{ step }} - Si desaparece, este contenido no estará en el DOM.</p>
            <p v-else-if="step === 1">@{{ step }} - Inspecciona DOM, lo anterior no está!.</p>
            <p v-else>@{{ step }} - FIN</p>

            <h2>V-show</h2>
            <p v-show="step === 0">@{{ step }} - Si desaparece, este contenido permanecerá en el DOM.</p>
            <p v-show="step === 1">@{{ step }} - Inspecciona DOM, lo anterior permanece!.</p>

            <input type="button" id="step" v-on:click="++step" value="Incrementar step" autofocus>
            <input type="button" id="reiniciar" v-on:click="step = 0" value="Reiniciar step">

        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Utilice condicional cuando el contenido a mostrar u ocultar sea poco frecuente, ya que invierte recursos en representar de nuevo el contenido, y afecta al rendimiento.</p>
            <p>La directiva <strong>v-show</strong> no elimina del DOM el contenido al no cumplir la condición, sino que la oculta, utilizando el atributo <strong>display</strong> de CSS.</p>
            <p>Es recomendable utilizar esta directiva <strong>v-show</strong> en caso de que un contenido se muestre y oculte con relativa frecuencia ya que, al permancecer oculto en el DOM, su coste de representarlo es mínimo y tiene mayor rendimiento.</p>
            <h3>V-CLOAK</h3>
            <p>Al refrescar la página, es posible que veamos etiquetas {! step !}, sin valor, para evitar esto haremos uso de la directiva <strong>v-cloak</strong>, definiendo unos estilos en la hoja de estilos y añadiendo esta directiva en el div de la app. Si ahora refrescamos la página, en lugar de visualizar las etiquetas veremos el texto <strong>"Cargando..."</strong>.</p>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
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
            // document.getElementById('step').focus();
        },
        data: {
            title: 'Directiva v-show vs v-if',
            subtitle: 'V-show',
            lesson: '',
            step: 0
        },
        methods: {
        }
    });
</script>
@endsection
