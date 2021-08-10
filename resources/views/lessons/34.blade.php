@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <h4>Contexto this</h4>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Cuando utilizamos funciones en Vue, es probable que en alguna ocasión suceda que al acceder al valor de la instacia Vue mediante <strong>"this"</strong> nos encontremos con un valor <strong>"undefined"</strong> en lugar de la instancia Vue. Esto probablemente ocurra al hacer uso tanto de funciones regulares <strong>"function() {}"</strong> como funciones flecha <strong>"() => {}"</strong>.</p>
            <p>Inicialmente declaramos en el <strong>"data"</strong> la variable <strong>"msg"</strong> que contendrá un texto estático, <strong>"numbers"</strong> será un array de números y <strong>"number"</strong> es un número para filtrar de la colección del array. Además, en el <strong>"mounted"</strong> nada más cargar el componente invocamos a cada uno de los métodos que definiremos.</p>
            <p>Si declaramos una función regular como la siguiente, tenemos acceso a la instancia vue mediante <strong>"this"</strong>. Esto se debe a que las funciones regulares <strong>"this"</strong> hacen referencia al propietario de la función, de modo que al definirlo dentro de un componente de Vue, éste es su propietario.</p>
<pre><code>
fRegular() { this.msg; }
</code></pre>
            <p>Si declaramos una función flecha, no tendremos acceso al <strong>"this"</strong>, debido a que las funciones flechas el <strong>"this"</strong> no hacen referencia al propietario de la función flecha, sino que utilizan lo denominado alcance estático o <strong>"static scope"</strong>, por lo que el contexto del <strong>"this"</strong> se refiere en este caso al bloque de código en el cual está definido.</p>
<pre><code>
fArrow:() => { this.msg; }
</code></pre>
            <p>Si utilizamos una función flecha dentro de una función regular, podemos acceder al <strong>this</strong>, dado que la función regular establece que <strong>this</strong> es el contexto del componente.</p>
<pre><code>
    fRegularArrow:() => { let element = this.numbers.find((num) => { return num == this.number; }); }
</code></pre>
            <p>Curiosamente, si utilizamos una función regular dentro de otra regular, <strong>this</strong> no se refiere al componente Vue, debido a que se refiere al propietario de la función que lo contiene.</p>
<pre><code>
    fRegularReg:() => { let element = this.numbers.find(function(num) => { return num == this.number; }); }
</code></pre>
            <p>Para resolver el problema anterior podemos proporcionarle el contexto <strong>this</strong> a esta función regular contenida dentro de la función padre <strong>fRegularRegBind</strong>, haciendo uso del método de extensión de función <strong>bind()</strong>.</p>
<pre><code>
    fRegularRegBind:() => { let element = this.numbers.find(function(num) => { return num == this.number; }.bind(this)); }
</code></pre>
            <p>Si abrimos la página html y abrimos la consola, veremos cada uno de los resultados de obtener el <strong>this</strong>, unos <strong>undefined</strong> y otros cuyo acceso al contexto ha sido satisfactorio.</p>
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
            this.fRegular();
            this.fArrow();
            this.fRegularArrow();
            this.fRegularReg();
            this.fRegularRegBind();
        },
        data: {
            title: 'Contexto This',
            subtitle: 'This - funciones regulares y arrow',
            msg: 'Texto del data',
            numbers: [1, 2, 3, 4, 5],
            number: 3
        },
        methods: {
            fRegular() { console.log('Función Regular: ' + this.msg); },
            fArrow: () => { console.log('Función Arrow: ' + this.msg); },
            fRegularArrow() {
                let element = this.numbers.find((num) => { return num == this.number; });
                console.log('Función regular con Arrow: ' + element);
            },
            fRegularReg() {
                let element = this.numbers.find(function(num) { return num == this.number; });
                console.log('Función regular con otra Regular: ' + element);
            },
            fRegularRegBind() {
                let element = this.numbers.find(function(num) { return num == this.number; }.bind(this));
                console.log('Función regular con otra Regular con Bind(this): ' + element);

            }

        }
    });
</script>
@endsection
