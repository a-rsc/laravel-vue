@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Si, tras instalar, el comando node no se reconoce, probablemente tengamos que añadir en las variables de entorno <strong>$PATH</strong> la ruta donde hemos instalado node. En MAC ejecutaríamos <strong>sudo nano /etc/paths</strong>, añadiendo al PATH <strong>/usr/local/bin</strong>.</p>
            <p>El código escrito de Vue lo tenemos distribuido en diferentes ficheros <strong>.vue</strong>. Vue se ejecuta en el navegador cliente, sin embargo, para una aplicación que sirva diferentes páginas Vue se require un servidor de desarrollo capaz de ejecutar nuestro código.</p>
            <p>Esto se debe a que nuestra aplicación necesita el protocolo http para ejecutarse. Aunque tengamos nuestro entorno de desarrollo alojado localmente, aun así, requerirá un servidor local de desarrollo donde ejecutar nuestra aplicación. No basta el protocolo <strong>file://</strong>, necesitamos hacer servir diferentes páginas a través del protocolo http.</p>
            <p>Los beneficios de ejecutar nuestro código en un servidor local de desarrollo son:</p>
            <ul>
                <li>Compilación en tiempo real por parte del servidor de nuestro proyecto, cada vez que realicemos un cambio en nuestro código.</li>
                <li>Al compilar nuestro código en tiempo real, el servidor nos avisa rápidamente de cualquier error semántico o del framework que hayamos implementado.</li>
                <li>Nos permite utilizar ciertos Plugins como ESLint, analizando si el código escrito por el equipo de desarrollo se asemeja para mantener una cierta calidad.</li>
                <li>Podemos trabajar en ES6 (ECMAScript 6), utilizando todo el potencial de las nuevas funciones de JavaScript aunque no todos los navegadores lo soporten hoy en día, gracias a babel, un compilar de código JavaScript capaz de traducirlo a código entendible por cualquier navegador.</li>
                <li>Optimiza nuestro código y los recursos, como imágenes, reduciéndolos para que ocupen menor tamaño y se carguen más rápidamente.</li>
                <li>Carga inteligente de aquellos ficheros que sean necesarios al iniciar la aplicación.</li>
            </ul>
            <p>Trabajando con este entrono de desarrollo podremos desarrollar más rápidamente que como habíamos trabajado hasta ahora, simulando su funcionamiento como si la aplicación fuera ejecutada en el servidor de producción.</p>
            <p>Uno de los requisitos para empezar a trabajar con el cliente de Vue (@vue/cli) es tener instalado un gestor de paquetes, es decir el Node Package Manager o comando npm. Para ello necesitaremos tener instalado en nuestro equipo NodeJS; en caso de no tenerlo instalado, podemos descargarlo desde su página oficial. NodeJS será imprescindible para que nuestro servidor de desarrollo se ejecute y compile nuestra aplicación.</p>
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
            title: 'Instalación NodeJS',
            subtitle: 'Conociendo el entorno de trabajo',
            lesson: null
        },
        methods: {
        }
    });
</script>
@endsection
