@extends('layouts.app')

@section('title', 'Renderizar HTML')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div v-html="html"></div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>En este ejercicio veremos cómo añadir código HTML para que sea renderizado dentro de nuestra instancia Vue.</p>
            <p>En principio podríamos pensar que es algo muy sencillo, ¿no? Creamos una nueva instancia dentro de un elemento, una propiedad myhtml dentro del blqoue data a la que asignamos una cadena con el formato de marcado HTML y la mostramos dentro de un bloque {! myhtml !}</p>
            <p>¿Esto funcionaría? Bueno, la respuesta en este caso sería negativa ya que dentro de la instancia no se renderizará nuestro código HTML si no como un simple texto. Esto es así para evitar una vulnerabilidad crítica en la web (XSS: cross site scripting) que pudiera permitir una modificación maliciosa del código HTML de la variable.</p>
            <p>¿Y no existe ninguna forma de añadir código HTML? Sí que la hay, Vue nos da una directiva específica, que igualmente utilizaremos siempre con cuidado, denominada <strong>v-html.</strong></p>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    const app = new Vue({
        el: '#app',
        data: {
            title: 'Renderizar HTML',
            subtitle: 'HTML. Es una propiedad',
            lesson: 'Lección 12',
            html: `
            <h1>Ejemplo de renderizado HTML</h1>
            <p>Este enlace nos lleva a <a href="https://www.google.com" target="_blank">www.google.com</a></p>`
        }
    });
</script>
@endsection
