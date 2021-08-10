@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <h2 v-color:red>@{{ message }}</h2>
            <p v-color:blue>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis atque, molestiae dolorem dicta amet officia id, delectus repudiandae provident vitae accusamus itaque tempore ex nesciunt, veniam aut? Omnis, magni enim.</p>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Lo ideal sería mantener una directiva y pasarle un argumento con el color.</p>
<pre><code>
&lt;h1 v-color:red&gt;@{{ message }}&lt;/h1&gt;
&lt;p v-color:blue&gt;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta iusto vel quis fugiat nobis non, dolorum exercitationem dolore, facere quas perspiciatis alias placeat itaque, at minima aperiam omnis rerum ullam.&lt;/h1&gt;
</code></pre>
<pre><code>
Vue.directive("color", {
    bind: function(el, binding, vnode) {
        el.style.color = binding.arg;
    }
});
</code></pre>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
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
            title: 'Directivas personalizadas II',
            subtitle: 'Directivas con argumentos',
            lesson: '',
            message: 'Usando una directiva con argumento (red)!'
        },
        methods: {
        }
    });
</script>
@endsection
