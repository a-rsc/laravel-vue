@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <h2 v-red>@{{ message }}</h2>
            <p v-red>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis atque, molestiae dolorem dicta amet officia id, delectus repudiandae provident vitae accusamus itaque tempore ex nesciunt, veniam aut? Omnis, magni enim.</p>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Vue permite la creación y registro de nuevas directivas.</p>
            <p>Las directivas personalizadas en Vue como el resto suelen empezar por <strong>v-</strong> y el nombre de la directiva. Como primer ejemplo empezaremos definiendo una directiva muy simple que cambie el color del texto renderizado.</p>
            <p>De esta forma tendríamos una declaración así:</p>
<pre><code>
&lt;h1 v-red&gt;@{{ message }}&lt;/h1&gt;
<br>
Vue.directive("red", function(el, binding, vnode) {
el.style.color = "red";
})
</code></pre>
        <p>Este código se ejecutará en el bind que es una función que se llama sólo una vez cuando se enlaza la primera vez la directiva al elemento. Siendo más estrictos podríamos escribirlo así y con más funciones.</p>
<pre><code>
Vue.directive("red", {
bind: function(el, binding, vnode) {
    el.style.color = "red";
}
});
</code></pre>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    Vue.directive('red', {
        bind: function(el, binding, vnode) {
            el.style.color = 'red';
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
            title: 'Directivas personalizadas',
            subtitle: 'Definiendo una directiva global',
            lesson: '',
            message: 'Usando la directiva personalizada red!'
        },
        methods: {
        }
    });
</script>
@endsection
