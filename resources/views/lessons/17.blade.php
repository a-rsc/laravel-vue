@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <ul>
                <li v-for="product in shoppingList">@{{ product | productName}}</li>
            </ul>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Definimos un filtro que pase a mayúsculas cada valor que se le pase en este caso de la siguiente forma:</p>
<pre><code>
Vue.filter('productName', function(value) {
if (!value) return '';
value = value.toString();
return value.toUpperCase();
})
</code></pre>
<pre><code>
&lt;ul&gt;
&lt;li v-for="product in shoppingList"&gt;
    {! product | productName !}
&lt;/li&gt;
&lt;/ul&gt;
</code></pre>
            <p>Esta notación es el típico pipe que es muy común y que en este caso se podría leer como "a este valor la aplico esta función o transformación".</p>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    Vue.filter('productName', function(value) {
        if (!value) {
            return '';
        } else {
            return value.toString().toUpperCase();
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
            title: 'Filtros',
            subtitle: 'Modificadores de valor',
            lesson: '',
            shoppingList: ['manzana', 'pera', 'plátano', 'kiwi', 'melón', 'uva', '']
        },
        methods: {
        }
    });
</script>
@endsection
