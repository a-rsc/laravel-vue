@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <h2 v-format.underline.bold.highlight>@{{ message }}</h2>
            <p v-color:blue>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis atque, molestiae dolorem dicta amet officia id, delectus repudiandae provident vitae accusamus itaque tempore ex nesciunt, veniam aut? Omnis, magni enim.</p>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>En esta ocasión introducimos los modificadores, que son simplemente nuevos decoradores que se le pueden añadir o no a la directiva.</p>
            <p>Volviendo a las modificaciones de estilo de los textos, un buen ejemplo sería decidir el formato en función de ciertos modificadores. Entonces, creamos la directiva v-format que podrá recibir diferentes modificadores que cambien el estilo del texto del elemento.</p>
            <p>Los modificadores se declaran a partir de un punto y seguido al nombre de la directiva u otro modificador. Este podría ser un ejemplo de declaración:</p>
<pre><code>
&lt;h1 v-format.underline.bold.highlight&gt;@{{ message }}&lt;/h1&gt;
</code></pre>
            <p>Para el código Javascript tendríamos algo como lo siguiente:</p>
<pre><code>
Vue.directive("format", {
    bind: function(el, binding, vnode) {
        const modifiers = binding.modifiers;

        if (modifiers.underline) {
            el.style.textDecoration = `underline`;
        }
        if (modifiers.bold) {
            el.style.fontWeight = `bold`;
        }
        if (modifiers.highlight) {
            el.style.background = `#eaeaea`;
        }
    }
});
</code></pre>
            <p>En el objeto binding tenemos los modificadores que pueden haberse aplicado y que podremos consultar y aplicar en caso de que existan.</p>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    Vue.directive('format', {
        bind: function(el, binding, vnode) {
            const modifiers = binding.modifiers;

            if (modifiers.underline) {
                el.style.textDecoration = `underline`;
            }
            if (modifiers.bold) {
                el.style.fontWeight = `bold`;
            }
            if (modifiers.highlight) {
                el.style.background = `#eaeaea`;
            }
        }
    });

    Vue.directive('color', {
        bind: function(el, binding, vnode) {
            el.style.color = binding.arg;
            console.log(binding);
            console.log(vnode);
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
            title: 'Directivas personalizadas III',
            subtitle: 'Utilizando modificadores',
            lesson: '',
            message: 'Usando una directiva con modificadores {underline, bold, highlight}!'
        },
        methods: {
        }
    });
</script>
@endsection
