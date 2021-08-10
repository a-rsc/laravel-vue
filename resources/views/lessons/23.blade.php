@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <h2 v-color:orange v-format.underline.bold.highlight>@{{ message }}</h2>
            <p v-color:blue>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis atque, molestiae dolorem dicta amet officia id, delectus repudiandae provident vitae accusamus itaque tempore ex nesciunt, veniam aut? Omnis, magni enim.</p>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Hasta ahora hemos visto cómo crear y declarar nuestras directivas personalizadas de forma global pero en este ejercicio podremos ver cómo se definen de forma local dentro de una instancia o componente Vue.</p>
            <p>Para ello simplemente tendremos que ir al código javascript de nuestra instancia y añadir un nuevo objeto directives con una sintaxis ligeramente diferente.</p>
<pre><code>
&lt;h1 v-color:orange v-format.underline.bold.highlight&gt;@{{ message }}&lt;/h1&gt;
</code></pre>
            <p>Para el código Javascript tendríamos algo como lo siguiente:</p>
<pre><code>
directives: {
    `orange`: {
        bind(el, binding, vnode) {
            el.style.color = `orange`;
        }
    },
    `color`: {
        bind(el, binding, vnode) {
            el.style.color = binding.arg;
        }
    },
    `format`: {
        bind(el, binding, vnode) {
            const modifiers = binding.modifiers;

            ...
        }
    },

}
</code></pre>
            <p>En el objeto binding tenemos los modificadores que pueden haberse aplicado y que podremos consultar y aplicar en caso de que existan.</p>
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
        },
        data: {
            title: 'Directivas personalizadas IV',
            subtitle: 'Directivas en la instancia',
            lesson: '',
            message: 'Aprendiendo VueJS!'
        },
        directives: {
            'orange': {
                bind(el, binding, vnode) {
                    el.style.color = `orange`;
                }
            },
            'color': {
                bind(el, binding, vnode) {
                    el.style.color = binding.arg;
                }
            },
            'format': {
                bind(el, binding, vnode) {
                    const modifiers = binding.modifiers;

                    if (modifiers.underline) {
                        el.style.textDecoration = `underline`;
                    }
                    if (modifiers.bold) {
                        el.style.fontWeight = `bold`;
                    }
                    if (modifiers.highlight) {
                        el.style.background = `rgb(234, 234, 234)`;
                    }
                }
            },
        },
        methods: {
        }
    });
</script>
@endsection
